<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lagu extends Model
{
    use HasFactory;

    protected $table = 'lagus'; // default dari Laravel sudah 'lagus', tapi eksplisit boleh

    protected $fillable = [
        'judul',
        'penyanyi',
        'file',
        'category_id',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
