<?php

session_start();
if(
    !isset($_SESSION['myemail']) ||
    empty($_SESSION['myemail'])
){
    if( 
        isset($_POST['myfirstname']) &&
        !empty($_POST['myfirstname']) &&

        isset($_POST['mylastname']) &&
        !empty($_POST['mylastname']) &&

        isset($_POST['dob']) &&
        !empty($_POST['dob']) &&

        isset($_POST['myemail']) &&
        !empty($_POST['myemail']) &&
        
        isset($_POST['mypass']) &&
        !empty($_POST['mypass']) &&

        isset($_POST['username']) &&
        !empty($_POST['username']) 
    ){

        $myfirstname = $_POST['myfirstname'];
        $mylastname = $_POST['mylastname'];
        $dob = $_POST['dob'];
        $myemail = $_POST['myemail'];
        $mypass = $_POST['mypass'];
        $username = $_POST['username'];
        $default = 0;

        $encodedPass = md5($mypass);
        
        //store the data to database
        try{
            //PDO = PHP Data Object
            $conn=new PDO("mysql:host=localhost:3306;dbname=sigmacodepro_db;","root","");
            
            //setting 1 environment variable
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $myquerystring="INSERT INTO users (username, first_name, last_name, dob, email, password, is_active, is_admin, join_date) 
                            VALUES('$username', '$myfirstname', '$mylastname', '$dob', '$myemail', '$encodedPass', 1, 0, CURDATE())";
            
            $conn->exec($myquerystring);

            $_SESSION['justloggedin'] = true;
            
            ?>
                <script>location.assign("login.php");</script>
            <?php
        }
        catch(PDOException $ex){
            ?>
                <script>
                    location.assign("signup.php");
                    alert("Database error!");
                </script>
            <?php
        }
        
    }
    else{
        //if data is not set or empty
        ?>
            <script>
                location.assign("signup.php");
                alert("Data is not set properly!");
            </script>
        <?php   
    }
}
else{
    //logged in
    ?>
        <script>location.assign("signup.php");</script>
    <?php 
}

?>
