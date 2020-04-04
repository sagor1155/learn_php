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
            //PHP only supports single inheritance: a child class can inherit only from one single parent
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

        // abstract class 
        abstract class Shape{
            abstract public function draw() : string;
        }

        class Rectangle extends Shape{
            public function draw() : string{
                return "Drawing Rectangle </br>";
            }
        }

        class Circle extends Shape{
            public function draw() : string{
                return "Drawing Circle </br>";
            }
        }

        $genericShapeObject = new Rectangle();
        echo $genericShapeObject->draw() . "</br>";
        $genericShapeObject = new Circle();
        echo $genericShapeObject->draw() . "</br>";

        // Trait 
        /*PHP only supports single inheritance: a child class can inherit only from one single parent.
        So, what if a class needs to inherit multiple behaviors? OOP traits solve this problem.
        Traits are used to declare methods that can be used in multiple classes. Traits can have 
        methods and abstract methods that can be used in multiple classes, and the methods can have 
        any access modifier (public, private, or protected). */
        trait FormalDress {
            public function getFormalDressColor() {
                echo "Black, White or, Single colored <br>";
            }
        }
          
        trait CasualDress {
            public function getCasualDressColor() {
                echo "Stripped, Multi-colored <br>";
            }
        }
         
        class Dress {
            use FormalDress;
            use CasualDress;
        }    
        
        $dressObject = new Dress();
        $dressObject->getFormalDressColor();
        $dressObject->getCasualDressColor();

        // static method & properties 
        class ClassName {
            public static function staticMethod() {
              echo "It's a static method </br>";
            }

            public function __construct() {
                self::staticMethod();
            }
        }

        // $anotherObj = new ClassName();
        className::staticMethod();

        class OOPDomain {
            protected static function getFeedback() {
                return "It's fun </br>";
            }
        }
          
        class Domain extends OOPDomain {
            public function getFlavour() {
                echo parent::getFeedback();
            }
        }
          
        $domainObject = new Domain;
        $domainObject->getFlavour();



    ?>
</body>
</html>