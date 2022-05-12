<?php 
    session_start();
    include('DB.php');
?>

<!DOCTYPE html>
<html>
<meta charset = "UTF-8" name="viewport" content="with=device-width,initial-scale=1.0">
 <head>
 <title>Panier</title>
 <link rel="stylesheet" href="Style_panier.css">
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 </head>
<body>
    <section class="header">
        <nav>
            <a href="Index.php"><img src="image/logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="Index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>

                    <!----SIGN IN / LOGOUT---->

                    <?php
                    if(isset($_SESSION["fname"])){
                        echo '<li><a href="Disconnect.php"> ';
                        echo 'Logout';
                        echo '</a></li>';
                    } else{
                        echo '<li><a href="register.php"> ';
                        echo 'Sign in';
                        echo '</a></li>';
                    }
                    ?>

                    <!----SESSION(PANIER) / CONNECTION---->

                    <?php
                    if(isset($_SESSION["fname"])){
                        echo '<li><a href="Panier.php"> ';
                        echo $_SESSION["fname"] ;
                        echo ' <i class="fa-solid fa-basket-shopping"></i>';
                        echo '</a></li>';
                    } else{
                        echo '<li><a href="Disconnect.php"> ';
                        echo 'Connection' ;
                        echo '</a></li>';
                    }
                    ?>

                    <!----EDIT---->

                    <?php
                    if(isset($_SESSION["fname"])){
                        if($_SESSION["fname"] == "root"){
                            echo '<li><a href="Gestion.php"> ';
                            echo 'Gestion';
                            echo '</a></li>';
                        } else{
                        echo '<li><a href="modifie.php"> ';
                        echo 'Edit';
                        echo '</a></li>';
                        }
                    } else{
                        
                    }
                    ?>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    </section>

<!----panier----->
<section class="client">
    <section class="panier">
        <div class="gauche">
        <form name ="Form" method = "POST" action = "Gestion.php">
            
            <?php

                    $fn = $_SESSION['fname'];
                    $ln = $_SESSION['lname'];

                    $count = "SELECT * FROM client";

                    $requete =  mysqli_query($con, $count);
                    $nbligne = mysqli_affected_rows($con);
                    echo "Nombre de client: " . mysqli_affected_rows($con)."<br>";

                    $row =  mysqli_query($con, $count);
                    $indice = mysqli_fetch_array($row);

                    /*---- Creation des lignes ----*/
                    do {
                        echo '<label for="id">';
                        echo "Identifiant: ".$indice ['Identifiant'].'  '."|---| Mot de passe: ". $indice ['Pass'];
                        echo ' </label>';
                        echo '<input type="submit" name="'.$indice ['Identifiant'].'" value="Supprimer" class="hero-btn"><br>';
                    } while ($indice = mysqli_fetch_array($row));


                    /*----Recherche de submit indicé----*/
                        
                    /*
                    if ($_POST != 1){
                        echo $_POST;
                    }
                    if (isset($_POST[''])){
                        echo $_POST[''];
                    */

                        /*
                        $fndel = $_POST[];
                        $del = "DELETE FROM `client` WHERE `Identifiant`='$fndel'";
                        if(mysqli_query($con, $upd)){
                            header("Location:Gestion.php");                                
                        } else{
                            header("Location:Modif_Impossible.php");
                        }
                    }*/
            ?>  
        </form> 
        </div>
        <div class="droite">
            <img src="">
        </div>
    </section>
</section>

<!------footer------>

<section class="footer">
    <h4>A propos de nous</h4>
    <p>Marques deposees de CrossShop, Inc.</p>

    <div class="icons">
        <i class="fa-brands fa-facebook-f"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-youtube"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-linkedin"></i>
        <p> Fait avec <i class="fa-regular fa-heart"></i> par nos athletes </p>
    </div>
</section>


<!-------JavaScript bouton Menu et Fermé------>

<script>
    var navLinks = document.getElementById("navLinks");
    function showMenu(){
        navLinks.style.right = "0";
    }
    function hideMenu(){
        navLinks.style.right = "-200px";
    }
</script>



</body>
</html>