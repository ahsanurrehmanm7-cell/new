<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 bg-info">
    <h2 class="mb-4 text-center">User Profile Form</h2>
    <!-- <form class="row g-3" action="connect.php" method="post"> -->
      <form method="POST" enctype="multipart/form-data" action="submit.php">

      <div class="col_md_6">
        <label for="name" class="form_label">Name</label>
        <input type="text" class="form_control" name="name" id="name" placeholder="enter your name"><br><br>
      </div>

      <div class="col_md_6">
        <label for="email" class="form_label">Email</label>
        <input type="email" class="form_control" name="email" id="email" placeholder="enter your email"><br><br>
      </div>

      <div class="col_md_6">
        <label for="password" class="form_label">Password</label>
        <input type="password" class="form_control" name="password" id="password" placeholder="enter your password"><br><br>
      </div>

      <div class="col_md_6">
        <label for="address" class="form_label">Address</label>
        <input type="text" class="form_control" name="address" id="address" placeholder="enter your address"><br><br>
      </div>

<div class="col_md_3">
    <label for="country" class="form_label">Country</label>
    <select class="form_select" name="country" id="country">
        <option value="Pakistan">Pakistan</option> 
        <option value="Bangladesh">Bangladesh</option> 
        <option value="India">India</option> 
        <option value="Saudia Arab">Saudia Arab</option> 
        <option value="England">England</option> 
    </select>
</div>

<div class="col_md_3">
    <label for="male" class="form_label">Gender</label>
    <div>
        <input type="radio" class="form_check_input" name="gender" id="male" value="male">
        <label for="male" class="form_check_label">Male</label>

        <input type="radio" class="form_check_input" name="gender" id="female" value="female">
        <label for="female" class="form_check_label">Female</label>

        <input type="radio" class="form_check_input" name="gender" id="other" value="other">
        <label for="other" class="form_check_label">other</label>
    </div>
</div>

<div class="col-md-6">
        <label class="form-label">Hobbies</label>
        <div>
          <input type="checkbox" class="form-check-input" name="hobby" id="reading" value="reading">
          <label for="reading" class="form-check-label">Reading</label>
          <input type="checkbox" class="form-check-input ms-3" name="hobby" id="gaming" value="gaming">
          <label for="gaming" class="form-check-label">Gaming</label><br><br>
        </div>
      </div>

      <div class="col-md-6">
        <label for="website" class="form-label">Website</label>
        <input type="url" class="form-control" name="website" id="website" placeholder="https://example.com"><br><br>
      </div>

      <div class="col-md-12">
        <label for="bio" class="form-label">Other Information</label>
        <textarea id="bio" class="form-control" name="bio" rows="3"></textarea><br><br>
      </div>

      <div class="mb_3">
        <label for="image" class="form_label">image </label>
        <input type="file" name="image" id="image" class="form_control"><br><br>
      </div>

        <div class="col-12 text-center">
          <input type="submit">
    <!-- <a href="submit.php" class="btn btn-primary" >submit</a>  -->
      </div>

</form>
</body>
</html>