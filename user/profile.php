<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Profil";
  saveLogs();
  getUserInfos();
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('../assets/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Mon profil</h2>
                <ol>
                <li><a href="/admin/admin-dashboard.php">Administration</a></li>
                <li>Profil</li>
                </ol>
            </div>
        </div><!-- End Breadcrumbs -->

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
                <input type="text" class="form-control" name="phone_number" value="<?php  if ($user["phone_number"] != "0100000000"){echo $user["phone_number"];}else {echo "Votre numéro de téléphone";} ?>"><br>
                <input type="text" class="form-control" name="address" value="<?php  if ($user["address"] != "unset"){echo $user["address"];}else {echo "Votre adresse";} ?>"><br>
                <input type="text" class="form-control" name="postal_code" value="<?php  if ($user["postal_code"] != "00000"){echo $user["postal_code"];}else {echo "Votre code postal";} ?>"><br>
                <input type="text" class="form-control" name="email" value="<?php  echo $user["email"];?>"><br>
                <input type="submit" class="btn btn-primary" value="Modifier">
            </form>
        </div>
    </div>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";?>

    
