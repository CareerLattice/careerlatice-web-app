<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Company View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">
    <div class="container my-5">
        <a href="{{route('company.home')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
            <i class="bi bi-arrow-left-circle"></i> Back
        </a>
        <div class="text-center mb-5">
            <h2>Edit Company Profile</h2>
            <p class="text-muted">Update your company information to keep your profile up-to-date.</p>
        </div>

        
        <div class="card shadow-sm">
            <div class="card-body p-5">
                <form action="update_profile" method="POST" enctype="multipart/form-data">
                 
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="company_name" class="form-label"><strong>Company Name</strong></label>
                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="company_email" class="form-label"><strong>Company Email</strong></label>
                            <input type="email" class="form-control" id="company_email" name="company_email" placeholder="Enter company email" required>
                        </div>
                    </div>

                   
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="company_address" class="form-label"><strong>Company Address</strong></label>
                            <textarea class="form-control" id="company_address" name="company_address" rows="3" placeholder="Enter company address" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="company_phone" class="form-label"><strong>Phone Number</strong></label>
                            <input type="tel" class="form-control" id="company_phone" name="company_phone" placeholder="Enter company phone number"required>
                        </div>
                    </div>

                   
                    <div class="mb-3">
                        <label for="company_description" class="form-label"><strong>Company Description</strong></label>
                        <textarea class="form-control" id="company_description" name="company_description" rows="4" placeholder="Write a short description about the company" required></textarea>
                    </div>

                    
                    <div class="mb-4">
                        <label for="company_logo" class="form-label">Upload Company Logo</label>
                        <input type="file" class="form-control" id="company_logo" name="company_logo">
                    </div>

                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg px-4">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
