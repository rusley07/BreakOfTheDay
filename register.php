<html>
    <head>
        <title>Registration </title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="eCommerceStyles.css" rel="stylesheet" type="text/css"  />

    </head>

    <body>
        <p align="center" class="ReportHeader">Registration </p>

        <?php
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pw = $_POST['password'];
        $rpw = $_POST['repeatpassword'];

        if (($name == "") or ($email == "") or ($pw == "") or ($rpw == "")) {
            echo "Fields can't be blank! <br><br/><br/><a href='register.htm'>Register</a>";
        } elseif (!(strstr($email, "@")) or !(strstr($email, "."))) {
            echo "Invailid Email Address! <br><br/><br/><a href='register.htm'>Register</a>";
        } elseif ($pw != $rpw) {
            echo "Passwords don't match! <br><br/><br/><a href='register.htm'>Register</a>";
        } else {
            include_once "connectionDB.php";

            $query = "INSERT INTO user VALUES ('$email','$pw','$name','','','','','','')";

            mysql_query($query) or die("Unable to insert the record");
            mysql_close();
            echo "<p> <b>Record Added Successfully......!!!! </p>";
            echo"<p> <a href=login.htm>Click Here to Login to the Member Page </a> </b></p>";

            $message = "Thank you for registering with us.
                        Name:       $first_name
                        Email:      $email";
            mail($email, "Thank you for your registration", $message);
        }
        ?>

    </body>
</html>

