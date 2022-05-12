<?php 
    session_start();
    //include('DB.php');
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

                    <!--
                    <li><a href="Disconnect.php"> 
                        <?php /*
                        if(isset($_SESSION["fname"])){
                        echo $_SESSION["fname"];
                        } else{
                            echo "Connection";
                        } */
                        ?>
                        </a>
                    </li>
                    -->

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

                    <!--test btn selon la connection-->

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
            <h1>Premier site de vente en ligne<br>specialise dans les equipement de CrossFit</h1>
            <p>collaborateur<br>ROGUE // REEBOK // NIKE</p>
            <a href="indisponible.php" class="hero-btn">Nouvelle collection</a>
        </div>
    </section>

<!------- Game ------->

    <section class="game">
        <h1>Nos valeurs</h1>
        <p>Nous mettons a votre disposition un acces a la meilleur qualite teste et approuve par nos athletes.</p>
    
        <div class="row">
            <div class="game-col">
                <h3> La meilleurs qualite </h3>
                <p> Nous nous engageons a tester chaqu'un des produits disponible sur notre site </p>
            </div>
            <div class="game-col">
                <h3> Les meilleurs createurs </h3>
                <p> Creer des liens solides avec des createurs independants ou connue a l'internationnal </p>
            </div>
            <div class="game-col">
                <h3> Nos athletes</h3>
                <p> Nous contactons les meilleurs athletes dans la discipline pour vous fournir les meilleurs avis </p>
            </div>
        </div>

    </section>

<!---- actu ----->

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

<!---- encore une partie ---->
<!--
    <section class="autre">
        <h1>Autre</h1>
        <p>Je sais plus quoi mettre, je suis fatigue</p>

        <div class="row">
            <div class="autre-col">
                <img src="https://images.contentstack.io/v3/assets/bltb6530b271fddd0b1/blta7a40fb9d8bc8653/61d4af200d81d913d2ac70e3/VALORANT_Ep4_A1_Social_Updates_NeonContent_Stack_Thumbnail.png">
                <h3>Neon</h3>
                <p>L'agent philippin, Neon, s'élance vers l'avant à une vitesse fulgurante, libérant de grosses décharges de radiance biomagnétique générées frénétiquement par son corps. Elle se lance à la poursuite des ennemis qui n'ont pas le temps de s'y préparer et les élimine aussi vite que l'éclair.</p>
            </div>
            <div class="autre-col">
                <img src="https://www.journaldugeek.com/content/uploads/2022/04/template-jdg-2022-04-25t153020-081.jpg">
                <h3>Fade</h3>
                <p>Originaire de Turquie, la chasseuse de primes Fade utilise le pouvoir des cauchemars pour s'emparer des secrets ennemis. Elle traque ses cibles et révèle leurs plus grandes peurs pour mieux les briser dans l'obscurité.</p>
            </div>
            <div class="autre-col">
                <img src="https://images.bfmtv.com/PbVpEAgzCDXNIpz4CRzQ8KDC_io=/16x3:1264x705/1248x0/images/-335957.jpg">
                <h3>Jett</h3>
                <p>Représentante de sa patrie, la Corée du Sud, Jett dispose d'un style de combat basé sur l'agilité et l'esquive, qui lui permet de prendre des risques qu'elle seule peut se permettre de prendre. Elle tourne autour des affrontements et découpe ses ennemis avant même qu'ils ne s'en rendent compte.</p>
            </div>
        </div>
    </section>
-->
<!----com---->

<section class="com">
    <h1>Retour de nos client</h1>
    <p>Leurs avis le plus s'insere</p>
    
    <div class="row">
        <div class="com-col">
            <img src="image/will.jpg">
            <div>
                <p>Impossible de ne pas consulte CrossShop, tout les equipements sont absoluments parfais.</p>
                <h3>Plus de doute</h3>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
        </div>
        <div class="com-col">
            <img src="image/will2.jpg">
            <div>
                <p>J'ai achete une barre classique pour m'entrainer, et je me suis retrouver sans le vouloir avec la meilleur qualite du marche.</p>
                <h3>Rien a dire</h3>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half"></i>
            </div>
        </div>
    </div>
</section>

<!------Call------>

<section class="call">
    <h1> Participer aux competitions </h1>
    <a href="indisponible.php" class="hero-btn">contactez nous</a>
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