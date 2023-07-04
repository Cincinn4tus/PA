<?php 
    session_start();
    $pageTitle = "Modifier un utilisateur";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
    if(!isConnected() || $user['scope'] != 0){
        header("Location: /errors/403.php");
        }
?>

<?php
    // récupérer les données de l'utilisateur à modifier
    $id = $_GET["id"];
    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("SELECT * FROM ".DB_PREFIX."user WHERE id=:id");
    $queryPrepared->execute(["id"=>$id]);
    $user = $queryPrepared->fetch();
    ?>

<div class="container mt-5">
    <div class="mx-auto col-lg-6">
        <h2 class="text-center">Modifications</h2>
    </div>
    <div class="col-lg-5 mx-auto">
        <form action="/admin/admin-user-update.php?<?php $user['email'];?>" method="post">
            <input type="hidden" name="id" value="<?php echo $user["id"];?>">
            <input type="text" class="form-control" value="<?php  echo $user["firstname"];?>" disabled="disabled"><br>
            <input type="text" class="form-control" value="<?php  echo $user["lastname"];?>" disabled="disabled"><br>
            <input type="text" class="form-control" name="phone" value="<?php  echo $user["phone_number"];?>"><br>
            <input type="text" class="form-control" name="address" value="<?php  echo $user["postal_address"];?>"><br>
            <input type="text" class="form-control" name="postal_code" value="<?php  echo $user["postal_code"];?>"> <br>
            <input type="text" class="form-control" name="city" value="<?php  echo $user["city"];?>"><br>
            <input type="text" class="form-control" name="email" value="<?php  echo $user["email"];?>"><br>
            <select class="form-control" name="scope"  id="scope">
                <option value="0" <?php if($user["scope"] == '0'){echo "selected";} ?>>Administrateur</option>
                <option value="1" <?php if($user["scope"] == '1'){echo "selected";} ?>>Investisseur</option>
                <option value="2" <?php if($user["scope"] == '2'){echo "selected";} ?>>Entreprise</option>
                <option value="4" <?php if($user["scope"] == '4'){echo "selected";} ?>>Banni</option>
            </select><br>
            <input type="submit" class="btn btn-primary" value="Modifier">
        </form>
    </div>
</div>

  <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/templates/footer.php";
    page_load_time();
    ?>
