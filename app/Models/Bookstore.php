<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookstore extends Model
{
    use HasFactory;

    protected $table = 'book_stores';
    protected $fillable = [
        'user_id',
        'bookstore_name',
        'bookstore_introduction',
        'url',
        'header_img',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}