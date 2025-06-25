<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'day',
        'question1',
        'question2',
        'question3'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
