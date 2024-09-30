<?php
// Include the database configuration
include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $company_name = $_POST['company_name'];
    $type_of_service = $_POST['type_of_service'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $person1_name = $_POST['person1_name'];
    $person1_designation = $_POST['person_1_designation'];
    $person1_email = $_POST['person_1_email'];
    $person1_mobile = $_POST['person_1_mobile'];
    $person2_name = $_POST['person_2_name'];
    $person2_designation = $_POST['person_2_designation'];
    $person2_email = $_POST['person_2_email'];
    $person2_mobile = $_POST['person_2_mobile'];
    $brief_about_company = $_POST['brief_about_company'];
    $next_action = $_POST['next_action'];
    $engagement_plan = $_POST['engagement_plan'];
    $visit_by = $_POST['visit_by'];

    // Prepare the SQL insert statement
    $sql = "INSERT INTO clients(company_name, business_type, company_address, company_mobile, company_email, website, staff1_name, staff1_role, staff1_email, staff1_mobile, staff2_name, staff2_role, staff2_email, staff2_mobile, brief_about_company, next_action, engagement_plan, visit_by)
            VALUES (:company_name, :type_of_service, :address, :mobile, :email, :website, :person1_name, :person1_designation, :person1_email, :person1_mobile, :person2_name, :person2_designation, :person2_email, :person2_mobile, :brief_about_company, :next_action, :engagement_plan, :visit_by)";

    // Prepare and execute the statement
    try {
        $stmt = $pdo->prepare($sql);

        // Bind parameters to the statement
        $stmt->bindParam(':company_name', $company_name);
        $stmt->bindParam(':type_of_service', $type_of_service);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':mobile', $mobile);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':website', $website);
        $stmt->bindParam(':person1_name', $person1_name);
        $stmt->bindParam(':person1_designation', $person1_designation);
        $stmt->bindParam(':person1_email', $person1_email);
        $stmt->bindParam(':person1_mobile', $person1_mobile);
        $stmt->bindParam(':person2_name', $person2_name);
        $stmt->bindParam(':person2_designation', $person2_designation);
        $stmt->bindParam(':person2_email', $person2_email);
        $stmt->bindParam(':person2_mobile', $person2_mobile);
        $stmt->bindParam(':brief_about_company', $brief_about_company);
        $stmt->bindParam(':next_action', $next_action);
        $stmt->bindParam(':engagement_plan', $engagement_plan);
        $stmt->bindParam(':visit_by', $visit_by);

        // Execute the statement
        $stmt->execute();

        // Redirect or display success message
        // echo "Details saved successfully.";
        header("Location: addClients.php?success=1");
        exit();
    } catch (PDOException $e) {
        // Handle any errors
        echo "Error: " . $e->getMessage();
    }
} else {
    // Handle invalid request
    echo "Invalid request method.";
}
