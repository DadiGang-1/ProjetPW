<?php 
    session_start();
    include('DB.php');
?>

<!DOCTYPE html>
<html>
<meta charset = "UTF-8" name="viewport" content="with=device-width,initial-scale=1.0">
 <head>
 <title>Indisponible</title>
 <link rel="stylesheet" href="Style.css">
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 </head>
<body>
    <?php include('DB.php'); ?>
    <section class="header">
        <nav>
            <a href="Index.php"><img src="image/logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <!--<i class="fa-solid fa-xmark" onclick="hideMenu()"></i>-->
                <ul>
                    <li><a href="Index.php">Home</a></li>
                    <!--<li><a href="">About</a></li>-->
                    <li><a href="shop.php">Shop</a></li>
                    
                    <li><a href="register.php">Sign in</a></li>

                    <li><a href="Disconnect.php"> 
                        <?php
                        if(isset($_SESSION["fname"])){
                        echo $_SESSION["fname"];
                        } else{
                            echo "Connection";
                        }
                        ?>
                        </a>
                    </li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
            <!--<i class="fa-solid fa-bars" onclick="showMenu()"></i>-->
        </nav>

        <div class="text-box">
            <h1>Vous ne pouvez pas modifier votre Nom et Prenom</h1>
        </div>
    </section>

<!------footer------>

<section class="footer">
    <h4>About Us</h4>
    <!--<p>Marques déposées de Riot Games, Inc.</p>-->

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