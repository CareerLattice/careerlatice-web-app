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
    </style>
</head>

<body>
    <div class="container mt-5">
        <a href="{{route('jobs')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
            <i class="bi bi-arrow-left-circle"></i> Back to Jobs
        </a>

        <div class="job-card">
            <div class="job-header">
                <img src="{{asset('assets/bbca.jpeg')}}" alt="Company Logo" class="company-logo">
                <div>
                    <h1 class="job-title">Senior Back-end Developer - PT Bank Central Asia Tbk</h1>
                    <h5 class="text-muted">Jakarta, Indonesia · Last Update: 20 November 2024</h5>
                </div>
            </div>

            <hr class="my-4">

            <div class="job-details">
                <h2 class="section-title">Job Description</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore odio cupiditate, consectetur sit officiis eligendi autem doloribus recusandae mollitia nobis voluptates nemo similique animi quaerat ad. Sit autem dolore voluptatum impedit nostrum, natus tempore asperiores unde vitae amet, exercitationem neque, necessitatibus blanditiis doloribus repellat hic officiis. Labore hic quidem reprehenderit voluptates sit? Similique quo, magnam error et, recusandae voluptate excepturi explicabo quisquam molestias non quasi inventore veritatis amet praesentium, neque dolor. Mollitia velit qui ab quos illo veniam esse. Inventore asperiores odit deserunt eaque qui tempore error nemo hic ut doloribus consectetur, blanditiis culpa aliquid ex recusandae, esse, veniam iusto.</p>
                <h2 class="section-title">Requirements</h2>
                <ul>
                    <li>Proven experience as a Back-end Developer.</li>
                    <li>Strong knowledge of PHP, Golang, or Node.js.</li>
                    <li>Experience with database management (MySQL, PostgreSQL).</li>
                    <li>Familiarity with cloud services like AWS or GCP.</li>
                </ul>

                <h2 class="section-title">Benefits</h2>
                <ul>
                    <li>Competitive salary package.</li>
                    <li>Health insurance.</li>
                    <li>Flexible working hours.</li>
                    <li>Professional development opportunities.</li>
                </ul>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam esse ipsa tempora! Obcaecati animi laudantium nobis quas harum aspernatur delectus. Facere quas at praesentium. Eius, cupiditate harum nisi alias facere libero architecto dolor sunt accusamus recusandae amet nihil unde enim incidunt repellat modi qui reprehenderit expedita repudiandae at ducimus? Temporibus?</p>

                <div class="text-center mt-4">
                    <button class="btn btn-primary">Apply Now</button>
                </div>
            </div>
        </div>
    </div>

    <hr class="mt-5">

    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB30NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
