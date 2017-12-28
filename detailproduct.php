<?php
/**
 * Created by PhpStorm.
 * User: danhm
 * Date: 07-Dec-17
 * Time: 10:26 PM
 */
?>

<?php
include 'dbconfig.php' ;
include 'header.php' ;
if(isset($_GET['pid'])){
    $pid = $_GET['pid'] ;
    $preState  = $PDO->prepare("SELECT * FROM products WHERE product_id= '$pid'") ;
    $preState->execute() ;
    $row = $preState->fetch() ;
        $image = $row["product_image"] ;
        $price = $row['product_price'] ;
        $title = $row['product_title'] ;
        $description  = $row['product_description'] ;
    $preStateBrand = $PDO->prepare("SELECT brand_title FROM brands , products WHERE brands.brand_id = products.brand_id AND  product_id = $pid") ;
    $preStateBrand->execute() ;
    $rowB = $preStateBrand->fetch() ;
        $brand = $rowB['brand_title'] ;

}

?>

?>


<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><strong>Just Monika</strong> Shop</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart  <span class="badge">0</span></a>
                    <div class="dropdown-menu" style="width:400px;">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-3">Sl.No</div>
                                    <div class="col-md-3">Product Image</div>
                                    <div class="col-md-3">Product Name</div>
                                    <div class="col-md-3">Price in $.</div>
                                </div>
                            </div>
                            <div class="panel-body"></div>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">24x7 Support <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><strong>Call: </strong>+09-456-567-890</a></li>
                        <li><a href="#"><strong>Mail: </strong>info@yourdomain.com</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><strong>Address: </strong>
                                <div>
                                    234, New york Street,<br />
                                    Just Location, USA
                                </div>
                            </a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" placeholder="Smartphone, phụ kiện, vv..." class="form-control">
                </div>
                &nbsp;
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<br><br><br><br>
<div class="container">
    <div class="row">


        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <img src="assets/img/<?php echo $image ?>" class="img-responsive">
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <h1><?php echo $title ?></h1>
            <h3>Brand: <?php echo $brand ?></h3>
            <h3>Product ID: <?php echo $pid ?></h3>

            <p>Description: <?php echo $description ?></p>

            <h3>Price: <?php echo $price ?>đ</h3>

            <div class="row text-center" >
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary btn-lg product" pid = <?php echo $pid?>>Thêm vào giỏ hàng</button>
                </div>

                <div class="col-md-6">
                    <a href="index.php" class="btn btn-success btn-lg">Trở lại trang chủ</a>
                </div>
            </div>
        </div>


    </div>
</div>



<?php
include 'footer.php' ;
?>


