$(document).ready(function () {
  $(document).on("click", ".increment_btn", function () {
    e.preventDefault();
    console.log("clicked");

    var inputQty = $(this).closest(".product_data").find(".input_qty");
    var qty = inputQty.val();

    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;

    // Always increment the value
    if (value < 10) {
      value++;

      inputQty.val(value); // Update the input with the incremented value
    }
  });
  $(document).on("click", ".decrement_btn", function () {
    e.preventDefault();
    // console.log("clicked");

    var inputQty = $(this).closest(".product_data").find(".input_qty");
    var qty = inputQty.val();

    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;

    // Always increment the value
    if (value > 1) {
      value--;

      inputQty.val(value); // Update the input with the incremented value
    }
  });

  $(".addToCartButton").click(function (e) {
    
    e.preventDefault();
    var inputQty = $(this).closest(".product_data").find(".input_qty");
    var qty = inputQty.val();
    var prod_id = $(this).val();

    $.ajax({
      method: "POST",
      url: "functions/handlecart.php",
      data: {
        prod_id: prod_id,
        prod_qty: qty,
        scope: "add",
      },
      success: function (response) {
        if (response == 201) {
          alertify.success("Product added to cart");
        } else if (response == "existing") {
          alertify.success("Product already added to the cart");
        } else if (response == 401) {
          alertify.success("login to continue");
        } else if (response == 500) {
          alertify.success("Something went wrong");
        }
      },
    });
  });
  $(document).on("click", ".updateQTY", function () {
    var inputQty = $(this).closest(".product_data").find(".input_qty");
    var qty = inputQty.val();
    var prod_id = $(this).closest(".product_data").find(".prodId").val();

    $.ajax({
      method: "POST",
      url: "functions/handlecart.php",
      data: {
        prod_id: prod_id,
        prod_qty: qty,
        scope: "update",
      },
      success: function (response) {},
    });
  });
  $(document).on("click", ".deleteItem", function () {
    var cart_id = $(this).val();

    $.ajax({
      method: "POST",
      url: "functions/handlecart.php",
      data: {
        cart_id: cart_id,
        scope: "delete",
      },
      success: function (response) {
        if (response == 200) {
          alertify.success("Item Deleted");
          $("#myCart").load(location.href + " #myCart");
        } else {
          alertify.success(response);
        }
      },
    });
  });
});
