<?php
    include("DBfestival.php");
    require("navbar.php");
?>
<!DOCTYPE html>
<html>
    <head>
       <title>line-up</title> 
       <link rel="stylesheet" href="style.css">
    </head>
    <body>
            <!-- line up met foto's en metinformatie van de artiest -->
             
                <?php 
                    $query="SELECT * FROM line_up";
                    $stm=$conn->prepare($query);
                    $stm->execute();

                    $lineUp=$stm->fetchAll(PDO::FETCH_OBJ);
                ?>
                    <div class="LineUp">
                <?php
                    foreach($lineUp as $artiest){
                ?>
                        <div class='artiest'>
                            <img src=<?=$artiest->foto; ?>>
                            <?= $artiest->naam; ?> </br>
                            <a href=<?= $artiest->website?> ><img class="website" src="iconWebsite.png"></a> </br>
                            <?=$artiest->informatie; ?>
                        </div>
                <?php
                    }
                ?>
                    </div>
             
           
    </body>
</html>