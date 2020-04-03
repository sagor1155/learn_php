<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php
        // print 
        echo "<h3> Learning the Basics of PHP </h3> </br>";     //print can be used instead of echo 

        // array
        $carArray = array('toyota', 'rolls royce', 'volvo');
        var_dump($carArray);

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
        echo "apple color is " . $apple->getColor() . "</br>";

        // string 
        $randomString = "       Random String       ";
        echo ("the string is: $randomString </br>");
        echo (strlen($randomString) . "</br>");
        echo (strlen(ltrim($randomString)) . "</br>");
        echo (strlen(rtrim($randomString)) . "</br>");
        echo (strlen(trim($randomString)) . "</br>");

        // functions 
        function handleFormPostRequest(){
            $userName = $_POST['username'];
            $userEmail = $_POST['useremail'];
            $userDistrict = $_POST['userdistrict'];
    
            echo "username: " . $userName . '</br>';
            echo "email: " . $userEmail . '</br>';
            echo "district: " . $userDistrict . '</br>';
        }
        // handleFormPostRequest();



    ?>
</body>
</html>