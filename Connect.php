<?php 
    session_start();
    include('DB.php');
?>

<!DOCTYPE html>
<html>
<meta charset = "UTF-8" name="viewport" content="with=device-width,initial-scale=1.0">
 <head>
 <title>Connection</title>
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
                    <!--<li><a href="connect.php">Connection</a></li>-->
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
        </nav>

        <div class="text-box">
            <h1>Connectez-vous</h1>
            <form name ="Form" method = "POST" action = "Connect.php">
                <label for="fname">Login:</label><br>
                <input type="text" id="fname" name="fname" class = "field" require = "required"><br>
                <label for="lname">Password:</label><br>
                <input type="password" id="lname" name="lname" class = "field" require = "required"><br><br>
                <input type="submit" name="connect" value="Connect" class="hero-btn"><br>
            </form>
        </div>
    </section>


<!------footer------>

<section class="footer">
    <h4>About Us</h4>
    <!--<p>Marques d??pos??es de Riot Games, Inc.</p>-->

    <div class="icons">
        <i class="fa-brands fa-facebook-f"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-youtube"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-linkedin"></i>
        <p> Fait avec <i class="fa-regular fa-heart"></i> par nos athletes </p>
    </div>
</section>

<!------php redirection------>

<?php
if (isset($_POST['connect'])){
    $fn = $_POST['fname'];
    $ln = $_POST['lname'];

    $sql = "select * from administrateur where Login = '$fn' and Pwd = '$ln'";
    $value = mysqli_query($con, $sql);
    $ligne = mysqli_fetch_array($value);//, MYSQLI_ASSOC);  
    //$v??rif = mysqli_num_rows($value);

    $sql2 = "select * from client where Identifiant = '$fn' and Pass = '$ln'";
    $value2 = mysqli_query($con, $sql2);
    $ligne2 = mysqli_fetch_array($value2);//, MYSQLI_ASSOC);  
    //$v??rif2 = mysqli_num_rows($value2); 

    if(is_array($ligne)){
        $_SESSION["fname"] = $ligne ['Login'];
        $_SESSION["lname"] = $ligne ['Pwd'];
    }
    else{
        if(is_array($ligne2)){
            $_SESSION["fname"] = $ligne2 ['Identifiant'];
            $_SESSION["lname"] = $ligne2 ['Pass'];
        }
        else{
        echo '<script type = "text/javascript">';
        echo 'alert("Login ou Password incorrect!");';
        echo 'window.location.href = "Connect.php"; ';
        echo '</script>';
        }
    }
}
if(isset($_SESSION["fname"])){
    header("Location:Index.php");
}
?>

<!-------JavaScript bouton Menu et Ferm??------>

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