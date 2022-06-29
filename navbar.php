<?php
    require("DBfestival.php");
    session_start();
?>
<!DOCTYPE html>
<head>
    <title>HOME Amerijck Festival</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
    <div class="navbar">
        
        <!-- drop down menu van alle pagina -->
        <div class="dropdown">
            
            <button class="dropbtn">MENU</button>
            <div class="dropdown-content">
                <a href="HOME.php">HOME</a>
                <a href="ticket.php">TICKETS</a>
                <a href="lineUp.php">LINE-UP</a>
                <a href="contacten.php">CONTACTEN</a>

                <a href="sessionLeeg.php">UITLOGGEN</a>
                </br>
        <?php
            if(empty($_SESSION["email"])){
                echo "";
            }else echo "E-mail:", $_SESSION["email"];
                
        ?>
            </div> 
            
        </div>
    </div>
</body>
</html>