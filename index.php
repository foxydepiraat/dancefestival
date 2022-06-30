<?php
    include("DBfestival.php");
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="styles.css">
</head>
    <body>
        <div class="loginRegriDiv">
            <!-- login in gegevens -->
                <form class="loginMenu" method="POST">
                    E-mail:<input type="text" name="txtEmail" class="txt"/>
                    </br>
                    </br>
                    password:<input type="password" name="txtPassword" class="txt"/>
                    </br>
                    </br>
                    <input type="submit" name="btninloggen" value="INLOGEN" class="btnInlogRegri"/>

                    <!-- laat het checken als het er over heen komt met de gegevens -->
            <?php
                if(isset($_POST['btninloggen'])){
                    
                    $ophalen="SELECT * FROM gebruiker";
                    $stm=$conn->prepare($ophalen);
                    $stm->execute();
                    $result1=$stm->fetchAll(PDO::FETCH_OBJ);
                    foreach($result1 as $item){
                    if($_POST['txtEmail'] == "$item->e_mail" && $_POST['txtPassword'] == "$item->wachtwoord" ){
                        header('location:home.php');
                        $_SESSION["email"]="$item->e_mail";
                        $_SESSION["password"]="$item->wachtwoord";
                    } 
                }
                        

                }
                ?>
                </form>
                <!-- regristreer gegevens -->
                <form class="regiMenu" method="POST">
                    naam:<input type="text" name="txtNaam" class="txt"/>
                    </br>
                    </br>   
                    password:<input type="password" name="txtPassword" class="txt"/>
                    </br>
                    </br>
                    E-mail:<input type="text" name="txtEmail" class="txt"/>
                    </br>
                    </br>
                <input type="submit" name="btnRegristreren" value="REGRISTREREN" class="btnInlogRegri"/>
                <?php
                // account aanmaken van een account en laat hem als eerst checken als hij al bestaat
                if(isset($_POST['btnRegristreren'])){
                    try {
                        $regri="INSERT INTO gebruiker (naam, wachtwoord, e_mail)VALUES(:naam, :wachtwoord, :e_mail)";
                        $stm=$conn->prepare($regri);
                        $stm->bindParam(":naam",$_POST['txtNaam']);
                        $stm->bindParam(":wachtwoord",$_POST['txtPassword']);
                        $stm->bindParam(":e_mail",$_POST['txtEmail']);
                        if($stm->execute()){
                            echo"je account is aangemaakt";
                        } 
                    } catch(Exception $ex) {
                        echo " deze e-mail bestaat al";
                    }
                    
                }

                
            ?>
        </form>  
            </div>
            </div>   
    </body>
</html>
