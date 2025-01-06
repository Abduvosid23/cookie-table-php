<?php
include 'app.php';

session_start();

header("Refresh:3");
$cookie = new Student();

if (isset($_SESSION['delete'])) {
  echo '<div class="alert alert-danger role="alert">' . $_SESSION["delete"] . '.</div>';
  unset($_SESSION['delete']);
}

if (isset($_SESSION['added'])) {
  echo '<div class="alert alert-primary role="alert">' . $_SESSION["added"] . '.</div>';
  unset($_SESSION['added']);
}

if (isset($_SESSION['updated'])) {
  echo '<div class="alert alert-success role="alert">' . $_SESSION["updated"] . '.</div>';
  unset($_SESSION['updated']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Students info</title>
</head>

<body>
  <main>
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Student_id</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($cookie->students as $key => $value): ?>
            <tr>
              <th scope="row"><?php echo $value['id']; ?></th>
              <td><?php echo $value['email']; ?></td>
              <td><?php echo $value['name']; ?></td>
              <td><?php echo $value['student_id']; ?></td>
              <td>
                <form method="GET" action="update.php" style="display:inline;">
                  <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                  <button type="submit" class="btn btn-success">Update</button>
                </form>

                <form method="POST"  style="display:inline;">
                  <input type="hidden" name="delete_id" value="<?php echo $value['id']; ?>">
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
      <button class="btn btn-success">
        <a href="create.php" style="color:white; text-decoration:none">Create</a>
      </button>
  </main>
  </div>
</body>

</html>