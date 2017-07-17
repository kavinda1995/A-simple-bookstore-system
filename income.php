<?php
require_once 'core/init.php';

include_once 'auth.php';
if (!$user->isLoggedIn()) {
    Redirect::to('login.php');
}
if(!$user->isAdmin()){
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
            <li><a href="books.php">Income</a>&raquo</li>
        </ul>
    </div>
    <div class="income">
      <?php
          $conn = mysqli_connect("localhost","root","","bookstore_db");
          if (!$conn){
            die("error in DB connection");
          }else{
            $sql = "SELECT SUM(order_price) FROM bookstore_db.order";
            $res = mysqli_query($conn,$sql);
            foreach ($res as $total){
              $totalSales = $total['SUM(order_price)'];
            }
          }
      ?>
      <div class="">
          <center><h1><strong>Total Sales Income</strong></h1></center>
          <span class="sales">
            <center>RS: <b><?php echo $totalSales; ?>/=</b></center>
          <span>
      </div>

      <div class="panel_body" style="max-height: 350px;min-width: 100%;overflow: auto">
          <span id="count"></span>
          <?php
          $sql = 'SELECT * FROM bookstore_db.order';
          $books_db = DB::getInstance();
          $books_db->query($sql, array());
          $books = $books_db->results();
          if (count($books)){
          ?>
          </br>
          <hr>
          </br>
          <table>
              <thead>
              <tr>
                  <th>Book ISBN</th>
                  <th>Price</th>
                  <th>Time Ordered</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $i = 0;
              foreach ($books as $book) {
                  $i++;
                  ?>
                  <tr class="trcls">
                      <td><?php echo $book->order_isbn ?></td>
                      <td><?php echo $book->order_price ?></td>
                      <td><?php echo $book->order_time ?></td>
                  </tr>
              <?php
              }
              } else {
                  echo '<tr>No orders found</tr>';
              }
              ?>
              </tbody>
          </table>
      </div>
    </div>
</div>
</body>
</html>
