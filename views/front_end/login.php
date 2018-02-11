<?php require 'partials/header.php'; ?>
<div class="mt-5">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card mb-5">
        <div class="card-header">
          <h2>Login</h2>
        </div>
        <div class="card-body">
          <form method="post" action="">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
              <p>
                Don't have account? <a href="/register">Register Here</a>
              </p>
              <button type="submit" class="btn btn-outline-info">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require 'partials/footer.php'; ?>