<?php session_start(); ?>
<html>
    <head>
        <title>Registration </title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="eCommerceStyles.css" rel="stylesheet" type="text/css"  />

    </head>

    <body>
        <p align="center" class="ReportHeader">Login </p>
<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if (($email == "") OR ($password == "")) {
    echo "Login Failed. Username or Password cannot be blank";
    echo "<br/><br/><a href='Login.htm'>Login</a>";
} else {

    include_once "ConnectionDB.php";

    $query = "SELECT * FROM user WHERE ((Email = '" . $email . "') AND (Password = '" . $password . "')); ";

    $result = mysql_query($query, $mysql_link)
            or die("Unable to read database");

    if (mysql_num_rows($result) > 0) {

        $_SESSION[USERNAME] = $username;
        //header("Location: catalogue.php");
        echo "<script>location.href='catalogue.php'</script>";
    } else {
        echo "Login Failed. Please try again <br/><br/>";
        echo "<a href='Login.htm'>Login</a>";
    }
}
?>

    </body>
</html>
