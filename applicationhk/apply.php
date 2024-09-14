<?php
// Response array
$response = array();

$servername = "localhost";
$username = "id21994398_jerald";
$password = "@Jerald04";
$dbname = "id21994398_dbhk";
try {
    // Create a new PDO instance
   
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the connection is successful
    if ($conn) {
        // Decode JSON data received from the client
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $bday = $_POST['bday'];
        $phone = $_POST['phone'];
        $fblink = $_POST['fblink'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $school = $_POST['school'];
        $mother_occupation = $_POST['mother_occupation'];
        $mother_fname = $_POST['mother_fname'];
        $mother_lname = $_POST['mother_lname'];
        $mother_income = $_POST['mother_income'];
        $father_lname = $_POST['father_lname'];
        $father_fname = $_POST['father_fname'];
        $father_occupation = $_POST['father_occupation'];
        $father_income = $_POST['father_income'];
        $stat = 'pending';
        // Prepare SQL statement for insertion
        $stmt = $conn->prepare("INSERT INTO apply (first_name, last_name, birthday, phone, facebook_link, age, address, email, school, mother_first_name, mother_last_name, mother_occupation, mother_income, father_first_name, father_last_name, father_occupation, father_income,stat) 
                                VALUES (:fname, :lname, :bday, :phone, :fblink, :age, :address, :email, :school, :mother_fname, :mother_lname, :mother_occupation, :mother_income, :father_fname, :father_lname, :father_occupation, :father_income,:stat )");

        // Bind parameters
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':bday', $bday);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':fblink', $fblink);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':school', $school);
        $stmt->bindParam(':mother_fname', $mother_fname);
        $stmt->bindParam(':mother_lname', $mother_lname);
        $stmt->bindParam(':mother_occupation', $mother_occupation);
        $stmt->bindParam(':mother_income', $mother_income);
        $stmt->bindParam(':father_fname', $father_fname);
        $stmt->bindParam(':father_lname', $father_lname);
        $stmt->bindParam(':father_occupation', $father_occupation);
        $stmt->bindParam(':father_income', $father_income);
     $stmt->bindParam(':stat',  $stat);
        // Execute the prepared statement
        $stmt->execute();

        // Set success response
        $response['success'] = true;
        $response['message'] = "New record created successfully";
    } else {
        // Set error response if connection fails
        $response['success'] = false;
        $response['message'] = "Database connection failed";
    }
} catch(PDOException $e) {
    // Error response
    $response['success'] = false;
    $response['message'] = "Error: " . $e->getMessage();
}

// Echo JSON response
echo json_encode($response);

// Close database connection
$conn = null;
?>
