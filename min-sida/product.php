<?php

class Product{

    protected $id = null;
    protected $name = null;
    protected $price = null;
    protected $sku = null;

    function __construct($id, $name, $price, $sku)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->sku = $sku;
    }
    function getId(){
        return $this->id;
    }

    function setId($value){
        $this->id = $value;
    }

    function getName(){
        return $this->name;
    }
    function setName($value){
        if(empty($value) == false){
            $this->name= $value;
        }
    }

    function getPrice(){
        return $this->price;
    }
    function setPrice($value){
        if($value > 0){
            $this->price = $value;
        }
    }
    function getSku(){
        return $this->sku;
    }
    function setSku($value){
        $this->sku = $value;
    }

    public function print(){
        echo " id :" . $this->id . " name: " . $this->name . " price: " . $this->price . " sku " . $this->sku;
    }
};

function getProducts($connection, $sku){
    $query = "SELECT * FROM products WHERE sku = ?";
    $statement = $connection->prepare($query);

   $result = $statement->fetch_assoc();

   if($result != null){
   $id = $result ["id"];
   $name = $result ["name"];
   $price = $result ["price"];
   $product = new Product($id, $name, $price, $sku);
   return $product;
   }else {
    echo "Produkten kunde inte hittas!";
    return null;
   }
}

