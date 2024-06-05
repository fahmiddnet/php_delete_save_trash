<?php include('./db/queres.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Information and Trash box</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-info sticky-top" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">STUDENT INFORMATION</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Inforamtion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Log out</a>
        </li>
      </ul>  
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="d-flex justify-content-end" role="search">
      <input class="form-control me-2" type="search" name="searchText" placeholder="Search" aria-label="Search">
      <button class="btn btn-primary" name="submit" type="submit">Search</button>
    </form>
  </div>
</nav>
