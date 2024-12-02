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
                <form id="passwordForm" method="get">
                  <div class="mb-3">
                    <label for="currentPassword" class="form-label">Current Password</label>
                    <input 
                      type="password" 
                      id="currentPassword" 
                      name="current-password" 
                      placeholder="Current Password" 
                      class="form-control" 
                      required>
                  </div>
                  <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input 
                      type="password" 
                      id="newPassword" 
                      name="new-password" 
                      placeholder="New Password" 
                      class="form-control" 
                      required>
                  </div>
                  <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input 
                      type="password" 
                      id="confirmPassword" 
                      name="confirmpassword" 
                      placeholder="Confirm Password" 
                      class="form-control" 
                      required>
                  </div>
                  <button  
                    id="updatePasswordBtn" 
                    class="btn btn-primary w-100">
                    Update Password
                  </button>
                </form>
              </div>

              <!-- Change Language Content -->
              <div class="tab-pane fade" id="changeLanguage" role="tabpanel">
                <form id="languageForm" method="POST">
                  <div class="mb-3">
                    <label for="language" class="form-label">Select Language</label>
                    <select name="language" id="language" class="form-select">
                      <option value="en">English</option>
                      <option value="id">Indonesian</option>
                    </select>
                  </div>
                  <button 
                    type="submit" 
                    class="btn btn-primary w-100">
                    Save Changes
                  </button>
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



