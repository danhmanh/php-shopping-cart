<?php
/**
 * Created by PhpStorm.
 * User: danhm
 * Date: 06-Dec-17
 * Time: 04:24 PM
 */

include 'dbconfig.php' ;
session_start() ;
if(isset($_POST["getProducts"])){
    $preState = $PDO->prepare("SELECT * FROM products") ; 
    $preState->execute() ;


    $no = 0 ;
    $_SESSION["count"] = $no ;
    while ($row = $preState->fetch()){

        $id = $row["product_id"] ;
        $title = $row["product_title"] ;
        $price = $row["product_price"] ;
        $image = $row["product_image"] ;
        $description = $row["product_description"];
        if ($no % 3 == 0 ){
            echo "
                <div class = 'row'>
            ";
        }
        $no = $no + 1 ;
        echo "
        <div class='col-md-4 text-center col-sm-6 col-xs-6'>
             <div class='panel panel-default' style='width: 242px , height=300px'>
                  <div class='panel-body'>
                        <img src='assets/img/$image' alt='' class='img-responsive'/>
                            <div class='caption'>
                                <h3><a href='#'>$title</a></h3>
                                <p>Price : <strong> $price đ</strong>  </p>
                                <p><a href='#'>Ptional dismiss button </a></p>
                                <p>$description</p>
                                
                                <a href='#' class='btn btn-success product' role='button'  pid = $id >
                                Add To Cart</a>
                                <a href='detailproduct.php?pid=$id' class='btn btn-primary detail'  role='button' pid = $id>See Details</a>
                            </div>    
                  </div>
                            
             </div>
        </div>
        
        
        ";

        if ($no % 3 == 0 ){
            echo "
                </div>
            ";
        }



//        echo $no ;
    }
}

