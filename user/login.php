<?php 
session_start();
$pageTitle = "Connexion";
require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
saveLogs();
?>


<?php
    if( !empty($_POST['email']) &&  !empty($_POST['pwd']) ){

            $email = cleanEmail($_POST["email"]);
            $pwd = $_POST["pwd"];

            //Récupérer en bdd le mot de passe hashé pour l'email
            //provenant du formulaire
            $connect = connectDB();
            $queryPrepared = $connect->prepare("SELECT pwd FROM ".DB_PREFIX."user WHERE email=:email");
            $queryPrepared->execute(["email"=>$email]);
            $results = $queryPrepared->fetch();

            if(!empty($results) && password_verify($pwd, $results["pwd"]) ){
                $_SESSION['email'] = $email;
                $_SESSION['login'] = true;
                $_SESSION['role'] = $role;
                header("Location: ../index.php");
            }else{
                echo "Identifiants incorrects";
                }
                }?>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image10"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                   
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                            name="email"
                                                placeholder="Votre email" required="required">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                            name="pwd" required="required" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>

                                           
                                        <button class="btn btn-primary btn-user btn-block">Se connecter</button>
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


<div class="fixed-bottom">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>
</div>
