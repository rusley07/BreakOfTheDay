<?php session_start(); ?>

<html>
    <head>

        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"  />
        <link href="eCommerceStyles.css" rel="stylesheet" type="text/css"  />
    </head>
    <body>

        <h3>Product Catalogue</h3>

        <form action="catalogue.php" method="post">

            Search: <input type="text" name="search"><br>

            <input type="Submit">

        </form>
        <table border="2">
            <?php
            include_once "connectionDB.php";

            $search = "";
            if (isset($_POST['search'])) {
                $search = trim($_POST['search']);
            }
            $query = "SELECT * FROM Product WHERE Name like '%" . $search . "%';";