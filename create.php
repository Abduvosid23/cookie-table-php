<?php
include 'app.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Document</title>
</head>
<body>
<main class="form-signin">
    <form method="post" action="">

        <h1 class="h3 mb-3 fw-normal">Adding Students</h1>

        <div class="form-floating">
            <label for="floatingInput">Email address</label>
            <input type="text" name="email" class="form-control" required />
        </div>
        <div class="form-floating">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required />
        </div>
        <div class="form-floating">
            <label>Student Id</label>
            <input type="id" name="student_id" class="form-control" required />
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Submit</button>
    </form>
</main>
</body>
</html>
