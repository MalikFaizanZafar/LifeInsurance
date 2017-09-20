<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
         integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Styles -->
        <style>


        </style>
    </head>
    <body>
      <form method="post" action="{{route('fshowPlans')}}">
        {{ csrf_field() }}
  <div class="row">
    <div class="col-md-3 col-md-offset-3">
      <label for="date">Date of Birth : Person A</label>
      <input type="date" name='dateA' id="date" class="form-control" max="1997-09-14"  required>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 col-md-offset-3">
      <label for="income">Montly Income : Person A</label>
      <input type="number" id="income" name='incomeA' class="form-control"  placeholder="Enter Your Monthly Income here">
    </div>
  </div>
  <br><br><br>
  <div class="row">
    <div class="col-md-3 col-md-offset-3">
      <label for="date">Date of Birth : Person B</label>
      <input type="date" name='dateB' id="date" class="form-control" max="1997-09-14" >
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 col-md-offset-3">
      <label for="income">Montly Income : Person B</label>
      <input type="number" id="income" name='incomeB' class="form-control"  placeholder="Enter Your Monthly Income here">
    </div>
  </div>
  <br>

  <button class="btn btn-primary col-md-offset-3" type="submit">Submit</button>
</form>
    </body>
</html>
