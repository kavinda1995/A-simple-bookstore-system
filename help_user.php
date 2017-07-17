<?php
require_once 'core/init.php';

include_once 'auth.php';
if (!$user->isLoggedIn()) {
    Redirect::to('login.php');
}
if ($user->isAdmin()) {
    Redirect::to('login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<?php include_once 'includes/header.php' ?>

<body>

<?php include_once 'includes/navigation.php' ?>

<div class="content">
    <div class="breadcrumb">
        <ul>
            <li><a href="user_dashboard.php">Dashboard</a>&raquo</li>
            <li><a href="books.php">Books</a>&raquo</li>
        </ul>
    </div>
    <div class="panel_background col-11">
        <div class="panel_heading header-text">
            <center><b><h1>Help</h1></b></center>
        </div>
        <div class="panel_body" style="max-height: 120%;min-width: 100%;overflow: auto">
          <div class="help_body">
            <center>
              <strong>Admin Email</strong> : Admin@bookstore.com</br>
              <strong>Admin Contact No : </strong> : 077 - XXX XXXX
            </center>
          </div>
        </div>
    </div>
</div>

<?php include_once 'includes/footer.php'; ?>
<script>
function orderp() {
    alert("Odrer is Successful");
}
</script>
</body>

</html>
