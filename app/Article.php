<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['title', 'slug', 'description_short', 'description', 'image', 'image_show'
        , 'meta_title', 'meta_description', 'published', 'created_by', 'modified_by'];

    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug( mb_substr( $this->title, 0, 40) . '-' .\Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    // Polymorphic relation with category
    public function categories(){
        return $this->morphToMany('App\Category', 'categoryable');
    }
}
