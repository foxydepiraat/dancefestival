<?php
require('DBfestival.php');
$query="SELECT * FROM ticket";
$stm=$conn->prepare($query);
$stm->execute();

$tickets=$stm->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
    <head>
        <title>ticket verkoop</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
     <?php require('navbar.php'); ?> 
     <div class="bodyTickets">
        <div class="tickets">
            <?php 
                
                foreach($tickets as $ticket){  
            ?>
                <div class="ticket">
                    <?php  
                        echo $ticket->naam;
                    
                     
                    
                        echo " - €",$ticket->prijs;
                    ?>

                    <button class="buy"><a href="ticket.php">BUY</a></button>
                </div>
            <?php 
                }; 
            ?>
            </div>
        </div>
    </body>
    </html>