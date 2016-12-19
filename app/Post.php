<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Dimsav\Translatable\Translatable;

class Post extends Model
{

	use Translatable;
	public $translationModel = 'App\PostTranslation';

    public $translatedAttributes = ['ar_post_title', 'ar_post_desc'];
    protected $fillable = ['post_title', 'post_desc'];

    protected $table = 'posts';

    public function category() {
    	return $this->belongsTo('App\Category','category_id', 'id');
    }

    public function the_user() {
    	return $this->belongsTo('App\User','user_id', 'id');
    }    

}
