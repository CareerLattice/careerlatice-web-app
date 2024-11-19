<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('getCV', ['filename' => '1.pdf'])}}" target="_blank">CV Applicant 1</a>
    <a href="{{route('getCV', ['filename' => 'Kalender.pdf'])}}" target="_blank">CV Applicant 2</a>
</body>
</html>