if(isset($_POST["getCategory"])){
    $preState = $PDO->prepare(/** @lang sql */
        "SELECT * FROM categories") ;
    $preState->execute() ;

    
    echo /** @lang html */
    "<div>
            <a href='#' class='list-group-item active list-group-item-success'>Category</a>
            <ul class='list-group'>
 " ;

    while($row = $preState->fetch()){
        $title = $row["category_title"] ;
        $id = $row["category_id"] ;
        // Add number badge

        $preState1 = $PDO->prepare("SELECT COUNT(*)
FROM categories , products WHERE products.category_id = categories.category_id AND products.category_id = '$id'") ;
        $preState1->execute() ;

        while ($row = $preState1->fetch()){
            $count =  $row["COUNT(*)"] ;
            echo /** @lang html */
            "
           <li class='list-group-item'>
              <a href='#' class = 'category' cid= '$id'>$title</a>
              <span class='label label-primary pull-right'>$count</span>
           </li>
         ";
        }

    }



    echo "</ul></div>" ;
}

if(isset($_POST["getBrand"])){
    $preState = $PDO->prepare("SELECT * FROM brands  
ORDER BY `brands`.`brand_title` ASC") ;
    $preState->execute() ;


    echo "<div>
            <a href='#' class='list-group-item active list-group-item-success'>Brand</a>
            <ul class='list-group'>
 " ;

    while($row = $preState->fetch()){
        $title = $row["brand_title"] ;
        $id = $row["brand_id"] ;

        $preState1 = $PDO->prepare("SELECT COUNT(*)
FROM brands , products WHERE products.brand_id= brands.brand_id AND products.brand_id = '$id'") ;
        $preState1->execute() ;

        while ($row = $preState1->fetch()){
            $count =  $row["COUNT(*)"] ;
            echo /** @lang html */
            "
           <li class='list-group-item'>
              <a href='#' class = 'brand' bid = '$id'>$title</a>
              <span class='label label-primary pull-right'>$count</span>
           </li>
         ";
        }


    }



    echo "</ul></div>" ;
}

if(isset($_POST["addProductToCart"])) {
    $pid = $_POST["pid"] ;
    $preState = $PDO->prepare(/** @lang sql */
        "SELECT * FROM carts WHERE product_id = '$pid'" ) ;
    $preState->execute() ;
    if($preState->rowCount() > 0){
       echo "Product already in your cart!" ;
       exit() ;

    } else {
        //Lấy info của product chuẩn bị thêm
        $preStateProduct = $PDO->prepare("SELECT * FROM  products WHERE product_id = '$pid'") ;
        $preStateProduct->execute() ;

        while ($row = $preStateProduct->fetch()){
            $price = $row["product_price"] ;
            $image = $row["product_image"] ;
            $title = $row["product_title"] ;
        }

        $preState = $PDO->prepare("INSERT INTO `carts` (`cart_id`, `product_id`, `customer_id`, `quantity`, `price`, `total`) VALUES (NULL, '$pid', '1', '1', '$price', '$price'); ") ;
        $preState->execute() ;

        echo "Product is added" ;
    }

}

if(isset($_POST["getSelectedCategory"]) || isset($_POST["getSelectedBrand"]) || isset($_POST["sortProduct"])) {

    if(isset($_POST["getSelectedCategory"])) {
        $cid  = $_POST["cid"] ;
        $preState = $PDO->prepare(/** @lang sql */
            "SELECT * FROM products WHERE  products.category_id = '$cid'") ;
    }

    elseif (isset($_POST["getSelectedBrand"])) {
        $bid  = $_POST["bid"] ;
        $preState = $PDO->prepare(/** @lang sql */
            "SELECT * FROM products WHERE  products.brand_id = '$bid'") ;
    }

    elseif (isset($_POST["sortProduct"])){
        $sid = $_POST["sid"];
        if ($sid == "09"){
            $preState = $PDO->prepare("SELECT * FROM `products` ORDER BY `products`.`product_price` ASC");
        } elseif ($sid == "90"){
            $preState = $PDO->prepare("SELECT * FROM `products` ORDER BY `products`.`product_price` DESC");
        }
    }
    $preState->execute() ;
    $no = 0 ;
    while ($row = $preState->fetch()){

        $id = $row["product_id"] ;
        $title = $row["product_title"] ;
        $price = $row["product_price"] ;
        $image = $row["product_image"] ;
        $description = $row["product_description"];
        if ($no % 3 == 0 ){
            echo "
                <div class = 'row'>
            ";
        }
        $no = $no + 1 ;
        echo "
        <div class='col-md-4 text-center col-sm-6 col-xs-6'>
                        <div class='thumbnail product-box' style='width: 242px , height=300px'>
                            <img src='assets/img/$image' alt='' class='img-responsive'/>
                            <div class='caption'>
                                <h3><a href='#'>$title</a></h3>
                                <p>Price : <strong> $price đ</strong>  </p>
                                <p><a href='#'>Ptional dismiss button </a></p>
                                <p>$description</p>
                                
                                <a href='#' class='btn btn-success product' role='button'  pid = $id >
                                Add To Cart</a>
                                <a href='detailproduct.php?pid=$id' class='btn btn-primary detail'  role='button' pid = $id>See Details</a>
                            </div>
                        </div>
                    </div>
        
        
        ";

        if ($no % 3 == 0 ){
            echo "
                </div>
            ";
        }
    }

}

if(isset($_POST["getCartStatus"])) {
    $preState = $PDO->prepare("SELECT * FROM carts , products WHERE carts.product_id = products.product_id") ;
    $preState->execute() ;
    $no = 1 ;
    while ($row = $preState->fetch()){
        $image = $row["product_image"] ;
        $title  =$row["product_title"] ;
        $price = $row["product_price"] ;

        echo "
            <div class='row'>
                <div class='col-md-3'>$no</div>
                <div class='col-md-3'><img src='assets/img/$image' class='img-responsive'></div>
                <div class='col-md-3'>$title</div>
                <div class='col-md-3'>$price</div>
            </div>
        
        ";
        $no = $no + 1 ;
    }
}

if(isset($_POST["getCartCount"])){
    $preState = $PDO->prepare("SELECT count(*) FROM carts ") ;
    $preState->execute() ;
    $row = $preState->fetch() ;
    echo $row["count(*)"] ;
}

if(isset($_POST["updateQuantity"])){
    $quantity = $_POST["quantity"] ;
    $total = $_POST['total'] ;
    $pid = $_POST['pid'] ;

    $preState = $PDO->prepare("UPDATE `carts` SET quantity = $quantity , total = $total WHERE product_id = $pid") ;
    $preState->execute() ;
}

if(isset($_POST["sumTotal"])){
    $preState = $PDO->prepare("SELECT * FROM carts") ;
    $preState->execute() ;
    $total = 0 ;
    while($row = $preState->fetch()){
//        $quantity  = $row['quantity'];
//        $price = $row['price'] ;
//        echo $row['total'] . "<br>";
        $total = $total +  $row['total'] ;

    }

    echo  $total ;
}