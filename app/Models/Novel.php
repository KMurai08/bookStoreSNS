<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    protected $table = 'novels';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'novel_url',
        'novel_title',
        'novel_introduction',
        'novel_text',
        'genre_id',
        'status',
        'story_length',
    ];

    // ユーザーとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // ジャンルとのリレーション
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    // タグとの多対多リレーション（Novels_Tagsテーブルが中間テーブルと仮定）
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'novels_tags', 'novel_id', 'tag_id');
    }
}