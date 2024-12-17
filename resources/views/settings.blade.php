@extends('layouts.app')

@section('custom_css')
<style>
  @media (max-width: 770px){
    #settings-tabs{
      margin-bottom: 50px;
      display: flex;
    }
  }
</style>
@endsection

@section('content')
  @include('components.navbar')

  <div class="container mt-5">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3">
        <ul class="nav flex-column nav-pills shadow" id="settings-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="password-tab" data-bs-toggle="pill" href="#changePassword" role="tab">
               Change Password
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="language-tab" data-bs-toggle="pill" href="#changeLanguage" role="tab">
              Change Language
            </a>
          </li>
        </ul>
      </div>

      <!-- Main Content -->
      <div class="col-md-9">
        <div class="card shadow">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Settings</h4>
          </div>
          <div class="card-body">
            <div class="tab-content" id="settings-tabContent">
              <!-- Change Password Content -->
              <div class="tab-pane fade show active" id="changePassword" role="tabpanel">
                <form method="POST" action="{{route('password.email')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="col-form-label text-md-end">{{ __('Current Password') }}</label>
                        <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>
                    </div>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </form>
              </div>

              <!-- Change Language Content -->
              <div class="tab-pane fade" id="changeLanguage" role="tabpanel">
                <form id="languageForm" method="GET" action="{{route('setLocale')}}">
                  <div class="mb-3">
                    <label for="language" class="form-label">Select Language</label>
                    <select name="language" id="language" class="form-select">
                        <option value="en">English</option>
                        <option value="id">Indonesian</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  @include('components.footer')
@endsection
