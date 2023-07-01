<?php
    session_start();
    $pageTitle = "Profil";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
    ?>
<div class="container mt-3 mb-5 passwordForm">
    <div class="row text-center">
        <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Mon entreprise</h4>
                </div>
                <div class="card-body">
                    <form action="/core/companyAdd.php" method="post">
                        <div class="step-1">
                            <h4>Informations légales</h4><br>
                            <input type="text" id="company_name" class="form-control" name="company_name" placeholder="Nom de l'entreprise" onkeyup="verifyFieldsCompany()" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["company_name"] : ""; ?>"><br>
                            <input type="number" id="siren" class="form-control" name="siren" placeholder="N° Siren de l'entreprise" onkeyup="verifyFieldsCompany()" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["siren"] : ""; ?>"><br>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary next-step" id="step-2" onclick="nextStep('step-1', 'step-2')">Suivant</button>
                            </div>
                        </div>
                        <div class="step-2" style="display: none;">
                            <h4>Adresse de facturation</h4>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="form-control" name="postal_code" id="postal_code" placeholder="Code postal" required="required"  value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["postal_code"] : ""; ?>">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="city" id="city" placeholder="Ville" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["city"] : ""; ?>">
                                    </div>
                                </div><br>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Adresse" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["address"] : ""; ?>"><br>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Téléphone" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["phone"] : ""; ?>"><br>
                                <div class="text-center">
                                    <button type="button" class="btn btn-secondary previous-step" onclick="previousStep('step-2', 'step-1')">Précédent</button>
                                    <button type="button" class="btn btn-primary next-step" id="step-3" onclick="nextStep('step-2', 'step-3')">Suivant</button>
                                </div>
                            </div>
                        </div>
                        <div class="step-3" style="display: none;">
                            <h4>Bannière (optionnelle)</h4>
                            <p>
                                <i>*La bannière sera visible sur les projets que vous créez</i>
                            </p>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col">
                                        <input type="file" class="form-control" name="profile_picture" id="profile_picture">
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-secondary previous-step" onclick="previousStep('step-3', 'step-2')">Précédent</button>
                                    <input type="submit" class="btn btn-primary" id="submit" value="Valider">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_SESSION["listOfErrors"])) {
        foreach($_SESSION["listOfErrors"] as $error) {
            echo $error . "<br>";
        }
        unset($_SESSION["listOfErrors"]);
    }
?>

<script src="/assets/js/completeCompany.js"></script>



    <div class="fixed-bottom">
<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/templates/footer.php";
    page_load_time();
?>
</div>