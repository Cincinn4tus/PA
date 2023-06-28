<div class="container mt-3 mb-5 emailform">
    <div class="row text-center">
        <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Inscription - investisseur</h4>
                </div>
                <div class="card-body">
                    <form class="form" action="/registration/register.php" method="post">
                    <label id="gender" for="gender">
                            <input type="radio" id="genderM" name="gender" value="1" onclick="verifyFieldsInvestor()">
                            <label for="genderM">M.</label>
                            <input type="radio" id="genderF" name="gender" value="2" onclick="verifyFieldsInvestor()">
                            <label for="genderF">Mme</label>
                            <input type="radio" id="genderO" name="gender" value="0" onclick="verifyFieldsInvestor()">
                            <label for="genderO">Autre</label>
                    </label><br>
                        <br>
                        <input type="text" id="firstname" class="form-control" name="firstname" placeholder="Votre prénom" onkeyup="verifyFieldsInvestor()" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["firstname"] : ""; ?>"><br>
                        <input type="text" id="lastname" class="form-control" name="lastname" placeholder="Votre nom" onkeyup="verifyFieldsInvestor()" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["lastname"] : ""; ?>"><br>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Votre email" onkeyup="verifyFieldsInvestor()" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["email"] : ""; ?>"><br>
                        Date de naissance :
                        <input type="date" id="birthdate" class="form-control" name="birthdate" placeholder="Votre date de naissance" onkeyup="verifyFieldsInvestor()" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["birthdate"] : ""; ?>"><br>
                        <div class="form-group form-check">
                            <input type="checkbox" id="cgu" class="form-check-input" name="cgu" required="required" onclick="verifyFieldsInvestor()">
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

