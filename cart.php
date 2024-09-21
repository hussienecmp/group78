    <table class="table table-stribed">
     <tr><th>Product</th><th>Price</th><th>QTY</th><th>Total</th></tr>
     <tr><th>Product One</th><th>200$</th><th>3</th><th><?php echo $pro1= product_price(20,3) ?></th></tr>
     <tr><th>Product One</th><th>300$</th><th>2</th><th><?php echo $pro2= product_price(300,2); ?></th></tr>
     <tr><th></th><th></th><th></th><th><?php 
            $products_price= $pro1+$pro2;
            if($products_price>=1000){
                
                echo total_cart($products_price);
                echo " shipping price 0";
            }else{
                echo total_cart($products_price,40); 
                echo " shipping price 40";
            }
               ?></th></tr>
  </table>
 