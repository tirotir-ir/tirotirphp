<?php
$fruits = ["Apple", "Banana", "Cherry"];

// حلقه روی مقادیر
foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}

// حلقه روی کلیدها و مقادیر
$ages = ["Ali" => 25, "Sara" => 31];
foreach ($ages as $name => $age) {
    echo "$name: $age<br>";
}
