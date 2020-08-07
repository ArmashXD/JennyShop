function lightbg_clr() {
  $("#qu").val("");
  $("#textbox-clr").text("");
  $("#search-layer").css({
    width: "auto",
    height: "auto",
  });
  $("#livesearch").css({
    display: "none",
  });
  $("#qu").focus();
}

function fx(str) {
  var s1 = document.getElementById("qu").value;
  var xmlhttp;
  if (str.length == 0) {
    $("livesearch").html("");
    $("livesearch").css("border", "0px");
    // document.getElementById("search-layer").style.width = "auto";
    // document.getElementById("search-layer").style.height = "auto";
    document.getElementById("livesearch").style.display = "block";
    $("#textbox-clr").text("");
    return;
  }
  $.ajax({
    type: "POST",
    url: "views/search_ajax.php",
    data: {
      search: s1,
    },
    success: function (response) {
      document.getElementById("livesearch").innerHTML = response;
      // document.getElementById("search-layer").style.width = "100%";
      // document.getElementById("search-layer").style.height = "100%";
      document.getElementById("livesearch").style.display = "block";
      $("#textbox-clr").text("X");
    },
  });
}
//cart

$(() => {
  load_cart_data();
  $("#cart-popover").popover({
    html: true,
    container: "body",
    content: function () {
      return $("#popover_content_wrapper").html();
    },
  });
  //loading cart data
  function load_cart_data() {
    $.ajax({
      url: "views/cart_ajax.php",
      method: "POST",
      dataType: "json",
      success: function (data) {
        $("#cart_details").html(data.cart_details);
        $(".total_price").text(data.total_price);
        $(".badge").text(data.total_item);
      },
    });
  }
  //adding cart
  $(".add_to_cart").click(() => {
    var product_id = $(this).attr("id");
    var product_name = $("#name" + product_id + "").val();
    var product_price = $("#price" + product_id + "").val();
    var product_quantity = $("#quantity" + product_id).val();

    var action = "add";
    if (product_quantity > 0) {
      $.ajax({
        url: "views/cart_action.php",
        method: "POST",
        data: {
          product_id: product_id,
          product_name: product_name,
          product_price: product_price,
          product_quantity: product_quantity,
          action: action,
        },
        success: function (data) {
          load_cart_data();
          swal("Added", "Item Has Been Added To Cart", "success");
        },
      });
    } else {
      swal("Error", "Some Error Occured", "error");
    }
  });
  //deleting single cart item
  $(document).on("click", ".delete", () => {
    var product_id = $(this).attr("id");
    var action = "remove";
    swal({
      title: "Are you sure?",
      text: "Your Item will be removed",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "views/cart_action.php",
          method: "POST",
          data: { product_id: product_id, action: action },
          success: function () {
            load_cart_data();
            $("#cart-popover").popover("hide");
            swal("Removed", "Item has been removed from your cart", "success");
          },
        });
      } else {
        return false;
      }
    });
  });
  //clearing cart
  $(document).on("click", "#clear_cart", () => {
    var action = "empty";
    $.ajax({
      url: "views/cart_action.php",
      method: "POST",
      data: { action: action },
      success: function () {
        load_cart_data();
        $("#cart-popover").popover("hide");
        swal("Cleared", "Your cart is cleared now !", "success");
      },
    });
  });

  // var quantiyProdDetail = $(".qty").val();
  // var email = $("#loginEmail");

  // function validateEmail(email) {
  //   var re = /\S+@\S+\.\S+/;
  //   return re.test(email);
  // }
  // if (validateEmail(email)) {
  //   email.css("border", "1px solid green");
  //   return true;
  // } else {
  //   email.css("border", "1px solid red");
  //   return false;
  // }
});
