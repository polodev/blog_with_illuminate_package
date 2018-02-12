<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/bootstrap.css">
  <script src="/assets/jquery.js"></script>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">UY23 blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/dashboard/home">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/category">Category</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <?php if (is_authenticate()): ?>
      <li class="nav-item">
        <a class="nav-link" href="/logout">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">View Website</a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
