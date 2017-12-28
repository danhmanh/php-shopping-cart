<?php
/**
 * Created by PhpStorm.
 * User: danhm
 * Date: 10-Dec-17
 * Time: 03:09 PM
 */

include "header.php";
include 'dbconfig.php' ;

$preState = $PDO->prepare("SELECT * FROM carts , products WHERE products.product_id = carts.product_id") ;
$preState->execute() ;

if(isset($_GET['remove'])){
    $pid = $_GET['remove'] ;
    $preState = $PDO->prepare("DELETE FROM carts WHERE carts.product_id = '$pid'") ;
    $preState->execute() ;
    header("Location: checkout.php") ;
}

?>



<body>

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
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" id = "cart"><span class="glyphicon glyphicon-shopping-cart"></span>Cart <span class="badge" id  = "cart_count"></span></a>
                    <div class="dropdown-menu" style="width:400px;">
                        <div class="panel panel-success">
                            <div class="panel-heading">

                                <div class="row">
                                    <div class="col-md-3">Sl.No</div>
                                    <div class="col-md-3">Product Image</div>
                                    <div class="col-md-3">Product Name</div>
                                    <div class="col-md-3">Price in $.</div>
                                </div>

                                <!-- CART STATUS-->
                                <div id = "cart_status">


                                </div>
                            </div>
                            <div class="panel-body"></div>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </li>
                <li><a href="checkout.php">Checkout</a></li>
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

    <!-- PHẦN SẢN PHẨM KHÁCH HÀNG ĐÃ CHỌN -->
    <div class="row">
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-2">
                        <h3>SẢN PHẨM</h3></div>
                    <div class="col-md-3">
                        <h5>         </h5></div>
                    <div class="col-md-2">
                        <h3>GIÁ SẢN PHẨM</h3></div>
                    <div class="col-md-2">
                        <h3>SỐ LƯỢNG</h3></div>
                    <div class="col-md-2">
                        <h3>THÀNH TIỀN</h3></div>
                    <div class="col-md-1">
                        <h3>XÓA</h3></div>
                </div>
            </div>
            <div class="panel-body">
                <?php
                while ($row = $preState->fetch()){
                    $pid = $row["product_id"] ;
                    $image = $row["product_image"] ;
                    $title = $row["product_title"] ;
                    $price = $row["product_price"]  ;
                    $quantity = $row["quantity"] ;
                    $total = $row['total'] ;

                    echo "
                        <div class='row'>
                    <div class='col-md-2'>
                        <img src='assets/img/$image' class = 'img-responsive' alt='' style='width: 100px;height: 100px;'>
                    </div>
                    <div class='col-md-3'>
                        <p>$title</p>
                    </div>
                    
                    <div class='col-md-2'>
                        <input type='number' disabled class='form-control price' value='$price' id='price-$pid'>
                    </div>
                    
                    <div class='col-md-2'>
                        <input type='number' class='form-control quantity' value='$quantity' min= 1 pid = '$pid' id='quantity-$pid' required >
                    
                    </div>
                    <div class='col-md-2'>
                        <input type='number' disabled class='form-control total' value='$total' id = 'total-$pid' >
                    </div>
                    <div class='col-md-1'>
                        <a href='checkout.php?remove=$pid'><span class='glyphicon glyphicon-remove remove' pid = '$pid'></span></a>
                    </div>
                </div>
                    " ;
                }
                ?>
                <div class="row">
                    <div class="col-md-9"><h3 class = 'pull-right'>Tổng cộng:</h3></div>
                    <div class="col-md-3"><h3 id = "total" class="total"></h3></div>
                </div>

            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-1">
                        <p><span class="glyphicon glyphicon-user pull-right" style="font-size: 60px  ;"></span></p>
                    </div>
                    <div class="col-md-7">
                        <b><p>Mọi thắc mắc của Quý khách vui lòng liên hệ Hotline <span style  = "color: red ; "><b>0123.8288.879</b></span> để được giải đáp.</p><p>Xin trân trọng cảm ơn !</p></b>
                    </div>
                    <div class="col-md-4 pull-right" >


                        <a class="btn btn-primary pull-right" href="index.php">Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row" id="info">
        <!-- THÔNG TIN NGƯỜI MUA -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>1. THÔNG TIN KHÁCH HÀNG</h3>
                    <form action="confirminvoices.php" method="post" id="customer-detail">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Họ & tên (*)" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email (*)" required>
                        <p class="help-block">* INU sẽ gửi thông báo xác nhận đơn hàng theo email này</p>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="mobile" placeholder="Số điện thoại (*)" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="address" placeholder="Địa chỉ (*)" required>
                    </div>

                    <div class="form-group">
                        <textarea type="text" class="form-control" name="note" placeholder="Ghi chú thêm" rows="5"></textarea>
                        <i><p class="help-block">Các ô có dấu * cần điền đầy đủ thông tin</p></i>
                    </div>


                    </form>

<!--                    <button class="btn btn-success btn-lg pull-right">XÁC NHẬN THANH TOÁN</button>-->


                </div>
            </div>
        </div>


        <!-- PHƯƠNG THỨC THANH TOÁN -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>2. PHƯƠNG THỨC THANH TOÁN</h3>
                    <br>
                    <form>
                        <div class="radio">
                            <label><input type="radio" name="optradio" checked><b>Thanh toán sau khi nhận hàng</b></label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="optradio"><b>Thanh toán trước qua ngân hàng</b></label>
                        </div>



                    </form>

                    <div class="panel panel-default">
                        <div class="panel-body" style="background-color: #FAF8F9">
<!--                            <img src="BIDV.png" alt="" style = "width = 100px ; height = 100px" class="img-responsive">-->
                        </div>

                    </div>



                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>3. CHỐT ĐƠN HÀNG</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-6">Tổng tiền</div>
                        <div class="col-md-6 text-right total" id = "total"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">Phí vận chuyển</div>
                        <div class="col-md-6 text-right">30000 đ</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">Miễn phí vận chuyển</div>
                        <div class="col-md-6 text-right">- 30000 đ</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">Tổng tiền</div>
                        <div class="col-md-6 text-right total" id = "total"></div>
                    </div>
                </div>

                <div class="panel-footer">
                    <input class = "btn btn-danger btn-lg" type="submit" form="customer-detail" name = "submit" value="Gửi đơn hàng" id = "submit">
                </div>
            </div>


        </div>


    </div>
</div>



<?php
include 'footer.php' ;
?>

