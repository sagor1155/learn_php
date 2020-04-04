<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP PHP</title>
</head>
<body>
    <?php
        echo "<h3>OOP PHP</h3>";

        class Fruit{
            private $color;
            protected $name;
            const FIXED_PROPERTY = "It's tasty";

            public function getConstantPropertyValue() {
                echo self::FIXED_PROPERTY . '</br>';
            }

            function __construct($fruitName){
                $this->name = $fruitName;
                echo "Fruit Object Created </br>";
            }

            public function setColor($colorArgument){
                $this->color = $colorArgument;
            }

            public function getColor(){
                return $this->color;
            }

            public function intro() {
                echo "Invoked from Fruit Object </br>";
            }

            // The final keyword can be used to prevent class inheritance or to prevent method overriding
            final function getQuantity() {
                echo "It's a final method. Can't be overriden </br>";
            }

            function __destruct(){
                echo "Fruit Object Destroyed </br>";
            }
        }

        class StrawBerry extends Fruit{
            public function printPropertyDetails(){
                echo "Fruit Name: " . $this->name . ", Color: " . $this->getColor() . "</br>";
            }

            //method overriding 
            public function intro() {
                echo "Invoked from StrawBerry Object </br>";
            }

            // trying to override a final method 
            // function getQuantity(){
            //     echo "Final method can't be overriden </br>";
            // }
        }

        $fruitObject = new Fruit("Apple");
        $fruitObject->setColor("red");
        echo "Fruit color: " . $fruitObject->getColor() . "</br>";
        $fruitObject->intro();

        $sbObject = new StrawBerry("Straw Berry");
        $sbObject->setColor("Red");
        $sbObject->printPropertyDetails();
        // $sbObject->name = "some name";  //can't access protected or, private property of base class
        $sbObject->intro();
        $sbObject->getConstantPropertyValue();


    ?>
</body>
</html>