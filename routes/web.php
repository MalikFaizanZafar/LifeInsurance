<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Route::get('/individual', function () {
    return view('individual');
});

Route::get('/family', function () {
    return view('family');
});

Route::group(['prefix'=>'individual'],function(){

  Route::post('/individualplans','individualPlansController@Plans')->name('ishowPlans');
  Route::get('/first/{sumassured}/{premium}/{less}',function($sumassured,$premium,$less){
    if($less==0){
      $tenER=$sumassured-100000;
      $tenPI=$premium*10;
      $fifteenER=($sumassured*2)-200000;
      $fifteenPI=$premium*15;
      $twentyER=$sumassured*4;
      $twentyPI=$premium*20;
      $naturalDeath=$sumassured;
      $accidentalDeath=$sumassured*2;
    }
    else{
      $tenER=$sumassured;
      $tenPI=$premium*10;
      $fifteenER=$sumassured*2;
      $fifteenPI=$premium*15;
      $twentyER=$sumassured*4;
      $twentyPI=$premium*20;
      $naturalDeath=$sumassured;
      $accidentalDeath=$sumassured*2;
    }
    return view('individualPlans.first',compact('tenER','tenPI','fifteenER','fifteenPI','twentyER','twentyPI','naturalDeath','accidentalDeath'));
  })->name('ifirstPlan');
  Route::get('/second/{sumassured}/{premium}/{less}',function($sumassured,$premium,$less){
    if($less==0){
      $tenER=$sumassured-100000;
      $tenPI=$premium*10;
      $fifteenER=($sumassured*2)-200000;
      $fifteenPI=$premium*15;
      $twentyER=$sumassured*4;
      $twentyPI=$premium*20;
      $naturalDeath=$sumassured;
      $accidentalDeath=$sumassured*2;
    }
    else{
      $tenER=$sumassured;
      $tenPI=$premium*10;
      $fifteenER=$sumassured*2;
      $fifteenPI=$premium*15;
      $twentyER=$sumassured*4;
      $twentyPI=$premium*20;
      $naturalDeath=$sumassured;
      $accidentalDeath=$sumassured*2;
    }
    return view('individualPlans.second',compact('tenER','tenPI','fifteenER','fifteenPI','twentyER','twentyPI','naturalDeath','accidentalDeath'));
  })->name('isecondPlan');
  Route::get('/third/{sumassured}/{premium}/{less}',function($sumassured,$premium,$less){
    if($less==0){
      $tenER=$sumassured-100000;
      $tenPI=$premium*10;
      $fifteenER=($sumassured*2)-200000;
      $fifteenPI=$premium*15;
      $twentyER=$sumassured*4;
      $twentyPI=$premium*20;
      $naturalDeath=$sumassured;
      $accidentalDeath=$sumassured*2;
    }
    else{
      $tenER=$sumassured;
      $tenPI=$premium*10;
      $fifteenER=$sumassured*2;
      $fifteenPI=$premium*15;
      $twentyER=$sumassured*4;
      $twentyPI=$premium*20;
      $naturalDeath=$sumassured;
      $accidentalDeath=$sumassured*2;
    }
    return view('individualPlans.third',compact('tenER','tenPI','fifteenER','fifteenPI','twentyER','twentyPI','naturalDeath','accidentalDeath'));
  })->name('ithirdPlan');
});

Route::group(['prefix'=>'family'],function(){

  Route::post('/familyplans','familyPlansController@Plans')->name('fshowPlans');
  Route::get('/first/{sumassured}/{sumassuredA}/{sumassuredB}/{premium}/{less}',function($sumassured,$sumassuredA,$sumassuredB,$premium,$less){
    if($less==0){
      $tenER=$sumassured-100000;
      $tenPI=$premium*10;
      $fifteenER=($sumassured*2)-200000;
      $fifteenPI=$premium*15;
      $twentyER=$sumassured*4;
      $twentyPI=$premium*20;
      $naturalDeathA=$sumassuredA;
      $accidentalDeathA=$sumassuredA*2;
      $naturalDeathB=$sumassuredB;
      $accidentalDeathB=$sumassuredB*2;
    }
    else{
      $tenER=$sumassured;
      $tenPI=$premium*10;
      $fifteenER=$sumassured*2;
      $fifteenPI=$premium*15;
      $twentyER=$sumassured*4;
      $twentyPI=$premium*20;
      $naturalDeathA=$sumassuredA;
      $accidentalDeathA=$sumassuredA*2;
      $naturalDeathB=$sumassuredB;
      $accidentalDeathB=$sumassuredB*2;
    }
    return view('familyPlans.first',compact('tenER','tenPI','fifteenER','fifteenPI','twentyER','twentyPI','naturalDeathA','accidentalDeathA','naturalDeathB','accidentalDeathB'));
  })->name('ffirstPlan');
  Route::get('/second/{sumassured}/{sumassuredA}/{sumassuredB}/{premium}/{less}',function($sumassured,$sumassuredA,$sumassuredB,$premium,$less){
    if($less==0){
      $tenER=$sumassured-100000;
      $tenPI=$premium*10;
      $fifteenER=($sumassured*2)-200000;
      $fifteenPI=$premium*15;
      $twentyER=$sumassured*4;
      $twentyPI=$premium*20;
      $naturalDeathA=$sumassuredA;
      $accidentalDeathA=$sumassuredA*2;
      $naturalDeathB=$sumassuredB;
      $accidentalDeathB=$sumassuredB*2;
    }
    else{
      $tenER=$sumassured;
      $tenPI=$premium*10;
      $fifteenER=$sumassured*2;
      $fifteenPI=$premium*15;
      $twentyER=$sumassured*4;
      $twentyPI=$premium*20;
      $naturalDeathA=$sumassuredA;
      $accidentalDeathA=$sumassuredA*2;
      $naturalDeathB=$sumassuredB;
      $accidentalDeathB=$sumassuredB*2;
    }
    return view('familyPlans.second',compact('tenER','tenPI','fifteenER','fifteenPI','twentyER','twentyPI','naturalDeathA','accidentalDeathA','naturalDeathB','accidentalDeathB'));
  })->name('fsecondPlan');
  Route::get('/third/{sumassured}/{sumassuredA}/{sumassuredB}/{premium}/{less}',function($sumassured,$sumassuredA,$sumassuredB,$premium,$less){
    if($less==0){
      $tenER=$sumassured-100000;
      $tenPI=$premium*10;
      $fifteenER=($sumassured*2)-200000;
      $fifteenPI=$premium*15;
      $twentyER=$sumassured*4;
      $twentyPI=$premium*20;
      $naturalDeathA=$sumassuredA;
      $accidentalDeathA=$sumassuredA*2;
      $naturalDeathB=$sumassuredB;
      $accidentalDeathB=$sumassuredB*2;
    }
    else{
      $tenER=$sumassured;
      $tenPI=$premium*10;
      $fifteenER=$sumassured*2;
      $fifteenPI=$premium*15;
      $twentyER=$sumassured*4;
      $twentyPI=$premium*20;
      $naturalDeathA=$sumassuredA;
      $accidentalDeathA=$sumassuredA*2;
      $naturalDeathB=$sumassuredB;
      $accidentalDeathB=$sumassuredB*2;
    }
    return view('familyPlans.third',compact('tenER','tenPI','fifteenER','fifteenPI','twentyER','twentyPI','naturalDeathA','accidentalDeathA','naturalDeathB','accidentalDeathB'));
  })->name('fthirdPlan');
});
