<?php


  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Connexion";
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";

  // afficher toutes les erreurs PHP

    ini_set('display_errors', 1);
    error_reporting(E_ALL);


?>
<?php
    if(isset($_GET['validation'])){
        ?>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-4 mx-auto">
                    <div class="alert alert-success text-center">
                        <?php echo $_GET['validation'];?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

if(!empty($_POST['email']) &&  !empty($_POST['pwd'])){
    $email = cleanEmail($_POST["email"]);
    $pwd = $_POST["pwd"];
    //Récupérer en bdd le mot de passe hashé pour l'email
    //provenant du formulaire
    $connect = connectDB();
    $queryPrepared = $connect->prepare("SELECT pwd FROM ".DB_PREFIX."user WHERE email=:email UNION SELECT pwd FROM ".DB_PREFIX."company WHERE email=:email");
    $queryPrepared->execute(["email"=>$email]);
    $results = $queryPrepared->fetch();
    if(!empty($results) && password_verify($pwd, $results["pwd"]) ){
            if(isset($results['id'])){
                $connection = connectDB();
                $queryPrepared = $connect->prepare("SELECT pwd FROM ".DB_PREFIX."user WHERE email=:email");
                $queryPrepared->execute(["email"=>$_POST["email"]]);
                $user = $queryPrepared->fetchAll();
                $_SESSION['type'] = "user";
                $_SESSION['email'] = $email;
                $_SESSION['login'] = true;
                $_SESSION['key'] = 'id';
                $_SESSION['key_value'] = $user['id'];
            } else if(isset($results['siren'])){
                $connection = connectDB();
                $queryPrepared = $connect->prepare("SELECT pwd FROM ".DB_PREFIX."company WHERE email=:email");
                $queryPrepared->execute(["email"=>$_POST["email"]]);
                $user = $queryPrepared->fetchAll();
                $_SESSION['type'] = "company";
                $_SESSION['email'] = $email;
                $_SESSION['login'] = true;
                $_SESSION['key'] = 'siren';
                $_SESSION['key_value'] = $user['siren'];
            } else {
                $errors = "Email et / ou mot de passe incorrect";
            }
    } else {
        $errors = "Email et / ou mot de passe incorrect";
    }
}


if(isset($errors)){
    ?>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-4 mx-auto">
                <div class="alert alert-danger text-center">
                    <?php echo $errors;?>
                </div>
            </div>
        </div>
    </div>
<?php }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image10"></div>
                        <div class="col-lg-6">
                            <div class="p-5 text-center">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bienvenue de retour !</h1>
                                </div>
                                <form class="user" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                        name="email" placeholder="Votre email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                        name="pwd" required placeholder="Mot de passe">
                                    </div><br>
                                    <button class="btn btn-primary btn-user btn-block" type="submit">Se connecter</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#resetPwdModal">
                                    Mot de passe oublié ?
                                </button>
                                    <span class="mx-2 text-gray-600">|</span>
                                    <a class="small" href="/registration/getRegistration.php">Créer un compte !</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="resetPwdModal" tabindex="-1" aria-labelledby="resetPwdModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="resetPwdModal">Réinitialisez votre mot de passe</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/core/resetPwd.php" method="post">
            <input class="form-control" type="email" name="email" id="email" placeholder="Votre email" required="required">
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Envoyer">
        </form>
      </div>
    </div>
  </div>
</div>




<div class="fixed-bottom">
      <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/templates/footer.php";
    page_load_time();
    ?>
</div>
