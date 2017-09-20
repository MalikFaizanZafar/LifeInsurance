<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Table3;

class familyPlansController extends Controller
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

        $dateA=$request->dateA;
        $incomeA=$request->incomeA;

        $dateB=$request->dateB;
        $incomeB=$request->incomeB;
        $less=0;

        if($dateB==NULL || $incomeB==NULL){
            $ageA=ageCalc($dateA);
            $premiumRate=rateCalc($ageA);
            $income=$incomeA;
            if($income < 25000){
              $less=1;
            }

            $OrignalFigure=$income*20;                          //Sum Assured Calculation for first plan
            $SecondFigure=Sfigure($income,$OrignalFigure);      //Sum Assured Calculation for Second plan
            $ThirdFigure=Tfigure($income,$OrignalFigure);       //Sum Assured Calculation for first plan

            $OrignalFigure=$income*20;                          //Sum Assured Calculation for first plan
            $SecondFigure=Sfigure($income,$OrignalFigure);      //Sum Assured Calculation for Second plan
            $ThirdFigure=Tfigure($income,$OrignalFigure);        //Sum Assured Calculation for first plan

            $basicPremiumOrignal=premiumOrignal($OrignalFigure,$premiumRate);  //annual premium for first plan
            $basicPremiumSecond=premiumSecond($SecondFigure,$premiumRate);     //annual premium for second plan
            $basicPremiumThird=premiumThird($ThirdFigure,$premiumRate);        //annual premium for third plan

            return view('individualPlans.allplans',compact('OrignalFigure','SecondFigure','ThirdFigure','basicPremiumOrignal','basicPremiumSecond','basicPremiumThird','less'));
        }else{

          $income=$incomeA+$incomeB;
          $ageA=ageCalc($dateA);            ///age calculaton function for Person A
          $premiumRateA=rateCalc($ageA);   ////premium rate calculation for Person A

          $ageB=ageCalc($dateB);            ///age calculaton function for Person B
          $premiumRateB=rateCalc($ageB);   ////premium rate calculation for Person B

          $OrignalFigureA=$incomeA*20;
          $SecondFigureA=Sfigure($incomeA,$OrignalFigureA);              //function for calculation for Second Figure Person A
          $ThirdFigureA=Tfigure($incomeA,$OrignalFigureA);               //function for calculation for Third Figure Person A

          $OrignalFigureB=$incomeB*20;
          $SecondFigureB=Sfigure($incomeB,$OrignalFigureB);               //function for calculation for Second Figure Person B
          $ThirdFigureB=Tfigure($incomeB,$OrignalFigureB);               //function for calculation for Third Figure Person B

          $OrignalFigure=$OrignalFigureA+$OrignalFigureB;                          //Sum Assured Calculation for first plan
          $SecondFigure=$SecondFigureA+$SecondFigureB;                   //Sum Assured Calculation for Second plan
          $ThirdFigure=$ThirdFigureA+$ThirdFigureB;                    //Sum Assured Calculation for first plan

          $basicPremiumOrignalA=premiumOrignal($OrignalFigureA,$premiumRateA);  //annual premium for first plan
          $basicPremiumSecondA=premiumSecond($SecondFigureA,$premiumRateA);     //annual premium for second plan
          $basicPremiumThirdA=premiumThird($ThirdFigureA,$premiumRateA);        //annual premium for third plan

          $basicPremiumOrignalB=premiumOrignal($OrignalFigureB,$premiumRateB);  //annual premium for first plan
          $basicPremiumSecondB=premiumSecond($SecondFigureB,$premiumRateB);     //annual premium for second plan
          $basicPremiumThirdB=premiumThird($ThirdFigureB,$premiumRateB);        //annual premium for third plan

          $basicPremiumOrignal=$basicPremiumOrignalA+$basicPremiumOrignalB;  //annual premium for first plan
          $basicPremiumSecond=$basicPremiumSecondA+$basicPremiumSecondB;     //annual premium for second plan
          $basicPremiumThird=$basicPremiumThirdA+$basicPremiumThirdB;        //annual premium for third plan

          return view('familyPlans.allplans',compact('OrignalFigure','SecondFigure','ThirdFigure','basicPremiumOrignal','basicPremiumSecond','basicPremiumThird','less','OrignalFigureA','OrignalFigureB','SecondFigureA','SecondFigureB','ThirdFigureA','ThirdFigureB'));

        }
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
