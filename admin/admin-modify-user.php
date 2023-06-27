<?php
    session_start();
    $pageTitle = "Modifier l'utilisateur";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>

<?php
    // récupérer les données de l'utilisateur à modifier
    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("SELECT * FROM ".DB_PREFIX."user WHERE id=:id");
    $queryPrepared->execute(["id"=>$_GET["id"]]);
    $user = $queryPrepared->fetch();
    $id = $user["id"];

    if($user["scope"] == 0){
        $scope = "admin";
    } elseif($user["scope"] == 1){
        $scope = "entreprise";
    } else {
        $scope = "investisseur";
    }
    ?>

<div class="container mt-5">
    <div class="mx-auto col-lg-6">
        <h2 class="text-center">Modifications</h2>
    </div>
    <div class="col-lg-5 mx-auto">
        <form action="/core/userUpdate.php" method="post">
            <input type="hidden" name="id" value="<?php echo $user["id"];?>">
            <input type="text" class="form-control" value="<?php  echo $user["firstname"];?>" disabled="disabled"><br>
            <input type="text" class="form-control" value="<?php  echo $user["lastname"];?>" disabled="disabled"><br>
            <input type="text" class="form-control" name="phone" value="<?php  echo $user["phone_number"];?>"><br>
            <input type="text" class="form-control" name="address" value="<?php  echo $user["postal_address"];?>"><br>
            <input type="text" class="form-control" name="postal_code" value="<?php  echo $user["postal_code"];?>"><br>
            <input type="text" class="form-control" name="email" value="<?php  echo $user["email"];?>"><br>

            <select class="form-control" name="scope">
                <option value="admin" <?php if($scope == "admin"){echo "selected";} ?>>Administrateur</option>
                <option value="entreprise" <?php if($scope == "entreprise"){echo "selected";} ?>>Entreprise</option>
                <option value="investisseur" <?php if($scope == "investisseur"){echo "selected";} ?>>Investisseur</option>
            </select><br>

            <input type="text" class="form-control" name="pwd" placeholder="Saisir le nouveau mot de passe"><br>
            <input type="text" class="form-control" name="pwdConfirm" placeholder="Saisir le nouveau mot de passe"><br>
            <input type="submit" class="btn btn-primary" value="Modifier">
        </form>
    </div>
</div>


  <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/templates/footer.php";
    page_load_time();
    ?>
