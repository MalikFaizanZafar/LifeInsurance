<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Life Insurance Plans</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
         integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Styles -->
        <style>


        </style>
    </head>
    <body>
      <table class="table table-striped table-hover " style="margin-top:50px; margin-left:400px; width:500px">
        <caption>Premium Calculations</caption>
  <thead>
    <tr class="info">
      <th>Plan</th>
      <th>Sum Assured</th>
      <th>Annual Premium</th>
    </tr>
  </thead>
  <tbody>
    <tr class="success">
      <td><a href="{{ route('ifirstPlan',['sumassured'=>$OrignalFigure,'premium'=>$basicPremiumOrignal,'less'=>$less])}}">First</a></td>
      <td>{{$OrignalFigure}}</td>
      <td>{{$basicPremiumOrignal}}</td>
    </tr>
    <tr class="danger">
      <td><a href="{{route('isecondPlan',['sumassured'=>$SecondFigure,'premium'=>$basicPremiumSecond,'less'=>$less])}}">Second</a></td>
      <td>{{$SecondFigure}}</td>
      <td>{{$basicPremiumSecond}}</td>
    </tr>
    <tr class="warning">
      <td><a href="{{route('ithirdPlan',['sumassured'=>$ThirdFigure,'premium'=>$basicPremiumThird,'less'=>$less])}}">Third</a></td>
      <td>{{$ThirdFigure}}</td>
      <td>{{$basicPremiumThird}}</td>
    </tr>
  </tbody>
</table>
    </body>
</html>
