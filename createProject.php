<?php

session_start();

if(
    isset($_SESSION['myemail']) &&
    !empty($_SESSION['myemail'])

){
    if( 

        isset($_GET['name']) &&
        !empty($_GET['name'])
    ){
        $userId = $_SESSION['myid'];
        $name = $_GET['name'];

        $success = "done";
        $error = "error";
        
        //store the data to database
        try{
            //PDO = PHP Data Object
            $conn=new PDO("mysql:host=localhost:3306;dbname=sigmacodepro_db;","root","");
            
            //setting 1 environment variable
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $myquerystring="INSERT INTO projects (name, owner_id, is_active)
                            VALUES('$name', $userId, 1)";

            $conn->exec($myquerystring);

            // $myquerystring="SELECT * FROM projects where owner_id=$userId AND name=$name limit 1";

            // $returnobj = $conn->query($myquerystring);

            // $projectId = '';
            // if($returnobj->rowCount()==1){

            //     foreach($returnobj as $row){
            //         $projectId = $row['id'];
            //     }
            // }
        
            ?>
                 <script> location.assign("project.php?name=<?php echo $name; ?>&projectId=<?php echo $projectId; ?>"); </script>
            <?php
        }
        catch(PDOException $ex){
            ?>
                <script>
                    // var url = "<?php //echo $_SESSION['current_page'] ;?>";
                    var url = "home.php";
                    location.assign(url);
                    alert("Database error!");
                </script>
            <?php
        }
    }
    else{
        //if data is not set or empty
        ?>
            <script>
                // var url = "<?php //echo $_SESSION['current_page'] ;?>";
                var url = "home.php";
                location.assign(url);
                alert("Data not set properly!");
            </script>
        <?php   
    }
}
else{
    //not logged in
    ?>
        <script>location.assign("login.php");</script>
    <?php 
}

?>