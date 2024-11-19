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
            font-size: 1.35rem;
            font-weight: bold;
            margin-bottom: 0.55rem;
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
            <i class="bi bi-arrow-left-circle"></i> Back to Jobs
        </a>

        <div class="job-card">
            <div class="job-header row align-items-md-center d-flex justify-content-between">
                <div class="col-md-8 d-flex align-items-center">
                    <div class="row">
                        <div class="col-10 col-md-3 d-flex justify-content-center">
                            <img src="{{asset('assets/bbca.jpeg')}}" alt="Company Logo" class="company-logo mb-3 mt-2" >
                        </div>   

                        <div class="col-md-9">
                            <div class="d-flex gap-2">
                                <h1 id="jobTitle" class="job-title">Senior Back-end Developer - PT Bank Central Asia Tbk</h1>
                            </div>
                            <div class="d-flex gap-1">
                                <h5 id="jobLocation" class="text-muted">Jakarta, Indonesia · Last Update: 20 November 2024</h5>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col ms-4">
                        <div class="d-flex gap-2">
                            <h1 id="jobTitle" class="job-title">Senior Back-end Developer - PT Bank Central Asia Tbk</h1>
                        </div>
                        <div class="d-flex gap-1">
                            <h5 id="jobLocation" class="text-muted">Jakarta, Indonesia · Last Update: 20 November 2024</h5>
                        </div>
                    </div>     --}}
                </div>
                <div class="col-md-2 d-flex">
                    <button id="statusButton" class="btn btn-secondary ms-auto">Inactive</button>
                </div>
            </div>
                 

            <hr class="my-4">

            <div class="job-details">
                <div class="d-flex gap-2">
                    <h2 class="section-title">Job Description</h2>
                    {{-- <a href="" class="text-black" id="editDescriptionButton"><i class="bi bi-pencil-fill" id="descriptionPencil"></i></a> --}}
                </div>
                <p id="jobDescription" class="d-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore odio cupiditate, consectetur sit officiis eligendi autem doloribus recusandae mollitia nobis voluptates nemo similique animi quaerat ad. Sit autem dolore voluptatum impedit nostrum, natus tempore asperiores unde vitae amet, exercitationem neque, necessitatibus blanditiis doloribus repellat hic officiis. Labore hic quidem reprehenderit voluptates sit? Similique quo, magnam error et, recusandae voluptate excepturi explicabo quisquam molestias non quasi inventore veritatis amet praesentium, neque dolor. Mollitia velit qui ab quos illo veniam esse. Inventore asperiores odit deserunt eaque qui tempore error nemo hic ut doloribus consectetur, blanditiis culpa aliquid ex recusandae, esse, veniam iusto.</p>
                {{-- <form action="" method="post" class="d-inline">
                    @csrf
                    <input id="descriptionInput" type="text" class="form-control d-none">
                </form> --}}

                <div class="d-flex gap-2">
                    <h2 class="section-title">Requirements</h2>
                    {{-- <a href="" class="text-black" id="addRequirementBtn"><i class="bi bi-plus-square-fill" id=requirementsPencil></i></a> --}}
                </div>
                
                <ul id="jobRequirements">
                    <li>Proven experience as a Back-end Developer.</li>
                    <li>Strong knowledge of PHP, Golang, or Node.js.</li>
                    <li>Experience with database management (MySQL, PostgreSQL).</li>
                    <li>Familiarity with cloud services like AWS or GCP.</li>
                </ul>
                {{-- <form action="" method="post" class="d-inline">
                    @csrf
                    <input id="requirementsInput" type="text" class="form-control d-none">
                </form> --}}
                
                <div class="d-flex gap-2">
                    <h2 class="section-title">Benefits</h2>
                    {{-- <a href="" class="text-black" id="editBenefitButton"><i class="bi bi-plus-square-fill"></i></a> --}}
                </div>
                <ul>
                    <li>Competitive salary package.</li>
                    <li>Health insurance.</li>
                    <li>Flexible working hours.</li>
                    <li>Professional development opportunities.</li>
                </ul>
                
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam esse ipsa tempora! Obcaecati animi laudantium nobis quas harum aspernatur delectus. Facere quas at praesentium. Eius, cupiditate harum nisi alias facere libero architecto dolor sunt accusamus recusandae amet nihil unde enim incidunt repellat modi qui reprehenderit expedita repudiandae at ducimus? Temporibus?</p>

                <div class="mt-4 d-flex align-items-center justify-content-end gap-3">
                    <a href="{{ route('company.deleteJob', ['job' => $job->id]) }}" class="btn btn-outline-danger color-danger">Delete Job</a>
                    <a href="{{route('editJob')}}" class="btn btn-outline-primary">Edit Details</a>
                </div>
            </div>
        </div>

        <div class="job-card mt-5">
            <div class="job-header justify-content-between">
                <h4 class="fw-bold">List Applicant</h4>
                <a href="" class="btn btn-primary">Export List Applicant</a>
            </div>

            <hr class="my-4">

            <div class="list-applicant">
                <div class="row align-items-center text-center text-md-start mb-3">
                    <div class="col-md-4 d-flex align-items-center gap-3 mb-2">
                        <img src="{{ asset('assets/formal-person.jpg') }}" alt="User Profile" class="user-profile border-circle">
                        <div>
                            <h5 class="fw-bold m-0">John Doe Jane Doe</h5>
                            <p class="m-0">Junior Back-End Developer</p>
                        </div>
                    </div>
        
                    <div class="col-md-3 my-2">
                        <a href="{{ route('getCV',  ['filename' => '1.pdf']) }}" target="_blank" class="btn btn-primary">Check CV</a>
                    </div>
        
                    <div class="col-md-5 d-flex gap-2 justify-content-center justify-content-md-end my-2">
                        <a href="" class="btn btn-danger"><i class="bi bi-x-circle"></i></a>
                        <a href="" class="btn btn-success"><i class="bi bi-check-circle"></i></a>
                    </div>
                    <hr class="my-4">
                </div>
            </div>
        </div>
    </div>

    <hr class="mt-5">

    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB30NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.getElementById('statusButton').addEventListener('click', function() {
            var button = this;
            // Toggle between active and inactive
            if (button.classList.contains('btn-secondary')) {
                button.classList.remove('btn-secondary');
                button.classList.add('btn-success');
                button.textContent = 'Active';
            } else {
                button.classList.remove('btn-success');
                button.classList.add('btn-secondary');
                button.textContent = 'Inactive';
            }
        });

