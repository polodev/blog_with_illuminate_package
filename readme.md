# Feb 11, 2018

## How to getting all data from eloquent model  

~~~php
Model::all();
~~~

##  How to getting single row from eloquent model 

~~~php
Model::find(id);
~~~

## relationship    

~~~php
// relation between User and Post Model
// inside User model
public function posts()
{
  return $this->hasMany(Post::class);
}
// inside Post model
public function user () {
  return $this->belongsTo(User::class);
}
~~~

## getting current directory path in php 

~~~php
__DIR__
~~~

## About table order when we create and drop table  

table order is important      
some table will depend on other table so when we create table dependent table will be created first   
When we drop table order will be reverse        

## Making foreign key relationship with illuminate/database schema     

~~~php
$t->integer('post_id')->unsigned();
$t->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
~~~

## range function   

range function will give a array in between range    

~~~php
range(1, 5) // [1, 2, 3, 4, 5];
~~~

## random number in php
rand function give us random number in between 2 numbers    

~~~php
rand(10, 15) // it will give a number in between 10 and 15
~~~

## Parsing url path in php  
~~~php
 $path = parse_url( trim( $_SERVER['REQUEST_URI'], '/' ), PHP_URL_PATH);
~~~

## how to using faker     

to generate fake data we are using faker       

Install faker      
~~~php
composer require fzaninotto/faker       
~~~

use Faker 

~~~php
use Faker\Factory;
$faker = Factory::create();
~~~

## Carbon date library   

Carbon date library has lot of helper function to work with data       
Installing Carbon
~~~php
use Carbon\Carbon
Carbon::now()->format("Y-m-d H:i:s")
~~~

using carbon method with created_at field   

~~~php
$post->created_at->diffForHumans()
~~~

