<?php
//number 6 and 7 
$Student = 
[
    "name" => "Kevin",
    "age" => 20,
    "city" => "Brooklyn",
    "job" => "Vocalist"
];
foreach ($Student as $key => $value) 
{
    echo "The student's {$key} is {$value}.<br>";
}
function describePerson(string $name, int $age = 18): string 
{
    return "This is $name, who is $age years old.";
}
echo describePerson("Kevin", 20);
echo "<br>";
echo describePerson("Samuel", 21); 
?>