// // =======================================title==========================================
//         document.addEventListener("DOMContentLoaded", () => {
//             const editTitleButton = document.getElementById("editTitleButton");
//             const jobTitle = document.getElementById("jobTitle");
//             const titleInput = document.getElementById("titleInput");
//             const titlePencil = document.getElementById('titlePencil');

//             editTitleButton.addEventListener("click", (event) => {
//                 event.preventDefault();
//                 jobTitle.classList.add("d-none");
//                 titlePencil.classList.add("d-none");
//                 titleInput.classList.remove("d-none");
//                 titleInput.focus();
//             });

            
//             titleInput.addEventListener("keydown", (event) => {
//                 if (event.key === "Enter") {
//                     event.preventDefault();
//                     if (titleInput.value.trim() !== "") {
//                         jobTitle.textContent = titleInput.value;
//                     }
//                     titleInput.classList.add("d-none");
//                     titlePencil.classList.remove("d-none");
//                     jobTitle.classList.remove("d-none");
//                 }
//             });

            
//             titleInput.addEventListener("blur", () => {
//                 titleInput.classList.add("d-none");
//                 jobTitle.classList.remove("d-none");
//                 titlePencil.classList.remove("d-none");
//             });
//         });

// // =======================================location==========================================
//         document.addEventListener("DOMContentLoaded", () => {
//             const jobLocation = document.getElementById("jobLocation");
//             const addressInput = document.getElementById("addressInput");
//             const editLocationButton = document.getElementById("editLocationButton");
//             const locationPencil = document.getElementById("locationPencil");

//             editLocationButton.addEventListener("click", (event) => {
//                 event.preventDefault();
//                 jobLocation.classList.add("d-none");
//                 locationPencil.classList.add("d-none");
//                 addressInput.classList.remove("d-none");
//                 addressInput.value = "";
//                 addressInput.focus();
//             });

//             addressInput.addEventListener("keydown", (event) => {
//                 if (event.key === "Enter") {
//                     event.preventDefault();
//                     const lastUpdate = jobLocation.textContent.split("·")[1]?.trim();
//                     if (addressInput.value.trim() !== "") {
//                         jobLocation.textContent = `${addressInput.value} · ${lastUpdate}`;
//                     }

