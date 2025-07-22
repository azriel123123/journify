<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quote;
use App\Models\Category;
use Illuminate\Support\Str;

class QuoteSeeder extends Seeder
{
    public function run()
    {
        $quotes = [
            ['day' => 1, 'headline' => 'Hari 1', 'isi' => 'Kamu luar biasa, jangan ragu dengan dirimu.', 'category_id' => 1],
            ['day' => 2, 'headline' => 'Hari 2', 'isi' => 'Setiap hari adalah kesempatan baru.', 'category_id' => 1],
            ['day' => 3, 'headline' => 'Hari 3', 'isi' => 'Bernafaslah, kamu sedang baik-baik saja.', 'category_id' => 1],
            ['day' => 4, 'headline' => 'Hari 4', 'isi' => 'Langkah kecil juga tetap langkah.', 'category_id' => 1],
            ['day' => 5, 'headline' => 'Hari 5', 'isi' => 'Kamu tidak sendirian.', 'category_id' => 1],
            ['day' => 6, 'headline' => 'Hari 6', 'isi' => 'Kamu cukup. Selalu.', 'category_id' => 1],
            ['day' => 7, 'headline' => 'Hari 7', 'isi' => 'Rasa lelahmu valid. Istirahatlah.', 'category_id' => 1],
            ['day' => 8, 'headline' => 'Hari 8', 'isi' => 'Teruskan meski pelan.', 'category_id' => 1],
            ['day' => 9, 'headline' => 'Hari 9', 'isi' => 'Kamu berhak bahagia.', 'category_id' => 1],
            ['day' => 10, 'headline' => 'Hari 10', 'isi' => 'Jangan lupa tersenyum hari ini.', 'category_id' => 1],
            ['day' => 11, 'headline' => 'Hari 11', 'isi' => 'Progresmu adalah milikmu, bukan perbandingan.', 'category_id' => 1],
            ['day' => 12, 'headline' => 'Hari 12', 'isi' => 'Berterima kasihlah pada dirimu hari ini.', 'category_id' => 1],
            ['day' => 13, 'headline' => 'Hari 13', 'isi' => 'Kamu sedang tumbuh, itu indah.', 'category_id' => 1],
            ['day' => 14, 'headline' => 'Hari 14', 'isi' => 'Lihat ke belakang dan banggalah.', 'category_id' => 1],
        ];

        foreach ($quotes as $quote) {
            Quote::create($quote);
        }
    }
}
