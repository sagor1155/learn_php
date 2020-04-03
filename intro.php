<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php
        // print 
        echo "<h3> Learning the Basics of PHP </h3> </br>";     //print can be used instead of echo 
        echo "---------------------------------------------</br>";

        // array
        $carArray = array('toyota', 'rolls royce', 'volvo');
        var_dump($carArray);
        echo "---------------------------------------------</br>";

        // object 
        class Fruit{
            public $color;
            function setColor($colarg){
                $this->color = $colarg;
            }
            function getColor(){
                return $this->color;
            }
        }

        $apple = new Fruit();
        $apple->setColor("green");
        echo "Apple color is " . $apple->getColor() . "</br>";
        echo "---------------------------------------------</br>";

        // string 
        $randomString = "       Random String        ";
        echo ("The string is: $randomString </br>");
        echo ("String length: " . strlen($randomString) . ", ");
        echo (strlen(ltrim($randomString)) . ", ");
        echo (strlen(rtrim($randomString)) . ", ");
        echo (strlen(trim($randomString)) . "</br>");
        
        $partOfString = substr(ltrim($randomString), 0, 6);
        echo "Parts of string: " . $partOfString . "</br>";
        
        echo "String word count: " . str_word_count($randomString) . "</br>";

        echo "String upper-case: " . strtoupper($randomString) . "</br>";
        echo "String lower-case: " . strtolower($randomString) . "</br>";
        echo "First character upper-case: " . ucfirst($randomString) . "</br>";

        echo "Reverse string: " . strrev($randomString) . "</br>";

        echo "Search within string: " . strpos($randomString, "ing") . "</br>";

        echo "String replace: " . str_replace("world", "Dolly", "Hello, world!") . "</br>";

        // other string methods: explode, implode, strcmp, strcasecmp, strstr 
        echo "---------------------------------------------</br>";

        // Numbers 
        echo "PHP FLOAT MAX: " . PHP_FLOAT_MAX . "</br>";
        
        $x = (float)("59.85" + 100);         //use "string" and dump 
        echo $x . "</br>";
        var_dump(is_numeric($x));
        echo "---------------------------------------------</br>";

        // define constant 
        define("PI", "3.1416");
        echo "Value of PI: " . PI . "</br>";
        echo "---------------------------------------------</br>";

        // if-else, switch-case, loop are same as C/C++

        // functions 
        function handleFormPostRequest(){
            $userName = $_POST['username'];
            $userEmail = $_POST['useremail'];
            $userDistrict = $_POST['userdistrict'];
    
            echo "username: " . $userName . '</br>';
            echo "email: " . $userEmail . '</br>';
            echo "district: " . $userDistrict . '</br>';
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            handleFormPostRequest();
        }
        

        /*
        <?php declare(strict_types=1);  // strict requirement for explicit type declaration 
            // function return type - int
            // supports default argument value   
            function addNumbers(float $a=0, float $b=0) : int {
                return (int)($a + $b);
            }
            echo addNumbers(1.2, 5.2);
        ?>
        */
        // echo "---------------------------------------------</br>";

        // indexed array 
        $carArray = array('toyota', 'rolls royce', 'volvo');
        echo "Array length: " . count($carArray) . "</br>";
        foreach ($carArray as $car) {
            echo $car . "</br>";
        }

        //Associative array 
        $myCar = array("name"=>"volvo", "mileage"=>"20", "color"=>"red");
        echo "Array length: " . count($myCar) . "</br>";
        foreach ($myCar as $key => $value) {
            echo $key . " => " . $value . "</br>";
        }

        //multi-dimensional array
        $multiArray = array(array("sakib", "sakib@gmail.com", "1212"),
                            array("saon",  "saon@gmail.com",  "1223"),
                            array("riad",  "riad@gmail.com",  "1245"));
        
        for($row=0; $row<3; $row++){
            for($col=0; $col<3; $col++){
                echo ($multiArray[$row][$col] . ", ");
            }
            echo ("</br>");
        }

        $cars = array(
            array("Volvo",22,18),
            array("BMW",15,13),
            array("Saab",5,2),
            array("Land Rover",17,15)
        );
            
        for ($row = 0; $row < 4; $row++) {
            echo "<p><b>Row number $row</b></p>";
            echo "<ul>";
            for ($col = 0; $col < 3; $col++) {
                echo "<li>".$cars[$row][$col]."</li>";
            }
            echo "</ul>";
        }
        echo "---------------------------------------------</br>";

        // sorting array (sort, rsort, asort, ksort, arsort, krsort)
        $numberArray = array(4, 6, 2, 22, 11);
        rsort($numberArray);
        var_dump($numberArray);
        
        $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
        arsort($age);
        var_dump($age);
        echo "---------------------------------------------</br>";
        
        // superglobals ($GLOBALS, $_SERVER, $_REQUEST, $_POST, $_GET, 
        // $_FILES, $_ENV, $_COOKIE, $_SESSION)
        
        //$GLOBALS: PHP stores all global variables in an array called $GLOBALS[index]. The index holds the name of the variable.
        $x1 = 75;
        $y1 = 25;
        function addition() {
            $GLOBALS['z1'] = $GLOBALS['x1'] + $GLOBALS['y1'];
        }
        addition();
        // echo $z1 . "</br>";

        //$_SERVER: holds information about headers, paths, and script locations
        echo $_SERVER['SERVER_PROTOCOL'];
        echo "</br>";
        echo $_SERVER['PHP_SELF'];
        echo "<br>";
        echo $_SERVER['SERVER_SOFTWARE'];
        echo "<br>";
        echo $_SERVER['HTTP_HOST'];
        echo "<br>";
        echo $_SERVER['HTTP_USER_AGENT'];
        echo "<br>";
        echo $_SERVER['SCRIPT_NAME'];

        //$_REQUEST: used to collect data after submitting an HTML form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            $name = $_REQUEST['username'];
            if (empty($name)) {
                echo "</br>Name is empty!</br>";
            } else {
                echo "</br>" . $name . "</br>";
            }
        }

        


    ?>
</body>
</html>