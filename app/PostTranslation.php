<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['post_title', 'post_desc'];

    protected $table = 'posts_translation';

    public function ar_category() {
        return $this->belongsTo('App\Category','ar_category_id', 'id');
    }
}
