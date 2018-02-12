<?php
require 'partials/header.php';

$errors = [];
$old_values = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $old_values['email'] = $email;
  $old_values['password'] = $password;

  if (strlen($email) < 4) {
    $errors['email'] = "email value can't be less than 4 character";
  } else if (!is_email_exists($email)) {
    $errors['email'] = "email not found in database";
  } 
  if (strlen($password) <= 4) {
    $errors['password'] = "password value can't be less than 4 character";
    $old_values['password'] = $password;
  }
  if (empty($errors)) {
    $old_values=[];
    $user = User::where('email', $email)->first();
    if (password_verify($password, $user->password)) {
      $_SESSION['user'] = $user;
      header('Location: /');
    } else {
      $old_values['email'] = $email;
      $errors['password'] = "wrong password. Please attempt again with right password";
    }
  }

}







?>
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
                <input value="<?php echo $old_values['email'] ?? ''; ?>" type="email" name="email" id="email" class="form-control">
                <?php if(isset($errors['email'])): ?>
                  <small class="text-danger"><?php echo $errors['email'] ?></small>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input value="<?php echo $old_values['password'] ?? ''; ?>" type="password" name="password" id="password" class="form-control">
                <?php if(isset($errors['password'])): ?>
                  <small class="text-danger"><?php echo $errors['password'] ?></small>
                <?php endif; ?>
            </div>
            <div class="form-group">
              <p>
                Don't have a account ? <a href="/register">Register here</a>
              </p>
              <button type="submit" class="btn btn-outline-primary">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require 'partials/footer.php'; ?>