<?php
//
// FILE                 : CostCalc.php
// PROJECT              : Web Design and Development PROG2001 - Final Exam Practical
// PROGRAMMER           : Andrew Gordon
// FIRST VERSION        : Dec. 13 2020
// DESCRIPTION          : The SET Pizza Shop web app allows a user to enter their details, customize their pizza,
//                        and confirm their order
//                         
//                        Calculates the total cost of the pizza and toppings and returns it to the client.
// 

// plain pizza is always $10
$pizza = 10;

// get the toppings, a 1 will be returned if a topping was selected, 0 if not selected
$pepperonis =  (int) json_decode($_GET['args'], true)['pepperonis'];
$mushrooms = (int) json_decode($_GET['args'], true)['mushrooms'];
$olives = (int) json_decode($_GET['args'], true)['olives'];
$peppers = (int) json_decode($_GET['args'], true)['peppers'];
$cheese = (double) json_decode($_GET['args'], true)['cheese'] * 1.5;

// total up the cost
$total = $pizza + $pepperonis + $mushrooms + $olives + $peppers + $cheese;

// return the cost formatted to 2 decimal places
echo number_format((double)$total, 2, '.', '');

?>