//                     addressInput.classList.add("d-none");
//                     jobLocation.classList.remove("d-none");
//                     locationPencil.classList.remove("d-none");
//                 }
//             });

//             addressInput.addEventListener("blur", () => {
//                 addressInput.classList.add("d-none");
//                 jobLocation.classList.remove("d-none");
//                 locationPencil.classList.remove("d-none");
//             });
//         });


// // =======================================Description==========================================
//         document.addEventListener("DOMContentLoaded", () => {
//             const jobDescription = document.getElementById("jobDescription");
//             const descriptionInput = document.getElementById("descriptionInput");
//             const editDescriptionButton = document.getElementById("editDescriptionButton");
//             const descriptionPencil = document.getElementById("descriptionPencil");

//             editDescriptionButton.addEventListener("click", (event) => {
//                 event.preventDefault()
//                 jobDescription.classList.add("d-none");
//                 descriptionPencil.classList.add("d-none");
//                 descriptionInput.classList.remove("d-none");
//                 descriptionInput.value = "";
//                 descriptionInput.focus();
//             });

//             descriptionInput.addEventListener("keydown", (event) => {
//                 if (event.key === "Enter") {
//                     event.preventDefault();
//                     if (descriptionInput.value.trim() !== "") {
//                         jobDescription.textContent = descriptionInput.value;
//                     }
//                     descriptionInput.classList.add("d-none");
//                     descriptionPencil.classList.remove("d-none");
//                     jobDescription.classList.remove("d-none");
//                 }
//             });

//             descriptionInput.addEventListener("blur", () => {
//                 descriptionInput.classList.add("d-none");
//                 jobDescription.classList.remove("d-none");
//                 descriptionPencil.classList.remove("d-none");
//             });
//         });

// // =======================================Requirements==========================================
//         document.addEventListener("DOMContentLoaded", () => {
//             const jobRequirements = document.getElementById("jobRequirements");
//             const requirementsInput = document.getElementById("requirementsInput");
//             const addRequirementBtn = document.getElementById("addRequirementBtn");

//             let editMode = false;
//             let currentEditItem = null;

//             // Menangani klik tombol Edit pada setiap item list
//             jobRequirements.addEventListener("click", (event) => {
//                 if (event.target.classList.contains("edit-btn")) {
//                     event.preventDefault();
//                     const listItem = event.target.closest("li");
//                     const text = listItem.textContent.replace("Edit", "").trim();
//                     requirementsInput.value = text;
//                     requirementsInput.classList.remove("d-none");
//                     requirementsInput.focus();
//                     currentEditItem = listItem;
//                     editMode = true;
//                 }
//             });

//             // Menangani input untuk mengedit atau menambahkan list
//             requirementsInput.addEventListener("keydown", (event) => {
//                 if (event.key === "Enter") {
//                     event.preventDefault();
//                     const inputValue = requirementsInput.value.trim();
//                     if (inputValue !== "") {
//                         if (editMode && currentEditItem) {
//                             currentEditItem.firstChild.textContent = inputValue + " ";
//                         } else {
//                             const newListItem = document.createElement("li");
//                             newListItem.innerHTML = `${inputValue} <button class="edit-btn btn btn-sm btn-outline-secondary">Edit</button>`;
//                             jobRequirements.appendChild(newListItem);
//                         }
//                         resetInput();
//                     }
//                 }
//             });

//             // Tombol untuk menambahkan list baru
//             addRequirementBtn.addEventListener("click", (event) => {
//                 event.preventDefault();
//                 const inputValue = requirementsInput.value.trim();
//                 if (inputValue !== "") {
//                     const newListItem = document.createElement("li");
//                     newListItem.innerHTML = `${inputValue} <button class="edit-btn btn btn-sm btn-outline-secondary">Edit</button>`;
//                     jobRequirements.appendChild(newListItem);
//                     resetInput();
//                 }
//             });

//             // Fungsi untuk mereset input
//             function resetInput() {
//                 requirementsInput.value = "";
//                 requirementsInput.classList.add("d-none");
//                 editMode = false;
//                 currentEditItem = null;
//             }

//             // Blur event untuk menghilangkan input saat tidak fokus
//             requirementsInput.addEventListener("blur", resetInput);
//         });




    </script>
</body>

</html>