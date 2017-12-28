$(document).ready(function() {
    product() ;
    category() ;
    brand() ;
    getCartCount() ;

    function getCartCount() {
        $.ajax({
            url: "action.php" ,
            method: "POST" ,
            data : {getCartCount:1} ,
            success : function(data) {
                $("#cart_count").html(data) ;
            }
        })
    }

    // GET ALL PRODUCT
  function product() {
    $.ajax({
      url: "action.php" ,
      method: "POST" ,
      data : {getProducts:1} ,
      success : function(data) {
        $("#get_product").html(data) ;
      }
    })
  }
    //GET ALL CATEGORY
  function category() {
      $.ajax({
          url: "action.php" ,
          method: "POST" ,
          data: {getCategory : 1} ,
          success: function(data) {
              $("#get_category").html(data) ;
          }
      }) ;
  }

  //GET ALL BRAND
  function brand() {
      $.ajax({
          url: "action.php" ,
          method: "POST" ,
          data: {getBrand : 1} ,
          success: function (data) {
              $("#get_brand").html(data) ;
          }
      })
  }

  //ADD PRODUCT TO CART
    $("body").delegate(".product" , "click" , function (event) {
        event.preventDefault() ;
        var pid = $(this).attr("pid") ;
        // alert(pid) ;
        $.ajax({
            url: "action.php" ,
            method: "POST" ,
            data: {addProductToCart: 1 , pid:pid} ,
            success: function (data) {
                // alert(data) ;
                // swal(data);
                $("#cart_status").html(data) ;
                swal("Success !", data, "success") ;
                getCartCount() ;

            }
        }) ;



    }) ;

    //GET SELECTED CATEGORY
    $("body").delegate(".category" , "click", function (event) {
        event.preventDefault() ;
        var cid = $(this).attr("cid") ;
        $.ajax({
            url: "action.php" ,
            method: "POST" ,
            data: {getSelectedCategory : 1 , cid :cid},
            success: function (data) {
                $("#get_product").html(data) ;

            }
        }) ;
    }) ;

    //GET SELECTED BRAND
    $("body").delegate(".brand" , "click", function (event) {
        event.preventDefault() ;
        var bid = $(this).attr("bid") ;
        $.ajax({
            url: "action.php" ,
            method: "POST" ,
            data: {getSelectedBrand : 1 , bid :bid},
            success: function (data) {
                $("#get_product").html(data) ;

            }
        }) ;
    }) ;

    //SORT
    $("body").delegate(".sort" , "click" , function (event) {
       event.preventDefault() ;
       var sid = $(this).attr("id") ;
       // swal(sid) ;
        $.ajax({
            url: "action.php" ,
            method: "POST" ,
            data: {sortProduct : 1 , sid :sid},
            success: function (data) {
                $("#get_product").html(data) ;

            }
        }) ;

    });

    //GET CART STATUS
    $("body").delegate("#cart" , "click", function (event) {
        event.preventDefault() ;
        // swal("Hello") ;
        $.ajax({
            url: "action.php" ,
            method: "POST" ,
            data: {getCartStatus : 1},
            success: function (data) {
                $("#cart_status").html(data) ;

            }
        }) ;
    }) ;

    //ADJUST QUANTITY
    $("body").delegate(".quantity" , "keyup" , function (event) {
        // swal("Hello") ;
       var pid = $(this).attr("pid") ;
       var quantity = $("#quantity-" + pid).val() ;
       var price = $("#price-" + pid).val() ;
       var total = quantity * price ;
       $("#total-" + pid).val(quantity * price) ;
        $.ajax({
            url: "action.php" ,
            method: "POST" ,
            data: {updateQuantity : 1 , pid: pid , quantity: quantity , total: total },
            success: function (data) {
                sumTotal() ;
            }
        }) ;
       // total();



    });
    total() ;
    function total() {
        var pid = 1 ;
        var total = 0   ;
        for(pid = 1 ; pid < 100 ; pid = pid + 1){
            if($("#total-" + pid).val() != null){
                total += parseFloat($("#total-" + pid).val()) ;
            }
        }
        $(".total").html(total + " đ") ;

    }

    function sumTotal() {
        $.ajax({
            url: "action.php" ,
            method: "POST" ,
            data: {sumTotal : 1},
            success: function (data) {
                $(".total").html(data + " đ") ;

            }
        }) ;
    }

    function checkSendable() {
        var total = $("#total").text() ;
        if(total === "0 đ"){

            console.log(total) ;
            $("#info").addClass("disabledbutton") ;
        } else {
            $("#info").removeClass("disabledbutton") ;
        }
    }
    checkSendable() ;






});
