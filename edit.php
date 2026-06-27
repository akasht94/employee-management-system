<?php
include 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = (int)$_GET['id'];

/* Fetch employee */
$stmt = mysqli_prepare($conn, "SELECT * FROM employees WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    die("Employee not found.");
}

$row = mysqli_fetch_assoc($result);

$message = "";

/* Update employee */
if (isset($_POST['update'])) {

    $employee_name = trim($_POST['employee_name']);
    $department    = trim($_POST['department']);
    $designation   = trim($_POST['designation']);
    $email         = trim($_POST['email']);
    $phone         = trim($_POST['phone']);

    $salary = ($_POST['salary'] == "") ? NULL : $_POST['salary'];
    $joining_date = ($_POST['joining_date'] == "") ? NULL : $_POST['joining_date'];

    $stmt = mysqli_prepare($conn,
    "UPDATE employees
    SET
        employee_name=?,
        department=?,
        designation=?,
        email=?,
        phone=?,
        salary=?,
        joining_date=?
    WHERE id=?");

    mysqli_stmt_bind_param(
        $stmt,
        "sssssssi",
        $employee_name,
        $department,
        $designation,
        $email,
        $phone,
        $salary,
        $joining_date,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?msg=updated");
        exit();
    } else {
        $message = mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

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

<?php
if($message!="")
{
    echo "<div class='alert alert-danger'>$message</div>";
}
?>

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">

<label>Employee Name</label>

<input
type="text"
name="employee_name"
class="form-control"
required
value="<?php echo htmlspecialchars($row['employee_name']); ?>">

</div>

<div class="col-md-6 mb-3">

<label>Department</label>

<select
name="department"
class="form-select"
required>

<?php
$departments = ["IT","HR","Finance","Sales","Marketing"];

foreach($departments as $dept)
{
    $selected = ($dept == $row['department']) ? "selected" : "";
    echo "<option value='$dept' $selected>$dept</option>";
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
required
value="<?php echo htmlspecialchars($row['designation']); ?>">

</div>

<div class="col-md-6 mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required
value="<?php echo htmlspecialchars($row['email']); ?>">

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control"
value="<?php echo htmlspecialchars($row['phone']); ?>">

</div>

<div class="col-md-6 mb-3">

<label>Salary</label>

<input
type="number"
step="0.01"
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

<button
type="submit"
name="update"
class="btn btn-warning">

Update Employee

</button>

<a
href="index.php"
class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

</body>

</html>
