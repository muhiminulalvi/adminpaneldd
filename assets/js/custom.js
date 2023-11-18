// $(document).ready(function(){
//     $('.increment_btn').click(function (e) {
//         e.preventDefault();
//         console.log("clicked");
    
//         var inputQty = $(this).closest('.product_data').find('.input_qty');
//         var qty = inputQty.val();
    
//         var value = parseInt(qty, 10);
//         value = isNaN(value) ? 0 : value;
    
//         // Always increment the value
//         if(value < 10){
//             value++;
    
//             inputQty.val(value); // Update the input with the incremented value
//         }
        
//     });
//     $('.decrement_btn').click(function (e) {
//         e.preventDefault();
//         // console.log("clicked");
    
//         var inputQty = $(this).closest('.product_data').find('.input_qty');
//         var qty = inputQty.val();
    
//         var value = parseInt(qty, 10);
//         value = isNaN(value) ? 0 : value;
    
//         // Always increment the value
//         if(value > 1){
//             value--;
    
//             inputQty.val(value); // Update the input with the incremented value
//         }
        
//     });
    
//     $('.addToCartButton').click(function(e){
//         e.preventDefault();
//         var prod_id = $(this).val();
        
//         $.ajax({
//             method: "POST",
//             url: "functions/handlecart.php",
//             data: {
//                 "prod_id": prod_id,
//                 "scope": "add"
//             },
//             success: function(response){
//                 if(response == 201){
//                     alertify.success("Product added to cart");
//                 }
//                 else if (response == "existing"){
//                     alertify.success("Product already added to the cart");
//                 }
//                 else if (response == 401){
//                     alertify.success("login to continue");
//                 }
//                 else if (response == 500){
//                     alertify.success("Something went wrong");
//                 }
//             }
//         })
//     })
// });