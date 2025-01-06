<?php
include 'app.php';
session_start();

$cookie = new Student();
$student = [];

if (isset($_GET['id'])) {
    foreach ($cookie->students as $studentData) {
        if ($studentData['id'] == $_GET['id']) {
            $student = $studentData;
            break;
        }
    }
}

if (isset($_POST['update_id'])) {
    $info['id'] = $_POST['update_id']; 
    $info['email'] = $_POST['email'];
    $info['name'] = $_POST['name'];
    $info['student_id'] = $_POST['student_id'];

    $cookie->update($info);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Update Student</title>
</head>
<body>
<main class="form-signin">
  <form method="POST" action="">
    <h1 class="h3 mb-3 fw-normal">Updating Student Information</h1>

    <div class="form-floating">
      <label for="email">Email address</label>
      <input type="text" name="email" class="form-control" value="<?php echo $student['email']; ?>" required />
    </div>
    <div class="form-floating">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" value="<?php echo $student['name']; ?>" required />
    </div>
    <div class="form-floating">
      <label for="student_id">Student Id</label>
      <input type="text" name="student_id" class="form-control" value="<?php echo $student['student_id']; ?>" required />
    </div>
    <input type="hidden" name="update_id" value="<?php echo $student['id']; ?>" />
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="update">Update Student</button>
  </form>
</main>
</body>
</html>
