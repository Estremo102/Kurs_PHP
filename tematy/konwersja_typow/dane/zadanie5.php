<?php
class Car {
    public $color;
    public $model;
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }
}

$a = 5;
$b = 5.34;
$c = "hello";
$d = true;
$e = NULL;
$f = new Car("red", "Volvo");
?>
