<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Job</title>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="mb-4">Add New Job Listing</h2>
        <a href="{{route('company.listJob')}}" class="text-primary text-decoration-none mb-4 d-inline-block">
            <i class="bi bi-arrow-left-circle"></i> Back
        </a>
        
        <form action="test.php" method="POST">
            <div class="mb-3">
                <label for="jobTitle" class="form-label">Job Title</label>
                <input type="text" class="form-control" id="jobTitle" name="jobTitle" required>
            </div>

            <div class="mb-3">
                <label for="jobLocation" class="form-label">Job Location</label>
                <input type="text" class="form-control" id="jobLocation" name="jobLocation" required>
            </div>

            <div class="mb-3">
                <label for="jobDescription" class="form-label">Job Description</label>
                <textarea class="form-control" id="jobDescription" name="jobDescription" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="jobRequirement" class="form-label">Job Requirement</label>
                <textarea class="form-control" id="jobRequirement" name="jobRequirement" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="jobType" class="form-label">Job Type</label>
                <select class="form-select" id="jobType" name="jobType" required>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Internship">Internship</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="personInCharge" class="form-label">Person in Charge</label>
                <textarea class="form-control" id="personInCharge" name="personInCharge" rows="1" required></textarea>
            </div>

            <div class="mb-3">
                <label for="contactPerson" class="form-label">Contact Person</label>
                <input type="tel" textarea class="form-control" id="contactPerson" name="contactPerson" rows="1" required></textarea>
            </div>

            <div class="mb-3">
                <label for="jobOpeningDate" class="form-label">Opening Date</label>
                <input type="date" class="form-control" id="jobOpeningDate" name="jobOpeningDate" required>
            </div>
            <button type="submit" class="btn btn-success">Add Job</button>
        </form>
    </div>
</body>
</html>