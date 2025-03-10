<?php
function divide($numerator, $denominator) 
{
    try 
    {
        if ($denominator === 0) 
        {
            throw new Exception("Division by zero is not possible :( .");
        }
        return $numerator / $denominator;
    } 
    catch (Exception $e) 
    {
        echo "Error: " . $e->getMessage();
        return false; 
    }
}
divide(10, 0);
?>
