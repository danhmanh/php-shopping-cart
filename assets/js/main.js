$(document).ready(function() {
    product() ;
    category() ;
    brand() ;


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

  //CLICK TO BUY
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
                swal("Success !", data, "success");

            }
        }) ;
    }) ;

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
    })

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

    $("body").delegate(".detail" , "click" , function (event) {
        var pid = $(this).attr("pid") ;




    });

});
