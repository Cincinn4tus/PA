<div class="container mt-3 mb-5 passwordForm">
        <div class="row text-center">
            <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Inscription - investisseur</h4>
                    </div>
                    <div class="card-body">
                        <form action="/core/companyUpdate.php" method="post">
                            <div class="step-1">
                                <h4>Mot de passe</h4><br>
                                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Mot de passe" required="required"><br>
                                <input type="password" class="form-control" name="pwdConfirm" id="pwdConfirm" placeholder="Confirmer le mot de passe" required="required" onblur="passwordVerify()"><br>
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary next-step" id="step-2" disabled onclick="nextStep('step-1', 'step-2')">Suivant</button>
                                </div>
                            </div>
                            <div class="step-2" style="display: none;">
                                <h4>Addresse de facturation</h4>
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col">
                                            <input type="number" class="form-control" name="postal_code" id="postal_code" placeholder="Code postal" required="required">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="city" id="city" placeholder="Ville" required="required">
                                        </div>
                                    </div><br>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Adresse" required="required"><br>
                                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Téléphone" required="required"><br>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-secondary previous-step" onclick="previousStep('step-2', 'step-1')">Précédent</button>
                                        <button type="button" class="btn btn-primary next-step" id="step-3" onclick="nextStep('step-2', 'step-3')">Suivant</button>
                                    </div>
                                </div>
                            </div>
                            <div class="step-3" style="display: none;">
                                <h4>Bannière (optionnel)</h4>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>