<?php
  class product{
    // Class properties
       private $name;
       public $price;
       public $desc;
       public $image;
    //Class Method.
     public function __construct($p_name,$p_price,$p_desc,$p_image) {
        $this->name=$p_name;
        $this->price=$p_price; 
        $this->desc=$p_desc;
        $this->image=$p_image;
    }
      private function show(){
            echo $this->name;
      } 
       function edit(){
         
      } 
      
      public function delete(){

      } 
  }
  class product_free_shipping extends product{
    // Class properties
     public $shipp_price;
    //Class Method.
      public function free_shiping(){
        $this->name='propro120';
      } 
  }


  $product1=new product('pr01',200,'aGFHSa ahsfgasgd','pr1.jpg');
  
 echo $product1->show();


  $product2=new product('pr2',300,'aGFH2Sa ahs2fgasgd','pr2.jpg');

  echo $product2->show();

  $product3=new product_free_shipping('pr3',500,'aGF3H2Sa ahs2f3gasgd','pr3.jpg');

  $product3->free_shiping();
  echo $product3->show();
  class user{
    //User properties
      public $name;
      public $email;
   //User Method
     function create(){

     } 
  }

?>