<?php

/*


                    <form class="form" action="registerLink.php" method="post" onload="disabledBtn()">
                    <label id="gender" for="gender">
                            <input type="radio" id="genderM" name="gender" value="1" onclick="verifyFields()">
                            <label for="genderM">M.</label>
                            <input type="radio" id="genderF" name="gender" value="2" onclick="verifyFields()">
                            <label for="genderF">Mme</label>
                            <input type="radio" id="genderO" name="gender" value="0" onclick="verifyFields()">
                            <label for="genderO">Autre</label>
                    </label><br>
                        <br>
                        <input type="text" id="firstname" class="form-control" name="firstname" placeholder="Votre prénom" onkeyup="verifyFields()" required="required"><br>
                        <input type="text" id="lastname" class="form-control" name="lastname" placeholder="Votre nom" onkeyup="verifyFields()" required="required"><br>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Votre email" onkeyup="verifyFields()" required="required"><br>
                        Date de naissance :
                        <input type="date" id="birthdate" class="form-control" name="date" placeholder="Votre date de naissance" onkeyup="verifyFields()" required="required"><br>
                        <input type="submit" id="submit" class="btn btn-danger mt-3" value="Envoyer" disabled>
                    </form>


*/



// récupérer les données du formulaire

$gender = $_POST["gender"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$birthdate = $_POST["birthdate"];

