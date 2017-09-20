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
        <style></style>
    </head>
    <body>
<table class="table table-striped table-hover " style="margin-top:30px; margin-left:400px; width:500px">
  <caption>Investment Return</caption>
<thead>
<tr class="info">
<th>Duration(Maturity)</th>
<th>Expected Return</th>
<th>Person's Investment</th>
</tr>
</thead>
<tbody>
<tr class="success">
<td>10 Years</td>
<td>{{ $tenER }}</td>
<td>{{ $tenPI }}</td>
</tr>
<td>15 Years</td>
<td>{{ $fifteenER }}</td>
<td>{{ $fifteenPI }}</td>
</tr>
<td>20 Years</td>
<td>{{ $twentyER }}</td>
<td>{{ $twentyPI }}</td>
</tr>
</tbody>
</table>

<table class="table table-striped table-hover " style="margin-top:30px; margin-left:400px; width:500px">
  <caption>Insurance Cover : Person A Dies</caption>
<thead>
<tr class="info">
<th>In Case of Death</th>
<th>Insurance Cover</th>
</tr>
</thead>
<tbody>
<tr class="success">
<td>Natural Death</td>
<td>{{ $naturalDeathA }}</td>
</tr>
<tr class="danger">
<td>Accidental Death</td>
<td>{{ $accidentalDeathA }}</td>
</tbody>
</table>

<table class="table table-striped table-hover " style="margin-top:30px; margin-left:400px; width:500px">
  <caption>Insurance Cover : Person B Dies</caption>
<thead>
<tr class="info">
<th>In Case of Death</th>
<th>Insurance Cover</th>
</tr>
</thead>
<tbody>
<tr class="success">
<td>Natural Death</td>
<td>{{ $naturalDeathB }}</td>
</tr>
<tr class="danger">
<td>Accidental Death</td>
<td>{{ $accidentalDeathB }}</td>
</tbody>
</table>

    </body>
</html>
