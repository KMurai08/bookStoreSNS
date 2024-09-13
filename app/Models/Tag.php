<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    protected $primaryKey = 'tag_id';
    public $timestamps = false; // このテーブルにはcreated_atとupdated_atがないため

    protected $fillable = [
        'tag_name',
    ];

    // 小説との多対多リレーション
    public function novels()
    {
        return $this->belongsToMany(Novel::class, 'novels_tags', 'tag_id', 'novel_id');
    }
}