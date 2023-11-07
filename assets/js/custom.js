$(document).ready(function(){
    $('.addToCartButton').click(function(e){
        e.preventDefault();
        var prod_id = $(this).val();
        
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "scope": "add"
            },
            success: function(response){
                if(response == 201){
                    alertify.success("Product added to cart");
                }
                else if (response == "existing"){
                    alertify.success("Product already added to the cart");
                }
                else if (response == 401){
                    alertify.success("login to continue");
                }
                else if (response == 500){
                    alertify.success("Something went wrong");
                }
            }
        })
    })
});