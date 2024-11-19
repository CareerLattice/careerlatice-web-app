<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
    @include('components.navbar')
    Testing {{session('company_id')}}
    Testing {{Auth::user()->name}}

    <a href="/testing_export/8" class="btn btn-success rounded-pill"> Download CSV</a>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
