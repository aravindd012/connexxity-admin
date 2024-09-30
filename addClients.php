<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Form</title>
    <?php require('layouts/header.html') ?>
    <style>
        textarea {
            resize: none;
            overflow: hidden;
        }
    </style>
</head>

<body>

    <div class="container my-3">
        <!-- Include the Navbar -->
        <?php require('layouts/navbar.html'); ?>
        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            <div class="alert alert-success">Employer details saved successfully!</div>
        <?php endif; ?>

        <div class="card shadow my-3">
            <div class="card-header">
                <h5 class="card-title text-center">Customer Relationship Management</h5>
            </div>
            <div class="card-body">
                <form action="saveClient.php" method="POST">
                    <div class="row">

                        <h5 class="card-title"> Company Details</h5>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="company_name" id="company_name" placeholder="name@example.com" required>
                                <label for="company_name">Name of the Company:</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <select name="type_of_service" class="form-control" id="type_of_service" required>
                                    <option>Select Business Type</option>
                                    <option value="Architects">Architects</option>
                                    <option value="Builders">Builders</option>
                                    <option value="Consultants">Consultants</option>
                                    <option value="PMC">Project Management Consultancy</option>
                                    <option value="College">College</option>
                                    <option value="System Integrators">System Integrators</option>
                                    <option value="Goverment Department">Goverment Department</option>
                                </select>
                                <label for="type_of_service">Type of Service:</label>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-md-6 mb-3">
                            <div class="form-floating ">
                                <textarea name="address" id="address" class="form-control" placeholder="Address" oninput="autoSize(this)" required></textarea>
                                <label for="address">Full Address:</label>
                            </div>
                        </div>

                        <!-- Mobile Number -->
                        <div class="col-md-6 mb-3">
                            <div class="form-floating  ">
                                <input type="number" name="mobile" id="mobile" class="form-control" pattern="[0-9]{10}" placeholder="Enter Mobile Number" title="Please enter a 10-digit mobile number" required>
                                <label for="mobile">Mobile Number:</label>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <div class="form-floating  ">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email Address">
                                <label for="email">Email Address:</label>
                            </div>
                        </div>

                        <!-- Website -->
                        <div class="col-md-6 mb-3">
                            <div class="form-floating  ">
                                <input type="text" name="website" id="website" class="form-control" placeholder="Enter Website URL:">
                                <label for="website">Enter Website URL:</label>
                            </div>
                        </div>

                        <h5 class="card-title">Person 1 Detail :</h5>
                        <div class="col-md-6 mb-3">
                            <div class="form-floating  ">
                                <input type="text" name="person1_name" id="person1_name" class="form-control" placeholder="Person 1 Name">
                                <label for="person1_name">Name:</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating  ">
                                <input type="text" name="person_1_designation" id="person_1_designation" class="form-control" placeholder="Person 1 Designation">
                                <label for="person_1_designation">Designation:</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating  ">
                                <input type="email" name="person_1_email" id="person_1_email" class="form-control" placeholder="Person 1 Email">
                                <label for="person_1_email">Email:</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating  ">

                                <input type="text" name="person_1_mobile" id="person_1_mobile" class="form-control" placeholder="Person 1 Mobile">
                                <label for="person_1_mobile">Mobile:</label>
                            </div>
                        </div>

                        <h5 class="card-title">Person 2 Detail :</h5>
                        <div class="col-md-6 mb-3">
                            <div class="form-floating  ">
                                <input type="text" name="person_2_name" id="person_2_name" class="form-control" placeholder="Person 2 Name">
                                <label for="person_2_name">Name:</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating  ">
                                <input type="text" name="person_2_designation" id="person_2_designation" class="form-control" placeholder="Person 2 Designation">
                                <label for="person_2_designation">Designation:</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating  ">
                                <input type="email" name="person_2_email" id="person_2_email" class="form-control" placeholder="Person 2 Email">
                                <label for="person_2_email">Email:</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating  ">
                                <input type="text" name="person_2_mobile" id="person_2_mobile" class="form-control" placeholder="Person 2 Mobile">
                                <label for="person_2_mobile">Mobile:</label>
                            </div>
                        </div>

                        <h5 class="card-title">Other Details</h5>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating  ">
                                <textarea name="brief_about_company" id="brief_about_company" class="form-control" oninput="autoSize(this)" placeholder="Company About" required></textarea>
                                <label for="brief_about_company">Brief about the Company:</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating  ">
                                <textarea name="next_action" id="next_action" class="form-control" placeholder="Next Course of Action:" oninput="autoSize(this)"></textarea>
                                <label for="next_action">Next Course of Action:</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating  ">
                                <textarea name="engagement_plan" id="engagement_plan" class="form-control" placeholder="Customer Engagement Plan" oninput="autoSize(this)"></textarea>
                                <label for="engagement_plan">Customer Engagement Plan:</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating  ">
                                <select name="visit_by" class="form-control" id="visit_by" required>
                                    <option>Select Visitor</option>
                                    <option value="Mr.Anandraj MD">Mr.Anandraj MD</option>
                                    <option value="Anand Sales">Anand Sales</option>
                                </select>
                                <label for="visit_by">Visit by:</label>
                            </div>
                        </div>

                        <div class="col">
                            <button type="submit" class="btn btn-primary">Save Details</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function autoSize(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }
    </script>
</body>

</html>