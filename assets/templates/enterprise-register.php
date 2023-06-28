<div class="container mt-3 mb-5 emailform">
    <div class="row text-center">
        <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Inscription - Entreprise</h4>
                </div>
                <div class="card-body">
                    <form class="form" action="/registration/company-register.php" method="post">
                        <input type="text" id="company_name" class="form-control" name="company_name" placeholder="Nom de l'entreprise" onkeyup="verifyFieldsCompany()" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["company_name"] : ""; ?>"><br>
                        <input type="number" id="siren" class="form-control" name="siren" id="siren" placeholder="N° Siren de l'entreprise" onkeyup="verifyFieldsCompany()" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["siren"] : ""; ?>"><br>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email de l'entreprise" onkeyup="verifyFieldsCompany()" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["email"] : ""; ?>"><br>
                        <div class="form-group form-check">
                            <input type="checkbox" id="cgu" class="form-check-input" name="cgu" required="required" onclick="verifyFieldsCompany()">
                            <label for="cgu" class="form-check-label">J'accepte les CGU</label>
                        </div>
                        <input type="submit" id="submit" class="btn btn-danger mt-3" value="Envoyer" disabled>
                    </form>
                </div>
                <div id="card-footer" class="card-footer">
                    <?php
                        if(isset($_SESSION["listOfErrors"])) {
                            foreach($_SESSION["listOfErrors"] as $error) {
                                echo $error . "<br>";
                            }
                            unset($_SESSION["listOfErrors"]);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
