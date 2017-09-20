<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Table3;

class individualPlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function Plans(Request $request){

        $date=$request->date;
        $income=$request->income;
        $less=0;
        if($income < 25000){
          $less=1;
        }

        $age=ageCalc($date);            ///age calculaton function
        $premiumRate=rateCalc($age);   ////premium rate calculation

        $OrignalFigure=$income*20;
        $SecondFigure=Sfigure($income,$OrignalFigure);    //function for calculation for Second Figure
        $ThirdFigure=Tfigure($income,$OrignalFigure);     //function for calculation for Third Figure


        $basicPremiumOrignal=premiumOrignal($OrignalFigure,$premiumRate);  //annual premium for first plan
        $basicPremiumSecond=premiumSecond($SecondFigure,$premiumRate);     //annual premium for second plan
        $basicPremiumThird=premiumThird($ThirdFigure,$premiumRate);        //annual premium for third plan

          return view('individualPlans.allplans',compact('OrignalFigure','SecondFigure','ThirdFigure','basicPremiumOrignal','basicPremiumSecond','basicPremiumThird','less'));

      }
    }
    function rateCalc($age){
      $entry=Table3::where('age',$age)->first();
      $rate=$entry->rate;
      $rebate=0.5;
      $premiumRate=$rate-$rebate;

      return $premiumRate;
    }

    function ageCalc($date){
    $yearBirth=substr($date,0,4);
    $monthBirth=substr($date,5,2);
    $dayBirth=substr($date,8,2);
    $now=Carbon::now();        //substr(string,start,length)
    $dayNow=$now->day;
    $monthNow=$now->month;
    $yearNow=$now->year;

    $age=$yearNow-$yearBirth;

    if($monthNow-$monthBirth < 0)
    {
      $age=$age-1;
    }
    else if($monthNow-$monthBirth > 6){
      $age=$age+1;
    }
    else{
      $age=$age;
    }

    return $age;
    }

    function Sfigure($income,$OrignalFigure){
    if($income > 50000){
      $SecondFigure=$OrignalFigure+200000;
    }else if($income < 50000){
      $SecondFigure=$OrignalFigure+100000;
    }
    return $SecondFigure;
    }

    function Tfigure($income,$OrignalFigure){
    if($income > 50000){
      $ThirdFigure=$OrignalFigure-200000;
    }else if($income < 50000){
      $ThirdFigure=$OrignalFigure-100000;
    }
    return $ThirdFigure;
    }

    function premiumOrignal($OrignalFigure,$premiumRate){
    $figurePerThousand=$OrignalFigure/1000;
    $basicPremiumOrignal=$premiumRate * $figurePerThousand;
    $ADP=1.25;
    $addedADP=1.25 * $figurePerThousand;
    $basicPremiumOrignal=$basicPremiumOrignal+$addedADP;
    $basicPremiumOrignal=$basicPremiumOrignal+100; //policy Fee

      return $basicPremiumOrignal;
    }

    function premiumSecond($SecondFigure,$premiumRate){

    $figurePerThousand2=$SecondFigure/1000;
    $basicPremiumSecond=$premiumRate * $figurePerThousand2;
    $addedADP2=1.25 * $figurePerThousand2;
    $basicPremiumSecond=$basicPremiumSecond+$addedADP2+100;

      return $basicPremiumSecond;
    }

    function premiumThird($ThirdFigure,$premiumRate){
    $figurePerThousand3=$ThirdFigure/1000;
    $basicPremiumThird=$premiumRate * $figurePerThousand3;
    $addedADP3=1.25 * $figurePerThousand3;
    $basicPremiumThird=$basicPremiumThird+$addedADP3+100;

      return $basicPremiumThird;
    }
