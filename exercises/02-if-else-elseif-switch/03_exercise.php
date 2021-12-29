<?php

//Given variables (string) "hello" create a condition
//that if the given value is "hello" then output "world".

$helloString = 'hello';
if ($helloString === 'hello') {
    echo('world');
} else {
    echo('whoops');
}