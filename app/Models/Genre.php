<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genre';
    protected $primaryKey = 'genre_id';
    public $timestamps = false; // このテーブルにはcreated_atとupdated_atがないため

    protected $fillable = [
        'genre_name',
    ];

    // 小説とのリレーション
    public function novels()
    {
        return $this->hasMany(Novel::class, 'genre_id');
    }
}