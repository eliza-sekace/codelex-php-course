<?php


//Create a function that accepts any string and returns the same value
// with added "codelex" by the end of it. Print this value out.


//function addCodelex(){
//    $userInput = readline("Write some word: ");
//    return $userInput." codelex";
//}
//echo addCodelex();



function addCodelex($string){
    return $string." codelex";
}
echo addCodelex("hello");