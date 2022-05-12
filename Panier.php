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

        <!--<div class="text-box">
            <h1>Consultez votre panier</h1>
            <p>gerez vos articles</p>
        </div>-->
    </section>

<!----panier----->
    <section class="panier">
        <form name ="Form" method = "POST" action = "Panier.php">
            <?php

                    $fn = $_SESSION['fname'];
                    $ln = $_SESSION['lname'];
                    $find = "select * from panier where Identifiant = '$fn' and Pass = '$ln'";
                    $row = mysqli_query($con, $find);
                    $indice = mysqli_fetch_array($row);

                    if(mysqli_query($con, $find)){
                        if(is_array($indice)){
                            if($indice ['Box1'] != 0){
                                echo '<a href="a_box_1">';
                                echo '<label for="box1">ROGUE FLAT PACK GAMES BOX - €165.00 - Qte:';
                                echo $indice ['Box1'];
                                echo ' </label>';
                                echo '</a>';
                                echo '<input type="submit" name="retire_box1" value="Retirer" class="hero-btn"><br>';
                            }
                            if($indice ['Box2'] != 0){
                                echo '<a href="a_box_2">';
                                echo '<label for="box2">ROGUE ECHO FOAM GAMES BOX - €336.00 - Qte:';
                                echo $indice ['Box2'];
                                echo ' </label>';
                                echo '</a>';
                                echo '<input type="submit" name="retire_box2" value="Retirer" class="hero-btn"><br>';
                            }
                            if($indice ['Box3'] != 0){
                                echo '<a href="a_box_3">';
                                echo '<label for="box3">BOX JUMP, BOX DE PLIOMETRIE, PLYOBOX - €80.00 - Qte:';
                                echo $indice ['Box3'];
                                echo ' </label>';
                                echo '</a>';
                                echo '<input type="submit" name="retire_box3" value="Retirer" class="hero-btn"><br>';
                            }
                            if($indice ['Glove1'] != 0){
                                echo '<a href="a_glove_1">';
                                echo '<label for="glove1">BEAR KOMPLEX CARBON NO HOLE SPEED GRIPS - €55.00 - Qte:';
                                echo $indice ['Glove1'];
                                echo ' </label>';
                                echo '</a>';
                                echo '<input type="submit" name="retire_glove1" value="Retirer" class="hero-btn"><br>';
                            }
                            if($indice ['Glove2'] != 0){
                                echo '<a href="a_glove_2">';
                                echo '<label for="glove2">DEFEU EN FIBRE DE CARBONE - €34.00 - Qte:';
                                echo $indice ['Glove2'];
                                echo ' </label>';
                                echo '</a>';
                                echo '<input type="submit" name="retire_glove2" value="Retirer" class="hero-btn"><br>';
                            }
                            if($indice ['Glove3'] != 0){
                                echo '<a href="a_glove_3">';
                                echo '<label for="glove3">BEAR KOMPLEX 3 HOLE HAND GRIPS - €48.00 - Qte:';
                                echo $indice ['Glove3'];
                                echo ' </label>';
                                echo '</a>';
                                echo '<input type="submit" name="retire_glove3" value="Retirer" class="hero-btn"><br>';
                            }
                            if($indice ['Rope1'] != 0){
                                echo '<a href="a_rope_1">';
                                echo '<label for="rope1">FRONING SR-1F SPEED ROPE 2.0 - €80.00 - Qte:';
                                echo $indice ['Rope1'];
                                echo ' </label>';
                                echo '</a>';
                                echo '<input type="submit" name="retire_rope1" value="Retirer" class="hero-btn"><br>';
                            }
                            if($indice ['Rope2'] != 0){
                                echo '<a href="a_rope_2">';
                                echo '<label for="rope2">BRANK SPORTS® Corde à Sauter Crossfit - €25.00 - Qte:';
                                echo $indice ['Rope2'];
                                echo ' </label>';
                                echo '</a>';
                                echo '<input type="submit" name="retire_rope2" value="Retirer" class="hero-btn"><br>';
                            }
                            if($indice ['Rope3'] != 0){
                                echo '<a href="a_rope_3">';
                                echo '<label for="rope3">Velites Corde à sauter Fire 2.0 - €42.00 - Qte:';
                                echo $indice ['Rope3'];
                                echo ' </label>';
                                echo '</a>';
                                echo '<input type="submit" name="retire_rope3" value="Retirer" class="hero-btn"><br>';
                            }
                        }
                    }

                    if (isset($_POST['retire_box1']) && mysqli_query($con, $find)){
                        $fn = $_SESSION['fname'];
                        $ln = $_SESSION['lname'];
                        $upd = "UPDATE `panier` SET `Box1`='0' WHERE `Identifiant`='$fn' and `Pass`='$ln'";
                        if(mysqli_query($con, $upd)){
                            header("Location:Panier.php");                                
                        } else{
                            header("Location:Modif_Impossible.php");
                        }
                    }
                    if (isset($_POST['retire_box2']) && mysqli_query($con, $find)){
                        $fn = $_SESSION['fname'];
                        $ln = $_SESSION['lname'];
                        $upd = "UPDATE `panier` SET `Box2`='0' WHERE `Identifiant`='$fn' and `Pass`='$ln'";
                        if(mysqli_query($con, $upd)){
                            header("Location:Panier.php");                                
                        } else{
                            header("Location:Modif_Impossible.php");
                        }
                    }
                    if (isset($_POST['retire_box3']) && mysqli_query($con, $find)){
                        $fn = $_SESSION['fname'];
                        $ln = $_SESSION['lname'];
                        $upd = "UPDATE `panier` SET `Box3`='0' WHERE `Identifiant`='$fn' and `Pass`='$ln'";
                        if(mysqli_query($con, $upd)){
                            header("Location:Panier.php");                                
                        } else{
                            header("Location:Modif_Impossible.php");
                        }
                    }
                    if (isset($_POST['retire_glove1']) && mysqli_query($con, $find)){
                        $fn = $_SESSION['fname'];
                        $ln = $_SESSION['lname'];
                        $upd = "UPDATE `panier` SET `Glove1`='0' WHERE `Identifiant`='$fn' and `Pass`='$ln'";
                        if(mysqli_query($con, $upd)){
                            header("Location:Panier.php");                                
                        } else{
                            header("Location:Modif_Impossible.php");
                        }
                    }
                    if (isset($_POST['retire_glove2']) && mysqli_query($con, $find)){
                        $fn = $_SESSION['fname'];
                        $ln = $_SESSION['lname'];
                        $upd = "UPDATE `panier` SET `Glove2`='0' WHERE `Identifiant`='$fn' and `Pass`='$ln'";
                        if(mysqli_query($con, $upd)){
                            header("Location:Panier.php");                                
                        } else{
                            header("Location:Modif_Impossible.php");
                        }
                    }
                    if (isset($_POST['retire_glove3']) && mysqli_query($con, $find)){
                        $fn = $_SESSION['fname'];
                        $ln = $_SESSION['lname'];
                        $upd = "UPDATE `panier` SET `Glove3`='0' WHERE `Identifiant`='$fn' and `Pass`='$ln'";
                        if(mysqli_query($con, $upd)){
                            header("Location:Panier.php");                                
                        } else{
                            header("Location:Modif_Impossible.php");
                        }
                    }
                    if (isset($_POST['retire_rope1']) && mysqli_query($con, $find)){
                        $fn = $_SESSION['fname'];
                        $ln = $_SESSION['lname'];
                        $upd = "UPDATE `panier` SET `Rope1`='0' WHERE `Identifiant`='$fn' and `Pass`='$ln'";
                        if(mysqli_query($con, $upd)){
                            header("Location:Panier.php");                                
                        } else{
                            header("Location:Modif_Impossible.php");
                        }
                    }
                    if (isset($_POST['retire_rope2']) && mysqli_query($con, $find)){
                        $fn = $_SESSION['fname'];
                        $ln = $_SESSION['lname'];
                        $upd = "UPDATE `panier` SET `Rope2`='0' WHERE `Identifiant`='$fn' and `Pass`='$ln'";
                        if(mysqli_query($con, $upd)){
                            header("Location:Panier.php");                                
                        } else{
                            header("Location:Modif_Impossible.php");
                        }
                    }
                    if (isset($_POST['retire_rope3']) && mysqli_query($con, $find)){
                        $fn = $_SESSION['fname'];
                        $ln = $_SESSION['lname'];
                        $upd = "UPDATE `panier` SET `Rope3`='0' WHERE `Identifiant`='$fn' and `Pass`='$ln'";
                        if(mysqli_query($con, $upd)){
                            header("Location:Panier.php");                                
                        } else{
                            header("Location:Modif_Impossible.php");
                        }
                    }
            ?>  
        </form> 
    </section>

<!------achat------>

    <section class="acheter">
        <div class="achat">
            <h1>Passez a l'achat de vos artice</h1>
            <a href="indisponible.php" class="hero-btn">Payement</a>
        </div>
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