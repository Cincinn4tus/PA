<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Profil";
  
  getUserInfos();
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>


    <?php
            $connection = connectDB();
            
            $pdo = connectDB();
            $queryPrepared = $pdo->prepare("SELECT * FROM ".DB_PREFIX.$_SESSION['type']." WHERE ".$_SESSION['key']."=".$_SESSION['key']."");
            $queryPrepared->execute([$_SESSION['key']=>$_SESSION['key_value']]);
            $results = $queryPrepared->fetch();



            if($_SESSION['key'] == "id"){
                foreach($results as $user){
                    // crée un formulaire rempli avec les infos de l'utilisateur

                    echo "<form action='/core/userUpdate.php' method='post'>";
                    echo "<input type='hidden' name='id' value='".$user['id']."'>";
                    echo "<input type='text' class='form-control' value='".$user['firstname']."' disabled='disabled'><br>";
                    echo "<input type='text' class='form-control' value='".$user['lastname']."' disabled='disabled'><br>";
                    echo "<input type='text' class='form-control' name='phone' value='".$user['phone_number']."'><br>";
                    echo "<input type='text' class='form-control' name='address' value='".$user['postal_address']."'><br>";
                    echo "<input type='text' class='form-control' name='postal_code' value='".$user['postal_code']."'><br>";
                    echo "<input type='text' class='form-control' name='email' value='".$user['email']."'><br>";
                    echo "<input type='submit' class='btn btn-primary' value='Modifier'>";
                    echo "</form>";
                }
            }


               
    ?>



<h1>
    <?php echo $_SESSION['type']; ?>
</h1>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";?>

    
