<?php
// pages/login.php
session_start();
if (isset($_SESSION['role'])) {
    header('Location: dashboard_'.$_SESSION['role'].'.php');
    exit;
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cup N' Play - Login</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="login-wrap">
    <div class="login-card card">
      <h2>Join the coffee club. Brew-tiful moments are ahead.</h2>
      <form action="../php/auth.php" method="POST">
        <input name="employee_id" placeholder="Employee ID" required>
        <input name="name" placeholder="Employee name" required>
        <select name="role" required>
          <option value="">Select role</option>
          <option value="cashier">Cashier</option>
          <option value="manager">Manager</option>
        </select>
        <button type="submit">Log In</button>
      </form>
    </div>
  </div>
</body>
</html>
