<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function getSnapToken(Request $request)
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $user = Auth::user();
        $orderId = 'ORDER-' . uniqid();

        // Simpan transaksi
        $transaction = Transaction::create([
            'order_id' => $orderId,
            'user_id' => $user->id,
            'status' => 'unpaid',
            'amount' => 17000,
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => 17000,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'custom_field1' => $user->id,
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return response()->json(['token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Token gagal dibuat: ' . $e->getMessage()], 500);
        }
    }

    public function paymentCallback(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $expectedSignature = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($request->signature_key !== $expectedSignature) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $transaction = Transaction::where('order_id', $request->order_id)->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $transaction->status = 'paid';
        $transaction->save();

        $user = User::find($transaction->user_id);
        if ($user) {
            $user->status = 'paid'; 
            $user->save();
        }

        return response()->json(['message' => 'Payment success']);
    }
}
