<?php
    session_start();
    $pageTitle = "Profil";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
    ?>


    <?php
            if(isset($_GET["email"])){
                $_SESSION["email"] = $_GET["email"];
            }
            $pdo = connectDB();
            $queryPrepared = $pdo->prepare("SELECT * FROM ".DB_PREFIX."user WHERE email=:email");
            $queryPrepared->execute(["email"=>$_SESSION["email"]]);
            $user = $queryPrepared->fetch();
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
                <input type="text" class="form-control" name="phone_number" value="<?php  if ($user["phone_number"] != "0100000000"){echo $user["phone_number"];}else {echo "Votre numéro de téléphone";} ?>"><br>
                <input type="text" class="form-control" name="address" value="<?php  if ($user["address"] != "unset"){echo $user["address"];}else {echo "Votre adresse";} ?>"><br>
                <input type="text" class="form-control" name="postal_code" value="<?php  if ($user["postal_code"] != "00000"){echo $user["postal_code"];}else {echo "Votre code postal";} ?>"><br>
                <input type="text" class="form-control" name="email" value="<?php  echo $user["email"];?>"><br>
                <input type="submit" class="btn btn-primary" value="Modifier">
            </form>
        </div>
    </div>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";?>