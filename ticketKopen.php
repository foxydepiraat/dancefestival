<?php
    require('DBfestival.php');
    $ID=$_GET['tid'];
    session_start();
    $query ="SELECT * FROM ticket where tid=$ID";
    $stm= $conn->prepare($query);
    $stm->execute();

    $ticket = $stm->fetch(PDO::FETCH_OBJ);
    if(empty($_SESSION["email"])){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Koopsherm</title>
        <link rel="stylesheet" href="styles.css">
    </head>
        <body>
            <div class="KopenBody">
                <div class="KoopGegevens">
                    <?php
                        $Email = $_SESSION["email"];
                        echo "E-mail: ",$Email,"</br>";
                        echo "ticket: ",$ticket->naam," €",$ticket->prijs ;
                    ?>
                   
                    <form method="POST">
                        <select name="aantal" id="Select">
                            <option value="1">1 persoon</option>
                            <option value="2">2 personen</option>
                            <option value="3">3 personen</option>
                            <option value="4">4 personen</option>
                            <option value="5">5 personen</option>
                        </select>
                        <input type="submit" name="btnCancel" value="ANNULEREN" class="styelBtn">
                        <input type="submit" name="btnOpslaan" value="BESTEL" class="styelBtn">
                        <?php
                        if(isset($_POST['btnCancel'])){
                            header('location:ticket.php');
                        }

                        if(isset($_POST['btnOpslaan'])){
                            $query =  "INSERT INTO aankoop(datum,aantal,e_mail) values(:Datum,:aantal,:e_mail)";
                            $stm= $conn->prepare($query);
                            $stm->bindParam(":aantal",$_POST['aantal']);
                            $stm->bindParam(":e_mail",$Email);
                            $stm->bindParam(":Datum",$ticket->naam);
                            if($stm->execute()){
                                echo "<br>","<br>","je ticket(s) zijn bestelt en naar je e-mail gestuurt";
                                header('refresh: 2 ticket.php');
                            } else echo "er gaat iets fout";

                        }
                        ?>
                    </form>
                </div>
            </div>
        </body>
    </html>
