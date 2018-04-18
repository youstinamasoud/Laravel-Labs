<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Authenticatable;
//use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
  //use Sluggable;
  protected $table = 'posts';
  protected $fillable = [
      'title',
      'description',
      'user_id'
  ];

// public function sluggable()
// {
//   return [
//     'slug' => [
//     'source' => 'title'
//      ]
//   ];
// }
public function user()
{
  //User::class == 'App\User'
  return $this->belongsTo('App\User');
  //User has Many Post every post belongTo One User
}
  
}

