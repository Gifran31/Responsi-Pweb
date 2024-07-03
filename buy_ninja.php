<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ninja_name = $_POST["name"];
    
    if (!in_array($ninja_name, $_SESSION["purchased_ninjas"])) {
        $_SESSION["purchased_ninjas"][] = $ninja_name;
        $filename = "purchased_ninjas.txt";
        file_put_contents($filename, $ninja_name . PHP_EOL, FILE_APPEND);
    }
}

header("Location: home_ninja.php");
exit;
?>
