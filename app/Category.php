<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Dimsav\Translatable\Translatable;

class Category extends Model
{

	use Translatable;
	public $translationModel = 'App\CategoryTranslation';

    public $translatedAttributes = ['ar_category_name'];
    protected $fillable = ['category_name'];

    protected $table = 'categories';

    public function posts() {
    	return $this->hasMany('App\Post', 'category_id', 'id');
    }

    public function ar_posts() {
    	return $this->hasMany('App\PostTranslation', 'ar_category_id', 'id');
    }
    
}
