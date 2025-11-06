<?php include 'connect.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $address  = $_POST['address'];
    $country  = $_POST['country'];
    $gender   = $_POST['gender'];
    $hobby    = $_POST['hobby'];
    $website  = $_POST['website'];
    $bio      = $_POST['bio'];
    $image    = $_FILES['image'];

    // Validation
    if (empty($name) || empty($email) || empty($password) || empty($address) ||
        empty($country) || empty($gender) || empty($hobby) ||
        empty($website) || empty($bio) || empty($image)) {
        die("<h4 style='color:red;'>Please fill all fields.</h4>");
    }
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
}

       


        // Image upload
        $uploadDir = "upload/";
        $imageName = basename($_FILES["image"]["name"]);
        $image = $uploadDir . $imageName;

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
            // $image = "upload/"; // fallback if upload fails
        }

        // Insert into database
        $sql = $conn->prepare("INSERT INTO studentrecords (name, email, password, address, country, gender, hobby, website, bio, image)
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("ssssssssss", $name, $email, $password, $address, $country, $gender, $hobby, $website, $bio, $image);

        if ($sql->execute()) {
            echo "<h4 style='color:green;'>Record entered successfully!</h4>";
        } else {
            echo "<h4 style='color:red;'>Error while saving record.</h4>";
        }

        $sql->close();
?>

