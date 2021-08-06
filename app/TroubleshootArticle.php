<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TroubleshootArticle extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'users_id', 'categories_id', 'description','slug'
    ];

    protected $hidden = [

    ];

    public function galleries()
    {
        return $this->hasMany(TroubleshootArticleGallery::class, 'article_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function category()
    {
        return $this->belongsTo(TroubleshootCategories::class, 'categories_id', 'id');
    }
}
