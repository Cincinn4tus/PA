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
            $req = $connection->prepare("SELECT * FROM ".DB_PREFIX."user WHERE id = ?");

            if (isset($_SESSION['id'])) {
                $req->execute([$_SESSION['id']]);
            } else {
                header('Location: login.php');
            }

            $req_user = $req->fetch();

            if ($req_user && !empty($req_user)) {
                $user = $req_user;
            } else {
                echo 'Utilisateur non trouvé';
            }
                        
    ?>

    <!-- Récupération des éléments non modifiables :
    - Nom
    - Prénom
    - Date de naissance
    -->

    <div class="container mt-5" id="profile-form">
        <div class="mx-auto col-lg-6">
            <h2 class="text-center">Mon profil</h2>
            <p class="text-center">
                <i class="bi bi-person-circle" style="font-size: 10rem;"></i>
            </p>
        </div>
        <div class="col-lg-5 mx-auto text-center">
            <form action="/core/userUpdate.php" method="post">
                <input type="hidden" name="id" value="<?php echo $user["id"];?>">
                <input type="text" class="form-control" value="<?php  echo $user["firstname"];?>" disabled="disabled"><br>
                <input type="text" class="form-control" value="<?php  echo $user["lastname"];?>" disabled="disabled"><br>
                <input type="text" class="form-control" name="phone" value="<?php  echo $user["phone_number"];?>"><br>
            <input type="text" class="form-control" name="address" value="<?php  echo $user["postal_address"];?>"><br>
            <input type="text" class="form-control" name="postal_code" value="<?php  echo $user["postal_code"];?>"><br>
            <input type="text" class="form-control" name="email" value="<?php  echo $user["email"];?>"><br>
                <input type="submit" class="btn btn-primary" value="Modifier">
            </form>
        </div>
    </div>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";?>

    
