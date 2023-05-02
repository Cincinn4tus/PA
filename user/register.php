<?php 
session_start();
$pageTitle = "CrowdHub - Connexion";
require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
saveLogs();
?>

<div class="row">
		<div class="col-12">
			<h1>S'inscrire</h1>
		</div>
	</div>


<?php if(isset($_SESSION['listOfErrors'])) {?>
	<div class="row">
		<div class="col-12">
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  
			  <?php

			  foreach ($_SESSION['listOfErrors'] as $error)
			  {
			  	echo "<li>".$error."</li>";
			  }
			  unset($_SESSION['listOfErrors']);
			  ?>



			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
	</div>
<?php } ?> 


<div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image10"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <?php if(isset($_SESSION['listOfErrors'])) {?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        
                                        <?php

                                        foreach ($_SESSION['listOfErrors'] as $error)
                                        {
                                            echo "<li>".$error."</li>";
                                        }
                                        unset($_SESSION['listOfErrors']);
                                        ?>



                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?> 
                    <form action="../core/userAdd.php" method="POST" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="firstname" placeholder="Votre prénom" required="required" 
				value="<?= ( !empty($_SESSION["data"]))?$_SESSION["data"]["firstname"]:""; ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="lastname" placeholder="Votre nom" required="required"
				value="<?= ( !empty($_SESSION["data"]))?$_SESSION["data"]["lastname"]:""; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" placeholder="Votre email" required="required"
				value="<?= ( !empty($_SESSION["data"]))?$_SESSION["data"]["email"]:""; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control form-control-user" name="phone_number" placeholder="Votre numéro de téléphone" required="required"
				value="<?= ( !empty($_SESSION["data"]))?$_SESSION["data"]["phone_number"]:""; ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            name="pwd" placeholder="Mot de passe" required="required">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                        name="pwdConfirm" placeholder="Confirmez le mot de passe" required="required">
                                    </div>
                                </div>
								<div class="form-group row">
								<div class="col-6">

								</br>
									<input type="checkbox" class="form-check-input" id="cgu" name="cgu" required="required">
									<label for="cgu" class="form-label"> J'accepte les CGUs</label>
								</div>
								
                                <div class="col-6">
								</br><input type="submit" value="S'inscrire" class="btn btn-primary btn-user btn-block">
			                    </div>
								
									</div>
							</div>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgotpassword.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>