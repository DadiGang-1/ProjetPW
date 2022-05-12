<?php 
    session_start();
    include('DB.php');
?>


<?php
    if (isset($_POST['delete'])){
        $fn = $_SESSION['fname'];
        $ln = $_SESSION['lname'];

        $del = "DELETE FROM `client` WHERE `Identifiant`='$fn' and `Pass`='$ln'";
        if(mysqli_query($con, $del)){
            header("Location:Disconnect.php");
        } else{
            header("Location:Modif_Impossible.php");
        }
    }
?>

<!----php redirection + connection---->
   
<?php
    if (isset($_POST['modifier'])){
        $fn = $_POST['fname'];
        $ln = $_POST['lname'];

        $n = $_POST['nom'];
        $p = $_POST['prenom'];
        $mail = $_POST['email'];
        $portable = $_POST['portable'];
        $adresse = $_POST['adresse'];
        $upd = "UPDATE `client` SET `Identifiant`='$fn',`Pass`='$ln',`Nom`='$n',`Prenom`='$p',`Email`='$mail',`Portable`='$portable',`Adresse`='$adresse' WHERE `Nom`='$n' and `Prenom`='$p'";
            if(mysqli_query($con, $upd)){
                echo "<h1>modifications apportees avec succes</h1>"; 
                $sql2 = "select * from client where Identifiant = '$fn' and Pass = '$ln'";
                $value2 = mysqli_query($con, $sql2);
                $ligne2 = mysqli_fetch_array($value2);
                if(is_array($ligne2)){
                    $_SESSION["fname"] = $ligne2 ['Identifiant'];
                    $_SESSION["lname"] = $ligne2 ['Pass'];
                } else{
                    echo '<script type = "text/javascript">';
                    echo 'alert("Login ou Password incorrect!");';
                    echo 'window.location.href = "Connect.php"; ';
                    echo '</script>';
                }
                
                if($ligne2 ['Nom'] == $_POST['nom'] && $ligne2 ['Prenom'] == $_POST['prenom']){
                    if(isset($_SESSION["fname"])){
                    header("Location:Index.php");
                    }
                }else{
                    header("Location:Modif_Impossible.php");
                }

                
            } else{
                header("Location:Modif_Impossible.php");
            }
    }
    ?>

<!DOCTYPE html>
<html>
<meta charset = "UTF-8" name="viewport" content="with=device-width,initial-scale=1.0">
 <head>
 <title>Modification</title>
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
                <!--<i class="fa-solid fa-xmark" onclick="hideMenu()"></i>-->
                <ul>
                    <li><a href="Index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <!--<li><a href="register.php">Sign In</a></li>-->

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
                    } else{}
                    ?>
                </ul>

            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
            <!--<i class="fa-solid fa-bars" onclick="showMenu()"></i>-->
        </nav>

        <div class="text-box">
            <h1>Modifier les informations de votre compte</h1>

            <form name ="Form" method = "POST" action = "modifie.php">

                <label for="fname">Login</label><br>
                <input type="text" id="fname" name="fname" placeholder="login" required="required" autocomplete="off"><br>   
                <label for="lname">Password</label><br>
                <input type="text" id="lname" name="lname" placeholder="password" required="required" autocomplete="off"><br>
                <label for="nom">Nom</label><br>
                <input type="text" id="nom" name="nom" placeholder="nom" required="required" autocomplete="off"><br>
                <label for="prenom">Prenom</label><br>
                <input type="text" id="prenom" name="prenom" placeholder="prenom" required="required" autocomplete="off"><br>
                <label for="email">E-mail</label><br>
                <input type="email" id="email" name="email" placeholder="email" required="required" autocomplete="off"><br>
                <label for="portable">Portable</label><br>
                <input type="text" id="portable" name="portable" placeholder="portable" required="required" autocomplete="off"><br>
                <label for="adresse">adresse</label><br>
                <input type="text" id="adresse" name="adresse" placeholder="adresse" required="required" autocomplete="off"><br>
                <br>
                
                <input type="submit" name="modifier" value="Modifier" class="hero-btn"><br>
                <label for="deco">_________________</label><br><br>
            </form> 

            <form name ="Form" method = "POST" action = "modifie.php">
            <input type="submit" name="delete" value="Supprimer le compte" class="hero-btn">
            </form> 
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