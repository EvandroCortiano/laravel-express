<?php

namespace App;

use App\Comment;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = [
    		'title',
    		'content'
    		];
    
    public function comments(){
    	return $this->hasMany('App\Comment');
    }
    
    public function tags(){
    	return $this->belongsToMany('App\Tag', 'posts_tags');
    }
    
    //atributos dinamigos get attribute
    public function getTagListAttribute(){
    	$tags = $this->tags()->lists('name')->all();
    	return implode(', ', $tags);
    }

}
