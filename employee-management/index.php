<?php
include 'db.php';

// Total Employee Count
$countQuery = "SELECT COUNT(*) AS total FROM employees";
$countResult = mysqli_query($conn, $countQuery);
$totalEmployees = mysqli_fetch_assoc($countResult)['total'];

// Search
$search = "";

$sql = "SELECT * FROM employees ORDER BY id DESC";

if(isset($_GET['search']) && $_GET['search'] != "")
{
    $search = mysqli_real_escape_string($conn,$_GET['search']);

    $sql = "SELECT * FROM employees
            WHERE employee_name LIKE '%$search%'
            OR department LIKE '%$search%'
            OR designation LIKE '%$search%'
            OR email LIKE '%$search%'
            ORDER BY id DESC";
}

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Employee Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body class="bg-light">

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand fw-bold" href="index.php">

Employee Management System

</a>

</div>

</nav>

<div class="container mt-4">

<!-- Success Messages -->

<?php

if(isset($_GET['msg']))
{

if($_GET['msg']=="added")
{
echo "<div class='alert alert-success'>Employee Added Successfully.</div>";
}

if($_GET['msg']=="updated")
{
echo "<div class='alert alert-warning'>Employee Updated Successfully.</div>";
}

if($_GET['msg']=="deleted")
{
echo "<div class='alert alert-danger'>Employee Deleted Successfully.</div>";
}

}

?>

<!-- Dashboard Cards -->

<div class="row">

<div class="col-md-3 mb-3">

<div class="card bg-primary text-white shadow">

<div class="card-body text-center">

<h5>Total Employees</h5>

<h2><?php echo $totalEmployees; ?></h2>

</div>

</div>

</div>

<div class="col-md-3 mb-3">

<div class="card bg-success text-white shadow">

<div class="card-body text-center">

<h5>Departments</h5>

<h2>5</h2>

</div>

</div>

</div>

<div class="col-md-3 mb-3">

<div class="card bg-warning text-dark shadow">

<div class="card-body text-center">

<h5>Status</h5>

<h2>Active</h2>

</div>

</div>

</div>

<div class="col-md-3 mb-3">

<div class="card bg-danger text-white shadow">

<div class="card-body text-center">

<h5>Cloud</h5>

<h2>AWS</h2>

</div>

</div>

</div>

</div>

<!-- Search + Add Button -->

<div class="card shadow mt-3">

<div class="card-body">

<div class="row">

<div class="col-md-8">

<form method="GET">

<input
type="text"
name="search"
class="form-control"
placeholder="Search Employee..."
value="<?php echo htmlspecialchars($search); ?>">

</div>

<div class="col-md-2">

<button class="btn btn-primary w-100">

Search

</button>

</div>

<div class="col-md-2">

<a href="add.php" class="btn btn-success w-100">

Add Employee

</a>

</div>

</form>

</div>

</div>

</div>

<!-- Employee Table -->

<div class="card shadow mt-4">

<div class="card-header bg-dark text-white">

<h4 class="mb-0">

Employee List

</h4>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-primary">

<tr>

<th>ID</th>

<th>Name</th>

<th>Department</th>

<th>Designation</th>

<th>Email</th>

<th>Phone</th>

<th>Salary</th>

<th>Joining Date</th>

<th width="170">Action</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo htmlspecialchars($row['employee_name']); ?></td>

<td><?php echo htmlspecialchars($row['department']); ?></td>

<td><?php echo htmlspecialchars($row['designation']); ?></td>

<td><?php echo htmlspecialchars($row['email']); ?></td>

<td><?php echo htmlspecialchars($row['phone']); ?></td>

<td>₹ <?php echo number_format($row['salary'],2); ?></td>

<td><?php echo htmlspecialchars($row['joining_date']); ?></td>

<td>

<a
href="edit.php?id=<?php echo $row['id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="delete.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure you want to delete this employee?')">

Delete

</a>

</td>

</tr>

<?php

}

}

else

{

?>

<tr>

<td colspan="9" class="text-center text-danger">

No Employee Found

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

<div class="text-center mt-4 mb-3">

<p class="text-muted">

Cloud Migration Project | AWS EC2 | Employee Management System

</p>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>