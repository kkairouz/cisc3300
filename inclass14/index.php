<?php

//require 'classes/Cat.php';
require 'Item.php';

//require 'inheritance/Car.php';
//require 'inheritance/Mustang.php';

//use chapterFour\classes\Cat;
//use chapterFour\classes\Dog;
//use chapterFour\inheritance\Mustang;


$Item1 = new Item('Burger', 12, 5);
$Item2 = new Item('Fries', 10, 20);

echo $Item1->toJson();
echo "<br>";
echo $Item2->toJson();
//Cat::staticMethod();

//$cat = new Cat('pinecone', 13);

//$dog->bark();
//$cat->meow();

//static property, notice the :: syntax
//echo Cat::$breed;

//$mustang = new chapterFour\inheritance\Mustang();
//$mustang = new Mustang();

//$mustang->drive();
?>