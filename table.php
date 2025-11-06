
<?php include 'connect.php' ?>
<?php include 'fetchData.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>All Form Records</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow p-4">
    <h3 class="text-center mb-4 text-success">All Form Submissions</h3>
    <table class="table table-bordered table-striped">
      <thead class="table-primary">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>Country</th>
          <th>Gender</th>
          <th>Hobbies</th>
          <th>Website</th>
          <th>Bio</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['country']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['hobby']}</td>
                        <td><a>{$row['website']}</a></td>
                        <td>{$row['bio']}</td>
                        <td><img src='{$row['image']}' width='50' height='50' style='border-radius:50%; object-fit:cover;'></td>
                       
                        <td><a href='delete.php?id={$row['id']}'>Delete</a></td>
                        <td><a href='edit.php?id={$row['id']}'>Edit</a></td>
                        </tr>";
            }
        } else {
            echo "<tr><td colspan='9' class='text-center text-muted'>No records found</td></tr>";
        }
        ?>
      </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
  <nav>
    <ul class="pagination">
      <!-- Previous Button -->
      <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?php $page - 1 ?>">Previous</a>
      </li>

      <!-- Numbered Pages -->
      <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
          <a class="page-link" href="?page=<?= $i ?>">   <?= $i ?>   </a>
          <a href="google.com">google</a>
        </li>
      <?php endfor; ?>

      <!-- Next Button -->
      <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
      </li>
    </ul>
  </nav>
</div>


    <div class="text-center mt-3">
      <a href="index.php" class="btn btn-primary">Go Back</a>
      <!-- <a href="edit.php" class="btn btn-primary">Edit</a> -->
    </div>
  </div>
</div>

</body>
</html>
<?php
$conn->close();
?>