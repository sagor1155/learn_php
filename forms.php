<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form PHP</title>
</head>
<body>
    <?php
        echo htmlspecialchars($_SERVER["PHP_SELF"]) . "</br>";

        function handleFormPostRequest(){
            $userName = $userEmail = $userDistrict = "";
            if (empty($_POST["username"])) {
                echo "Name is required </br>";
            } else {
                $userName = test_input($_POST["username"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/", $userName)) {
                    echo "Only letters and white space allowed in name field </br>";
                }
            }
            if (empty($_POST["useremail"])) {
                echo "Email is required </br>";
            } else {
                $userEmail = test_input($_POST["useremail"]);
                // check if e-mail address is well-formed
                if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                    echo "Invalid email format </br>";
                }
            }
            if (empty($_POST["userdistrict"])) {
                echo "District is required </br>";
            } else {
                $userDistrict = test_input($_POST["userdistrict"]);
                // check if district only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/", $userDistrict)) {
                    echo "Only letters and white space allowed in district field </br>";
                }
            }

            echo "username: "   . $userName     . '</br>';
            echo "email: "      . $userEmail    . '</br>';
            echo "district: "   . $userDistrict . '</br>';
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            handleFormPostRequest();
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    ?>
</body>
</html>