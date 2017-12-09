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
            <a class="navbar-brand" href="#"><strong>Just Monika</strong> Shop</a>
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
            <img src="https://vn-live-03.slatic.net/p/7/giay-sneakers-nam-converse-all-star-131841c-outlet-mau-den-1512293437-98279532-d1cc032039cacd11432ac7c190db57fb-webp-zoom_850x850.jpg" class="img-responsive">
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <h1>Divine Rapier</h1>
            <h3>Brand: Siren</h3>
            <h3>Product ID: xxx</h3>

            <p>Description: loalaoksdsanwqrsdfsafbk Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <h3>Price: 10000đ</h3>

            <div class="row text-center" >
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary btn-lg ">Mua Ngay</button>
                </div>

                <div class="col-md-6">
                    <button type="button" class="btn btn-success btn-lg">Thêm vào giỏ hàng</button>
                </div>
            </div>
        </div>


    </div>
</div>



<?php
include 'footer.php' ;
?>


