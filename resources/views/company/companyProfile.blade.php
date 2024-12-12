@extends('layouts.app')

@section('title', 'Edit Profile')

@section('custom_css')
    <style>
        .image-container {
            position: relative;
            display: inline-block;
            width: 180px;
            height: 180px;
        }

        .change-image-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            border: none;
            border-radius: 100px;
            width: 180px;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-container:hover .change-image-btn {
            opacity: 1;
        }
    </style>
@endsection

@section('content')
    @include('components.navbar')

    <div class="container my-5">
        <a href="{{route('company.home')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
            <i class="bi bi-arrow-left-circle"></i> {{ __('company/companyLang.backCompanyProfile') }}
        </a>
        <div class="text-center mb-5">
            <h2>{{__('company/companyLang.titleCompanyProfile')}}</h2>
            <p class="text-muted">{{__('company/companyLang.captionCompanyProfile')}}</p>
        </div>


        <div class="card shadow-sm">
            <div class="card-body p-5">
                <form action="{{route('company.updateProfile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <div class="d-flex flex-column align-items-center">
                            <label class="form-label"><strong>{{__('company/companyLang.contentTitleCompanyProfile')}}</strong></label>
                            <div class="d-flex align-items-center">
                                <div class="image-container">
                                    <!-- Display Current Profile Picture -->
                                    <img src="{{ Storage::url(Auth::user()->profile_picture) }}"
                                         alt="Profile Picture"
                                         id="preview-image"
                                         class="rounded-circle me-2 object-fit-fill"
                                         style="width: 180px; height: 180px;"/>

                                    <!-- File Input (Hidden) -->
                                    <input type="file" class="form-control" id="logo" name="logo" style="display: none;" onchange="previewImage(event)">

                                    <!-- Label for the Input -->
                                    <label for="logo" class="change-image-btn">
                                        <i class="bi bi-pencil-fill fs-3"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label"><strong>{{__('company/companyLang.companyNameCompanyProfile')}}</strong></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{__('company/companyLang.companyNamePHCompanyProfile')}}" value="{{Auth::user()->name}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="field" class="form-label"><strong>{{__('company/companyLang.fieldCompanyProfile')}}</strong></label>
                            <input type="text" class="form-control" id="field" name="field" placeholder="{{__('company/companyLang.companyFieldPHCompanyProfile')}}" value="{{$company->field}}" required>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="address" class="form-label"><strong>{{__('company/companyLang.companyAddressCompanyProfile')}}</strong></label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="{{__('company/companyLang.companyAddressPHCompanyProfile')}}" value="{{$company->address}}" required></input>
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number" class="form-label"><strong>{{__('company/companyLang.phoneNumberCompanyProfile')}}</strong></label>
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="{{__('company/companyLang.companyPhonePHCompanyProfile')}}" value="{{Auth::user()->phone_number}}" required>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label"><strong>{{__('company/companyLang.companyDescriptionCompanyProfile')}}</strong></label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="{{__('company/companyLang.companyDescriptionPHCompanyProfile')}}" required>{{$company->description}}</textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg px-4">{{__('company/companyLang.saveChangesCompanyProfile')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('components.footer')
@endsection

@section('custom_script')
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Update the src of the image with the uploaded file's data URL
                    document.getElementById('preview-image').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
