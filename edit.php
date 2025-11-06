<?php include 'connect.php'; ?>

<?php 
$id=$_GET['id'];
print_r($id);
$sql="SELECT * FROM studentrecords WHERE id='$id'";
// $sql="SELECT * FROM studentrecords WHERE id={$id}";
$data=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($data);

// if($row){
//     die("record not found");
// }

// Pre-fill variables
$Name = $row['name'];
$Email = $row['email'];
$Address = $row['address'];
$Country = $row['country'];
$Gender = $row['gender'];
$Hobby = $row['hobby'];
$Website = $row['website'];
$Bio = $row['bio'];
$Image = $row['image'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Address = $_POST['address'];
    $Country = $_POST['country'];
    $Gender = $_POST['gender'];
    $Hobby = $_POST['hobby'];
    $Website = $_POST['website'];
    $Bio = $_POST['bio'];

    if(!empty($_FILES["image"]["name"])){
    $target_dir="upload/";
    if(!is_dir($target_dir)){
        mkdir($target_dir, true);
    }

    $target_file=$target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $Image= $target_file;
}

  $update_sql = "UPDATE studentrecords SET 
        name = '$Name',
        email = '$Email',
        address = '$Address',
        country = '$Country',
        gender = '$Gender',
        hobby = '$Hobby',
        website = '$Website',
        bio = '$Bio',
        image = '$Image'
        WHERE id = $id";

    $update_result = mysqli_query($conn, $update_sql);

    if ($update_result) {
        echo "<script>alert('Record updated successfully');window.location='table.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <div class="container mt-5 bg-info p-4 rounded">
    <h2 class="mb-4 text-center">Update Profile Form</h2>

    <form method="POST" enctype="multipart/form-data">

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $Name; ?>">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" name="email" value="<?php echo $Email; ?>">
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" value="<?php echo $Address; ?>">
      </div>

      <div class="mb-3">
        <label for="country" class="form-label">Country</label>
        <select class="form-select" name="country">
          <option value="pakistan" <?php if($Country=='pakistan') echo 'selected'; ?>>Pakistan</option>
          <option value="india" <?php if($Country=='india') echo 'selected'; ?>>India</option>
          <option value="bangladesh" <?php if($Country=='bangladesh') echo 'selected'; ?>>Bangladesh</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Gender</label><br>
        <input type="radio" name="gender" value="male" <?php if($Gender=='male') echo 'checked'; ?>> Male
        <input type="radio" name="gender" value="female" <?php if($Gender=='female') echo 'checked'; ?>> Female
      </div>

      <div class="mb-3">
        <label class="form-label">Hobby</label><br>
        <input type="checkbox" name="hobby" value="reading" <?php if($Hobby=='reading') echo 'checked'; ?>> Reading
        <input type="checkbox" name="hobby" value="gaming" <?php if($Hobby=='gaming') echo 'checked'; ?>> Gaming
      </div>

      <div class="mb-3">
        <label for="website" class="form-label">Website</label>
        <input type="url" class="form-control" name="website" value="<?php echo $Website; ?>">
      </div>

      <div class="mb-3">
        <label for="bio" class="form-label">Bio</label>
        <textarea class="form-control" name="bio" rows="3"><?php echo $Bio; ?></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Current Image</label><br>
        <img src="<?php echo $Image; ?>" width="100" height="100" alt="Profile Image">
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Upload New Image</label>
        <input type="file" class="form-control" name="image">
      </div>

      <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>

    </form>
  </div>
</body>
</html>