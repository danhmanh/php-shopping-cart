<?php
/**
 * Created by PhpStorm.
 * User: danhm
 * Date: 12-Dec-17
 * Time: 01:13 AM
 */
include 'dbconfig.php' ;
//echo "Start"  ;
if(isset($_POST['submit'])){

    $name  =  $_POST["name"] ;
    $email =  $_POST["email"] ;
    $mobile = $_POST["mobile"];
    $address = $_POST["address"] ;
    if (isset($_POST["note"])){
        $note = $_POST["note"] ;
    } else {
        $note = "" ;
    }

    echo $name . $email . $mobile . $address . $note ;

    $preState  = $PDO->prepare("INSERT INTO `customers` (`customer_id`, `name`, `email`, `mobile`, `address`) VALUES (NULL, '$name', '$email', '$mobile', '$address');") ;
    echo $preState->execute() ;


    $preState = $PDO->prepare("SELECT SUM(total) , customer_id , total FROM carts") ;
    $preState->execute() ;
    $total = $preState->fetch() ;



    //











    $preState1 = $PDO->prepare("INSERT INTO invoices (invoice_id, customer_id , detailproduct , total , note)") ;
    $preState1->execute() ;






}


?>