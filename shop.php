<?php 
    session_start();
    include('DB.php');
?>

<!DOCTYPE html>
<html>
<meta charset = "UTF-8" name="viewport" content="with=device-width,initial-scale=1.0">
 <head>
 <title>CrossShop</title>
 <link rel="stylesheet" href="Style.css">
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
                    <!--<li><a href="register.php">Sign in</a></li>-->

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

        <div class="text-box">
            <h1>Faites votre choix</h1>
            <p>des milliers de produits</p>
            <a href="indisponible.php" class="hero-btn">Nouvelle collection</a>
        </div>
    </section>

<!----top vente----->

    <section class="Actu">
        <h1>Les incontournables</h1>
        <p>Nos produits les plus prise par la communaute</p>
        <div class="row">
            <div class="actu-col">
                <a href="a_box_1.php">
                <img src="image/box.png">
                <div class="layer">
                    <h3>ROGUE FLAT PACK GAMES BOX</h3>
                </div></a>
            </div>
            <div class="actu-col">
                <a href="a_glove_1.php">
                <img src="image/gant.png">
                <div class="layer">
                    <h3>BEAR KOMPLEX CARBON NO HOLE SPEED GRIPS</h3>
                </div></a>
            </div>
            <div class="actu-col">
                <a href="a_rope_1.php">
                <img src="image/corde1.png">
                <div class="layer">
                    <h3>FRONING SR-1F SPEED ROPE 2.0</h3>
                </div></a>
            </div>
        </div>
    </section>

<!----box----->

    <section class="Actu">
        <h1>Box</h1>
        <p>saute toujour plus haut <br>Longueur	30" // Largeur	24" // Hauteur	20"</p>
        <div class="row">
            <div class="actu-col">
                <a href="a_box_1.php">
                <img src="image/box.png">
                <div class="layer">
                    <h3>ROGUE FLAT PACK GAMES BOX</h3>
                    <p>€165.00
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                </div></a>
            </div>
            <div class="actu-col">
                <a href="a_box_2.php">
                <img src="image/box1.png">
                <div class="layer">
                    <h3>ROGUE ECHO FOAM GAMES BOX</h3>
                    <p>€336.00
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                </div></a>
            </div>
            <div class="actu-col">
                <a href="a_box_3.php">
                <img src="image/box3.jpg">
                <div class="layer">
                    <h3>BOX JUMP, BOX DE PLIOMETRIE, PLYOBOX</h3>
                    <p>€80.00 <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                </div></a>
            </div>
        </div>
    </section>


<!-----manique---->

<section class="Actu">
        <h1>Maniques</h1>
        <p>Prennez soin de vos main <br>taille XL // L // M</p>
        <div class="row">
            <div class="actu-col">
                <a href="a_glove_1.php">
                <img src="image/gant.png">
                <div class="layer">
                    <h3>BEAR KOMPLEX CARBON NO HOLE SPEED GRIPS</h3>
                    <p>€55.00
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                </div></a>
            </div>
            <div class="actu-col">
                <a href="a_glove_2.php">
                <img src="image/gant1.jpg">
                <div class="layer">
                    <h3>DEFEU EN FIBRE DE CARBONE</h3>
                    <p>€34.00
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i></p>
                </div></a>
            </div>
            <div class="actu-col">
                <a href="a_glove_3.php">
                <img src="image/gant3.png">
                <div class="layer">
                    <h3>BEAR KOMPLEX 3 HOLE HAND GRIPS</h3>
                    <p>€48.00 
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                </div></a>
            </div>
        </div>
    </section>

<!----corde---->

<section class="Actu">
        <h1>Corde</h1>
        <p>toujour plus vite <br>Longueur reglable pour chaque corde</p>
        <div class="row">
            <div class="actu-col">
                <a href="a_rope_1.php">
                <img src="image/corde1.png">
                <div class="layer">
                    <h3>FRONING SR-1F SPEED ROPE 2.0</h3>
                    <p>€80.00
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                </div></a>
            </div>
            <div class="actu-col">
                <a href="a_rope_2.php">
                <img src="image/corde2.jpg">
                <div class="layer">
                    <h3>BRANK SPORTS® Corde à Sauter Crossfit</h3>
                    <p>€25.00
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                </div></a>
            </div>
            <div class="actu-col">
                <a href="a_rope_3.php">
                <img src="image/corde3.jpg">
                <div class="layer">
                    <h3>Velites Corde à sauter Fire 2.0</h3>
                    <p>€42.00 <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i></p>
                </div></a>
            </div>
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