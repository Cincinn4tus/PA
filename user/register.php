<?php
session_start();
require "../conf.inc.php";
require "../core/functions.php";
$pageTitle = "S'inscrire";
saveLogs();
getUserInfos();
include "../assets/templates/header.php";
?>
<style>
    .containers {
        display: flex;
        flex-wrap: wrap;
        width: 300px;
        height: 300px;
        border: 1px solid #000;
        position: relative;
    }

    .puzzle-piece {
        width: 100px;
        height: 100px;
        border: 1px solid #000;
        background-size: 300px 300px;
        position: absolute;
    }
</style>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>S'inscrire</h2>
            <ol>
                <li><a href="/">Accueil</a></li>
                <li>S'inscrire</li>
            </ol>
        </div>
    </div><!-- End Breadcrumbs -->

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
                            <?php if (isset($_SESSION['listOfErrors'])) { ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                            <?php

                                            foreach ($_SESSION['listOfErrors'] as $error) {
                                                echo "<li>" . $error . "</li>";
                                            }
                                            unset($_SESSION['listOfErrors']);
                                            ?>



                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <form action="../core/userAdd.php" method="POST" class="user">
                                <center>
                                    <div class="containers" id="d4" style="display: block" ;>

                                    </div>
                                </center>
                                <div id="d2" style="display: none" ;>
                                    <center>
                                        <h1 class="h4 text-gray-900 mb-4">informations personnels</h1>
                                    </center>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="firstname" placeholder="Votre prénom" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["firstname"] : ""; ?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" name="lastname" placeholder="Votre nom" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["lastname"] : ""; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email" placeholder="Votre email" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["email"] : ""; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control form-control-user" name="phone_number" placeholder="Votre numéro de téléphone" required="required" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["phone_number"] : ""; ?>">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" name="pwd" placeholder="Mot de passe" required="required">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" name="pwdConfirm" placeholder="Confirmez le mot de passe" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6">

                                            </br>
                                            <input type="checkbox" class="form-check-input" id="cgu" name="cgu" required="required">
                                            <label for="cgu" class="form-label"> J'accepte les CGUs</label>
                                        </div>

                                        <!-- <div class="col-6">
								</br><input type="submit" value="S'inscrire" class="btn btn-primary btn-user btn-block">
			                    </div>-->

                                    </div>
                                </div>
                        </div>
                        <div id="d1" style="display: none" ;>
                            <center>
                                <h1 class="h4 text-gray-900 mb-4">compte Investisseur </h1>
                            </center>
                            <center>
                                <div class="form-group">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="Phone_numberE" placeholder="Le Numéro de téléphone de l'entreprise" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["Phone_number"] : ""; ?>">
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" name="Siret" placeholder="Votre numéro Siret" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["Siret"] : ""; ?>">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="nameEntreprise" placeholder="Le nom de l'entreprise" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["Siret"] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-6">

                                    </br>
                                    <input type="checkbox" class="form-check-input" id="InvestisseurCheck" name="InvestisseurCheck">
                                    <label for="InvestisseurCheck" class="form-label"> Je confirme être un investisseur</label>
                                </div>
                                <div class="mb-5">
                                    <div id="d5" style="display: none" ;>
                                        </br><input type="submit" value="S'inscrire en tant qu'investisseur" class="btn btn-primary btn-user btn-block">
                                    </div>
                                </div>
                            </center>
                        </div>
                        <div id="d3" style="display: none" ;>
                            <center>
                                <h1 class="h4 text-gray-900 mb-4">Compte entrepreuneur </h1>
                            </center>
                            <center>
                                <div class="form-group">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="Phone_numberE" placeholder="Le Numéro de téléphone de l'entreprise" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["Phone_number"] : ""; ?>">
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" name="Siret" placeholder="Votre numéro Siret" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["Siret"] : ""; ?>">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="nameEntreprise" placeholder="Le nom de l'entreprise" value="<?= (!empty($_SESSION["data"])) ? $_SESSION["data"]["Siret"] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-6">

                                    </br>
                                    <input type="checkbox" class="form-check-input" id="EntrepreneurCheck" name="EntrepreneurCheck">
                                    <label for="EntrepreneurCheck" class="form-label"> Je confirme être un entrepreneur</label>
                                </div>
                                <div class="mb-5">
                                    <div id="d6" style="display: none" ;>
                                        </br><input type="submit" value="S'inscrire en tant qu'entrepreneur" class="btn btn-primary btn-user btn-block">
                                    </div>
                                </div>
                            </center>

                        </div>
                        <div id="d33" style="display: none" ;>
                            <center>

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <div class="form-group col-md-12">
                                        <label for="projetsInvestis"> avez-vous déjà investis dans des projets ? Expliquez-nous en détail.</label>
                                        <textarea type="text" class="form-control" name="projetsInvestis" id="projetsInvestis"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="projetFait"> avez-vous déjà fait des projets ? Expliquez-nous en détail.</label>
                                        <textarea type="text" class="form-control" name="projetFait" id="projetFait"></textarea>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </center>

                        </div>

                        <div class="d-flex justify-content-around">
                            <div class="d-flex justify-content-around">
                                <button class="btn btn-warning" id="back">Retourner</button>
                            </div>

                        </div>
                        <br>
                        <div class="d-flex justify-content-around">
                            <a class="btn btn-success" id="togg2">Principal 1/3</a>
                            <a class="btn btn-success" id="togg33"> Informations complémentaires 2/3</a>
                            <a class="btn btn-success" id="togg1"> Tu es un investisseur ? 3/3</a>
                            <a class="btn btn-success" id="togg3"> Tu es un entrepreneur ? 3/3</a>
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
    </div>

    <script>
    let togg1 = document.getElementById("togg1");
    let togg2 = document.getElementById("togg2");
    let togg3 = document.getElementById("togg3");
    let togg33 = document.getElementById("togg33");

    let d1 = document.getElementById("d1");
    let d2 = document.getElementById("d2");
    let d3 = document.getElementById("d3");
    let d33 = document.getElementById("d33");

    let hideAllDivs = () => {
        d1.style.display = "none";
        d2.style.display = "none";
        d3.style.display = "none";
        d33.style.display = "none";
    }

    let hideAllButtons = () => {
        togg1.style.display = "none";
        togg2.style.display = "none";
        togg3.style.display = "none";
        togg33.style.display = "none";
    }

    hideAllButtons();
    hideAllDivs();
    togg2.style.display = "block"; // Show only the "Principal" button at first
    d2.style.display = "block"; // Show only the "Principal" info at first

    let back = document.getElementById("back");
    back.style.display = "none"; // Hide the back button at first

    togg2.addEventListener("click", () => {
        hideAllDivs();
        hideAllButtons();
        d33.style.display = "block"; // Show "Informations complémentaires" info
        togg33.style.display = "block"; // Show "Informations complémentaires" button
        back.style.display = "block"; // Show the "Back" button
    });

    togg33.addEventListener("click", () => {
        hideAllDivs();
        hideAllButtons();
        // Show "Entrepreneur" and "Investisseur" buttons
        togg1.style.display = "block";
        togg3.style.display = "block";
        back.style.display = "none"; // Hide the "Back" button
    });

    togg1.addEventListener("click", () => {
        hideAllDivs();
        back.style.display = "block"; // Show the "Back" button
        d1.style.display = "block"; // Show "Investisseur" info
    });

    togg3.addEventListener("click", () => {
        hideAllDivs();
        back.style.display = "block"; // Show the "Back" button
        d3.style.display = "block"; // Show "Entrepreneur" info
    });

    // Logic to decide what happens when the back button is clicked
    back.addEventListener("click", () => {
        if (d1.style.display === "block" || d3.style.display === "block") {
            hideAllDivs();
            hideAllButtons();
            d33.style.display = "block";
            togg33.style.display = "block";
            back.style.display = "block"; // Keep the "Back" button visible
        } else if (d33.style.display === "block") {
            hideAllDivs();
            hideAllButtons();
            d2.style.display = "block";
            togg2.style.display = "block";
            back.style.display = "none"; // Hide the back button when at the principal step
        }
    });
    let d4 = document.getElementById("d4");
</script>




    <script>
        const containers = document.querySelector(".containers");

        // Liste des images disponibles
        const images = ["image2.jpg", "image3.jpg"];

        // Choisir une image aléatoire
        const randomImage = images[Math.floor(Math.random() * images.length)];

        // Découper l'image en 9 morceaux et créer les pièces du puzzle
        const pieces = [];

        for (let i = 0; i < 9; i++) {
            const piece = document.createElement("div");
            piece.classList.add("puzzle-piece");
            piece.style.backgroundImage = `url(${randomImage})`;
            piece.style.backgroundPosition = `-${(i % 3) * 100}px -${Math.floor(i / 3) * 100}px`;
            piece.setAttribute("data-index", i);
            piece.setAttribute("draggable", "true");
            pieces.push(piece);
        }

        // Mélanger les morceaux
        shuffleArray(pieces).forEach((piece, i) => {
            piece.style.left = `${(i % 3) * 100}px`;
            piece.style.top = `${Math.floor(i / 3) * 100}px`;
            containers.appendChild(piece);
        });

        containers.addEventListener("dragstart", dragStart);
        containers.addEventListener("dragend", dragEnd);

        function dragStart(event) {
            if (event.target.classList.contains("puzzle-piece")) {
                event.target.style.opacity = 0.5;
            }
        }

        function dragEnd(event) {
            if (event.target.classList.contains("puzzle-piece")) {
                event.target.style.opacity = 1;
            }
        }

        containers.addEventListener("dragover", (event) => {
            event.preventDefault();
        });

        containers.addEventListener("drop", (event) => {
            event.preventDefault();
            const target = event.target;
            if (target.classList.contains("puzzle-piece")) {
                const dragged = document.querySelector(".puzzle-piece[style*='opacity: 0.5']");
                const tempPos = {
                    left: target.style.left,
                    top: target.style.top
                };

                target.style.left = dragged.style.left;
                target.style.top = dragged.style.top;

                dragged.style.left = tempPos.left;
                dragged.style.top = tempPos.top;

                checkSolution();
            }
        });

        // Fonction pour mélanger un tableau
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        // Vérifier si le puzzle est résolu
        function checkSolution() {
            const pieces = Array.from(document.querySelectorAll(".puzzle-piece"));
            const sortedPieces = pieces.slice().sort((a, b) => {
                return parseInt(a.style.top) - parseInt(b.style.top) || parseInt(a.style.left) - parseInt(b.style.left);
            });
            if (sortedPieces.every((piece, index) => piece.getAttribute("data-index") == index)) {
                d5.style.display = "block";
                d6.style.display = "block";
            }
        }
    </script>
    <?php include "../assets/templates/footer.php"; ?>