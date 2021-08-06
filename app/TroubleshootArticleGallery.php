<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TroubleshootArticleGallery extends Model
{
    protected $fillable = [
        'photos', 'article_id'
    ];

    protected $hidden = [

    ];

    public function article()
    {
        return $this->belongsTo(TroubleshootArticle::class, 'article_id', 'id');
    }
}
