<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testing CV</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link href="{{ asset('css/landingPage.css') }}" rel="stylesheet">
</head>
<body>
    @include('components.navbar')

    <div class="container m-0 p-0 mt-5 ms-5">
        <div class="d-flex flex-column">
            <div class="mb-3">
                <a href="{{route('getCV', ['filename' => 'Localization.pdf'])}}" class="btn btn-primary rounded-pill" target="_blank">CV Applicant 1</a>
            </div>
            <div>
                <a href="{{route('getCV', ['filename' => 'Kalender.pdf'])}}" class="btn btn-primary rounded-pill" target="_blank">CV Applicant 2</a>
            </div>
        </div>
    </div>

    @include('components.footer')
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
