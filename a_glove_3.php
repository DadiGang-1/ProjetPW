<?php 
    session_start();
    include('DB.php');
?>

<!DOCTYPE html>
<html>
<meta charset = "UTF-8" name="viewport" content="with=device-width,initial-scale=1.0">
 <head>
 <title>CrossShop</title>
 <link rel="stylesheet" href="Style_article.css">
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


    <section class="article">
        <div class="row">
            <div class="article-col">

                <!----ICI TITRE ET PRIX ARTICLE---->
                <h1>BEAR KOMPLEX 3 HOLE HAND GRIPS<br><p>€48.00 

                <!----ICI NOTE ARTICLE---->
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>

                <br></p></h1><p><br>
                 
                <!----ICI TEXTE ARTICLE---->
                BEAR KOMPLEX 3
                <br>
                Disponibles ici en véritable cuir tanné, les Bear KompleX 3-Hole Hand Grips constituent une façon simple et efficace de protéger vos mains et vos paumes durant les tractions, les muscle-ups, les kettlebell swings, les deadlifts, les arrachés, et presque tous les mouvements connus pour leurs risques de déchirures et d'abrasion. 
                <br></p><br>

                <form method = "POST" name="form" action="" class="btn">
                    <input type="submit" name="add" value="Ajouter au panier" class="hero-btn">
                </form>
            </div>
            <div class="article-col">

                <!----ICI IMAGE ARTICLE---->
                <img src="image/gant3.png">


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


<?php 
    if (isset($_POST['add'])){
        $fn = $_SESSION['fname'];
        $ln = $_SESSION['lname'];

        $upd = "UPDATE `panier` SET `Glove3`='1' WHERE `Identifiant`='$fn' and `Pass`='$ln'";
        if(mysqli_query($con, $upd)){
            header("Location:shop.php");
        } else{
            header("Location:indisponible.php");
        }
    }
    ?>


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