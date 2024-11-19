<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Detail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .job-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .job-header {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .company-logo {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .job-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #212529;
        }

        .btn-primary {
            padding: 0.5rem 1.5rem;
            font-size: 1rem;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 0.75rem;
        }

        .user-profile{
            min-width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 80px;
        }
        .applicant-details .btn{
            padding: 1.2rem;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <a href="{{route('jobs')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
            <i class="bi bi-arrow-left-circle"></i> Cancel Edit
        </a>

        <div class="job-card">
            <div class="job-header">
                <h2>Edit Job Details</h2>
            </div>
    
            <hr class="my-4">

            <div class="job-details">
                <div class="d-flex gap-2 flex-column">
                    <h2 class="section-title">Job Title</h2>
                    <form action="" method="post" class="d-inline mb-4">
                        @csrf
                        <input id="titleInput" type="text" class="form-control" value="Senior Back-end Developer - PT Bank Central Asia Tbk">
                    </form>
                </div>
                <div class="d-flex gap-1 flex-column">
                    <h2 class="section-title">Job Location</h2>
                    <form action="" method="post" class="d-inline mb-4">
                        @csrf
                        <input id="locationInput" type="text" class="form-control" value="Jakarta, Indonesia · Last Update: 20 November 2024">
                    </form>
                </div>    
                <div class="d-flex gap-2 flex-column">
                    <h2 class="section-title">Job Description</h2>
                    <form action="" method="post" class="d-inline mb-4">
                        @csrf
                        <input id="descriptionInput" type="text" class="form-control d-block" value="Competitive salary package, Health insurance, Flexible working hours, Professional development opportunities. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam esse ipsa tempora! Obcaecati animi laudantium nobis quas harum aspernatur delectus. Facere quas at praesentium. Eius, cupiditate harum nisi alias facere libero architecto dolor sunt accusamus recusandae amet nihil unde enim incidunt repellat modi qui reprehenderit expedita repudiandae at ducimus? Temporibus?">
                    </form>
                </div>

                <div class="d-flex gap-2 flex-column">
                    <h2 class="section-title">Job Requirements</h2>
                    <form action="" method="post" class="d-inline mb-4">
                        @csrf
                        <input id="descriptionInput" type="text" class="form-control d-block" value="Proven experience as a Back-end Developer, Strong knowledge of PHP, Golang, or Node.js, Experience with database management (MySQL, PostgreSQL), Familiarity with cloud services like AWS or GCP.">
                    </form>
                </div>
                
                <div class="d-flex gap-2 flex-column">
                    <h2 class="section-title">Benefits</h2>
                    <form action="" method="post" class="d-inline mb-4">
                        @csrf
                        <input id="benefitsInput" type="text" class="form-control d-block" value="Eius, cupiditate harum nisi alias facere libero architecto dolor sunt accusamus recusandae amet nihil unde enim incidunt repellat modi qui reprehenderit expedita repudiandae at ducimus? Temporibus?">
                    </form>
                </div>

                <div class="mt-4 d-flex align-items-center justify-content-end gap-3">
                    <a href="{{ route('editJob') }}" class="btn btn-primary">Update</a>
                </div>
            </div>
        </div>

    </div>

    <hr class="mt-5">

    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB30NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>

    </script>
</body>

</html>