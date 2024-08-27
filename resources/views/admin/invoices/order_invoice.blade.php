<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel 6 CRUD Example</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">
    <table class="table table-striped">
        <thead>
          <th>ID</th>
          <th>Show Name</th>
          <th>Series</th>
          <th>Lead Actor</th>
          <th>Action</th>
        </thead>
        <tbody>
          @foreach($shows as $show)
          <tr>
            <td>{{$show->id}}</td>
            <td>{{$show->company_name}}</td>
            <td>{{$show->department_name}}</td>
            <td>{{$show->team_lead_name}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endsection
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
