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
      <form method="post" action="{{route('ishowPlans')}}">
        {{ csrf_field() }}
  <div class="row">
    <div class="col-md-3 col-md-offset-3">
      <label for="date">Date of Birth</label>
      <input type="date" name='date' id="date" class="form-control" max="1997-09-14"  required>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 col-md-offset-3">
      <label for="income">Montly Income</label>
      <input type="number" id="income" name='income' class="form-control"  placeholder="Enter Your Monthly Income here" required>
    </div>
  </div>
  <br>

  <button class="btn btn-primary col-md-offset-3" type="submit">Submit</button>
</form>
    </body>
</html>
