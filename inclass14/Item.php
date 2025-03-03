<?php

//namespace Classwork\inclass14;
//$Item = new Classwork\cisc3300();
//$Item = Post();

class Item
{
    public string $name;
    public int $price;
    protected int $quantity;

   // public static $breed = 'Maine Coon';

    public function __construct($name, $price, $quantity) 
    {
        $this->name = $name;
        $this->price = $price; 
        $this->quantity =$quantity;
    }

    //setter
    public function setProtectedQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    //getter
    public function getQuantity()
    {
        return $this->quantity;
    }
    public static function staticMethod()
    {
        echo 'this is static';
    }

    public function toJson(): string
    {
        $data = [
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity
        ];

        return json_encode($data);
    }
}
?>