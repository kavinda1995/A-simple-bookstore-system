<?php

  $conn = mysqli_connect("localhost","root","","bookstore_db");
  if (!$conn){
    die("error in DB connection");
  }else{

    $isbn = $_GET['isbn'];
    $price = $_GET['price'];
    $time = date("h:i:sa");

    $sql = "INSERT INTO bookstore_db.order VALUES ('$isbn','$price','$time')";
    $sql_count = "UPDATE bookstore_db.book SET count = count-1 WHERE isbn = '$isbn'";
    $sql_download = "UPDATE bookstore_db.book SET download_count = download_count+1 WHERE isbn = '$isbn'";

    $res = mysqli_query($conn,$sql);
    if (!$res){
      echo "Error in Query";
    }else{
      header('Location: books.php');
    }

    $res2 = mysqli_query($conn,$sql_count);
    if (!$res2){
      echo "Error in Query 2";
    }else{
      header('Location: books.php');
    }

    $res3 = mysqli_query($conn,$sql_download);
    if (!$res3){
      echo "Error in Query 3";
    }else{
      header('Location: books.php');
    }
  }
?>
