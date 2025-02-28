<?php require_once "db.php"; ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="assets/js/script.js" defer></script>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="container mt-5">
    <div class="mb-4 d-flex">
        <img src="./assets/iitlogo.jpg" alt="Employee Image" width="100">
<div class="ms-4">
<h2 class="mt-2">Employee Registration Form</h2>
<p>Please fill out the form for the HR department to complete your registration.</p>
</div>
</div>
        <form action="submit.php" method="POST">
            <div class="card p-3">
                <h4>Personal Information</h4>
                <div class="row mb-3">
                    <div class="col">
                        <label>First Name *</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="col">
                        <label>Middle Name</label>
                        <input type="text" name="middle_name" class="form-control">
                    </div>
                    <div class="col">
                        <label>Last Name *</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Marital Status</label>
                        <select name="marital_status" class="form-control">
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                    <div class="col">
                        <label>Date of Birth *</label>
                        <input type="date" name="dob" class="form-control" required>
                    </div>
                </div>

                <h4>Contact Information</h4>
                <div class="row mb-3">
                    <div class="col">
                        <label>Email *</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="col">
                        <label>Mobile Number *</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" required>
                    </div>
                </div>

                <h4>Address</h4>
                <div class="row mb-3">
                    <div class="col">
                        <label>Street Address</label>
                        <input type="text" name="street_address" class="form-control">
                    </div>
                    <div class="col">
                        <label>City</label>
                        <input type="text" name="city" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>State/Province</label>
                        <input type="text" name="state" class="form-control">
                    </div>
                    <div class="col">
                        <label>ZIP Code</label>
                        <input type="text" name="zip" class="form-control">
                    </div>
                    <div class="col">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Register Me</button>
            </div>
        </form>
    </div>
</body>
</html>
