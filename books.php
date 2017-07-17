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
        <div class="panel_heading">
            <strong>Books</strong>
            <form style="float:right;">
                <label>Search</label>
                <input class="input_text col-8" type="text" id="bookSearch"
                       onkeyup="showResult(this.value,'searchBook')">
            </form>
        </div>
        <div class="panel_body" style="max-height: 120%;min-width: 100%;overflow: auto">
            <span id="count"></span>
            <?php
            $book = new Book();
            $books = $book->getAll();
            if (count($books)) {
                ?>
                    <?php
                    $i = 0;
                    foreach ($books as $b) {
                        $isbn = $b->isbn;
                        $price = $b->price;
                        $i++;
                        ?>
                        <test>
                        <div id="<?php echo "data" . $b->id; ?>" class="col-lg-4 trcls" style="background-color : whitesmoke;">
                          <div class="">
                            <center><img src="styles/img/icons/books.png" width="200px" height="200px"></center>
                          </div>
                          <div class="book-detail">
                            <center>
                              <p><a class=""><?php echo $b->name ?></a></p></br>
                              <?php echo $b->isbn ?> </br>
                              <?php echo $b->price ?> </br>
                              <?php echo $b->count?> </br>
                              <a href="confirm_order.php?isbn=<?php echo $isbn; ?>&price=<?php echo $price; ?>"><button type="button" onclick="orderp()" class="btn btn-default">Order</button></a>
                            </center>
                          </div>
                        </div>
                        <div id="tbl" style="display:none;">
                            <table border="1">
                              <tr id="<?php echo "tr" . $b->id; ?>" class="trcls">
                                <td><?php echo $b->name ?></td>
                                <td><?php echo $b->isbn ?></td>
                                <td><?php echo $b->price ?></td>
                                <td><?php echo $b->count?></td>
                              </tr>
                            </table>
                        </div>
                      </test>
                        <!-- <tr id="<?php echo "tr" . $b->id ?>" class="trcls">
<!--                            <td>--><?php //echo $i ?><!--</td>-->
                            <!-- <td><img src="styles/img/icons/pdf-icon.png" style="height: 50px"></td>
                            <td><?php echo $b->name ?></td>
                            <td><?php echo $b->isbn ?></td>
                            <td><?php echo $b->price ?></td>
                            <td><?php echo $b->count?></td>
                            <td> -->
                               <!--  <a href="download_books.php?id=<?php echo $b->id ?>" onclick="return confirm('Are You Sure?')">Download</a> -->
                                <!-- <a href="confirm_order.php?isbn=<?php echo $isbn; ?>&price=<?php echo $price; ?>"><button type="button" onclick="orderp()" class="btn btn-default">Order</button></a> -->
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
                <?php
            } else {
                echo 'No books found';
            }
            ?>
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
