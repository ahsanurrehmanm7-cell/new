<?php include 'connect.php'; ?>
<?php
$result = $conn->query("SELECT * FROM studentrecords");
// Pagination setup
$limit = 1; // records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Get total record count
$total_sql = "SELECT COUNT(*) AS total FROM studentrecords";
$total_result = $conn->query($total_sql);
$total_row = $total_result->fetch_assoc();
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Fetch limited records
$result = $conn->query("SELECT * FROM studentrecords LIMIT $limit OFFSET $offset");
?>

