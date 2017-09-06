<?php 
require ("pdoParams.php"); 
require ("queries.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>queries</title>
        <link rel="stylesheet" type="text/css" href="index.css" />
    </head>
    <body>
        <?       
        $database = "ubersmith";
        extract(pdoParams());
        $connection = new PDO($pdoStr, $pdoUser, $pdoPw);
        queries($connection);
        ?>
    </body>
</html>