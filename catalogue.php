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

            Search: <input required type="text" name="search"><br>

            <input type="Submit">

        </form>

        <a href="logout.php"><h3>Logout</h3></a>


        <table border="2">
            <?php
            include_once "connectionDB.php";

            $search = "";
            if (isset($_POST['search'])) {
                $search = trim($_POST['search']);
            }
            $query = "SELECT * FROM Product WHERE Name like '%" . $search . "%';";

            $result = mysql_query($query, $mysql_link)
                    or die("Unable to read database");


            echo"<tr><td>ProductID</td><td>Name</td><td>Image</td></tr>";
            while ($newarry = mysql_fetch_array($result)) {
                echo "<tr>";
                echo"<td>" . $newarry['ProductID'] . "</td>";
                echo"<td>" . $newarry['Name'] . "</td>";
                echo"<td><img src='images/" . $newarry['Image'] . "' width='100'></td>";
            }
            ?>
        </table>
    </body>
</html>