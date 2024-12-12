@extends('layouts.app')

@section('title', 'Testing Page')

@section('custom_css')
<style>
        .custom-input-group {
        width: 100%;
        max-width: 700px;
        margin: 0 auto;
    }
    .company-card {
        border: 1px solid #ddd;
        border-radius: 15px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        height: 100%;
    }
    .company-card:hover {
        transform: translateY(-10px);
    }
    .company-card img {
        width: 100px;
        height: 100px;
        margin-bottom: 15px;
        border-radius: 50%;
    }
    .company-details h5 {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        text-align: center;
    }
    .company-details p {
        color: grey;
        font-size: 0.9rem;
        text-align: center;
    }
    .btn-visit {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        font-size: 1rem;
        transition: all 0.3s ease-in-out;
    }
    .btn-visit:hover {
        background-color: #0056b3;
        transform: scale(1.05);
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
    }
    .company-info-section {
        margin-top: 15px;
        text-align: justify;
    }
    .company-info-section .description {
        height: 50px;
        overflow: hidden;
        text-overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
    }
</style>
@endsection

@section('content')
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

    <a onclick="testingJS()" class="btn btn-primary mt-5" id="test">Testing</a>
    <button class="btn btn-primary mt-5" onclick="testFetch()">Fetch</button>
    <div class="container">
        <div class="row" id="data-container">

        </div>
    </div>
</div>

@include('components.footer')
@endsection

@section('custom_script')
    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                } else {
                    entry.target.classList.remove("show");
                }
            });
        });

        const hiddenElements = document.querySelectorAll(".hidden");
        hiddenElements.forEach((element) => {
            observer.observe(element);
        });

        document.addEventListener("DOMContentLoaded", function () {
            const filterLinks = document.querySelectorAll(".navbar-company .nav-link");
            const cards = document.querySelectorAll(".popular-company .card");

            filterLinks.forEach((link) => {
                link.addEventListener("click", function (e) {
                    e.preventDefault();

                    filterLinks.forEach((item) => {
                        item.classList.remove("active");
                    });

                    link.classList.add("active");

                    const category = link.textContent.trim();
                    console.log(`Filtering for category: ${category}`);

                    cards.forEach((card) => {
                        const cardCategory = card.getAttribute("data-category");

                        if (
                            category === cardCategory ||
                            category === "Show All Popular Company"
                        ) {
                            card.style.display = "block";
                        } else {
                            card.style.display = "none";
                        }
                    });
                });
            });
        });
    </script>
    <script>
        function testingJS(){
            if (document.getElementById('test').style.color == 'red')
                document.getElementById('test').style.color = 'black';
            else
                document.getElementById('test').style.color = 'red';
        }

        async function testFetch(){
            try {
                const response = await fetch('http://127.0.0.1:8000/test/data', {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                    },
                })

                let responses = await response.json()
                if(!response.ok){
                    throw new Error(responses.message)
                }

                console.log(responses)
                let dataCompany = responses.data
                let container = document.getElementById('data-container')
                container.innerHTML = ''
                console.log(dataCompany)
                console.log(dataCompany[0]['address'])
                dataCompany.forEach(data => {
                    container.innerHTML += `
                        <div class="col-10 col-sm-6 col-md-6 col-lg-4 mt-3">
                            <div class="company-card">
                                <img src="{{ asset('assets/bbca.jpeg') }}" alt="Company Logo">
                                <div class="company-details">
                                    <h5 class="mt-2">Company ID: ${data['id']}</h5>
                                    <p>${data['address']}</p>
                                </div>
                                <div class="company-info-section">
                                    <p class="fw-bold mb-0">Description</p>
                                    <p class="text-muted mt-0 description">${data['description']}</p>
                                    <p class="fw-bold mb-0">Field</p>
                                    <p class="text-muted mt-0">${data['field']}</p>
                                </div>
                                <a href="http://127.0.0.1:8000//user/company/${data['id']}" class="btn btn-visit">Visit Company</a>
                            </div>
                        </div>
                    `
                });
                return
            } catch (error) {
                alert(error)
                return null
            }
        }
    </script>
@endsection
