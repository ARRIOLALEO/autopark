<?php

use autopark\autorent\models\car;
Route::get('Cars', function(){
$cars = car::with(['image','location'])->get();
return $cars;
});
use autopark\autorent\models\location;
Route::get('Places', function(){
$places = location::all();
return $places;
});