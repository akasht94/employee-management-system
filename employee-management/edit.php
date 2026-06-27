<?php
include 'db.php';

// Check if ID is provided
if(!isset($_GET['id']))
{
    header("Location:index.php");
    exit();
}

$id = intval($_GET['id']);

// Fetch employee details
$result = mysqli_query($conn,"SELECT * FROM employees WHERE id=$id");

if(mysqli_num_rows($result)==0)
{
    die("Employee not found.");
}

$row = mysqli_fetch_assoc($result);

// Update record
if(isset($_POST['update']))
{
    $name = mysqli_real_escape_string($conn,$_POST['employee_name']);
    $department = mysqli_real_escape_string($conn,$_POST['department']);
    $designation = mysqli_real_escape_string($conn,$_POST['designation']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $salary = mysqli_real_escape_string($conn,$_POST['salary']);
    $joining = mysqli_real_escape_string($conn,$_POST['joining_date']);

    $sql = "UPDATE employees SET
            employee_name='$name',
            department='$department',
            designation='$designation',
            email='$email',
            phone='$phone',
            salary='$salary',
            joining_date='$joining'
            WHERE id=$id";

    if(mysqli_query($conn,$sql))
    {
        header("Location:index.php?msg=updated");
        exit();
    }
    else
    {
        echo "<div class='alert alert-danger'>Update Failed.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Employee</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning">

<h3>Edit Employee</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">

<label>Employee Name</label>

<input
type="text"
name="employee_name"
class="form-control"
value="<?php echo $row['employee_name']; ?>"
required>

</div>

<div class="col-md-6 mb-3">

<label>Department</label>

<select
name="department"
class="form-select">

<?php
$departments=["IT","HR","Finance","Sales","Marketing"];

foreach($departments as $dept)
{
    $selected = ($dept==$row['department']) ? "selected" : "";
    echo "<option $selected>$dept</option>";
}
?>

</select>

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>Designation</label>

<input
type="text"
name="designation"
class="form-control"
value="<?php echo $row['designation']; ?>">

</div>

<div class="col-md-6 mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?php echo $row['email']; ?>">

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control"
value="<?php echo $row['phone']; ?>">

</div>

<div class="col-md-6 mb-3">

<label>Salary</label>

<input
type="number"
name="salary"
class="form-control"
value="<?php echo $row['salary']; ?>">

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>Joining Date</label>

<input
type="date"
name="joining_date"
class="form-control"
value="<?php echo $row['joining_date']; ?>">

</div>

</div>

<button class="btn btn-warning" name="update">

Update Employee

</button>

<a href="index.php" class="btn btn-secondary">

Cancel

</a>

</form>

</div>

</div>

</div>

</body>

</html>