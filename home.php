
<!DOCTYPE html>
<html>
<head>
    <title>homepagina</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    require("navbar.php");
    
    
?>
    <div class="divBody">

    <div class="nieuwsItems">
        <h2 class="nieuwsTitel">NIEUWS  OVER  DE  FESTIVAL</h2>
        <?php
        $query="SELECT * FROM nieuwsitem";
        $stm=$conn->prepare($query);
        if($stm->execute()){

        } else echo "er is iets fout gegaan";
        
        $nieuwsitems=$stm->fetchAll(PDO::FETCH_OBJ);
        
        foreach($nieuwsitems as $nieuwsitem){
        ?>
        <div class="nieuwsItem" >
        <?= "titel:",$nieuwsitem->titel ?> </br>
       <?= $nieuwsitem->text ?>
        </div>
        <?php
        }

        ?>
    </div>

    </div>
</body>
</html>
