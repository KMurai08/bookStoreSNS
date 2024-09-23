<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'novel_id',
        'user_id',
        'review_title',
        'review_text',
    ];

    // Novel モデルとのリレーションシップ
    public function novel()
    {
        return $this->belongsTo(Novel::class, 'novel_id');
    }

    // User モデルとのリレーションシップ
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
//そのレビューをイチオシ登録したユーザー情報を取得
    public function favoritedBy()
{
    return $this->belongsToMany(User::class, 'user_favorite_reviews', 'review_id', 'user_id')
                ->withTimestamps();
}
}