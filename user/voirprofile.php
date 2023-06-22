<?php
    session_start();
    require "../conf.inc.php";
    require "../core/functions.php";
    $pageTitle = "VoirProfil";
    saveLogs();
    getUserInfos();
    include "../assets/templates/header.php";

    $connection = connectDB();

    $utilisateur_id = (int) trim($_GET['id']);

    if(empty($utilisateur_id)){
    	header('Location: /membres.php');
    	exit;
    }

    if(isset($_SESSION['id'])){

        $req = $connection->prepare("SELECT u.*, r.id_demandeur, r.id_receveur, r.statut, r.id_bloqueur
            FROM ".DB_PREFIX."user u
            LEFT JOIN relation r ON (id_receveur = u.id AND id_demandeur = :id2) OR (id_receveur = :id1 AND id_demandeur = u.id)
            WHERE u.id = :id1");
    
        $req->execute(array('id1' => $utilisateur_id, 'id2' => $_SESSION['id']));
    
    }else{
         $req = $connection->prepare("SELECT u.*,
            FROM ".DB_PREFIX."user u
            WHERE u.id = :id1");
    
        $req->execute(array('id1' => $utilisateur_id));
    
    };

    $voir_utilisateur = $req->fetch();

    if(!isset($voir_utilisateur['id'])){
    	header('Location: membres.php');
    	exit;
    }
    
    if(!empty($_POST)){
                extract($_POST);
                $valid = (boolean) true;

                if (isset($_POST['user-ajouter'])){
                    $req = $connection->prepare("SELECT id FROM relation WHERE (id_receveur = ? AND id_demandeur = ?) OR (id_receveur = ? AND id_demandeur = ?)");
                    $req->execute(array($voir_utilisateur['id'], $_SESSION['id'], $_SESSION['id'], $voir_utilisateur['id']));

                    $verif_relation = $req->fetch();

                    if(isset($verif_relation['id'])){
                        $valid = false;
                    }

                    if($valid){

                        $req = $connection->prepare("INSERT INTO relation (id_demandeur, id_receveur, statut) VALUES (?, ?, ?)");

                        $req->execute(array($_SESSION['id'], $voir_utilisateur['id'], 1));
                    }
                
                    header('Location: /user/voirprofile.php?id=' . $voir_utilisateur['id']);
                    exit;

                }elseif(isset($_POST['user-supprimer'])){
                    $req = $connection->prepare("DELETE FROM relation WHERE (id_receveur = ? AND id_demandeur = ?) OR (id_receveur = ? AND id_demandeur = ?)");
                    $req->execute(array($voir_utilisateur['id'], $_SESSION['id'], $_SESSION['id'], $voir_utilisateur['id']));

                    header('Location: /user/voirprofile.php?id=' . $voir_utilisateur['id']);
                    exit;

                }elseif(isset($_POST['user-bloquer'])){
                    $req = $connection->prepare("SELECT id FROM relation WHERE (id_receveur = :id1 AND id_demandeur = :id2) OR (id_receveur = :id2 AND id_demandeur = :id1)");
                    $req->execute(array('id1' => $voir_utilisateur['id'], 'id2' => $_SESSION['id']));

                    $verif_relation = $req->fetch();

                    if(isset($verif_relation['id'])){
                        $req = $connection->prepare("UPDATE relation SET id_bloqueur = ? WHERE id = ?");
                        $req->execute(array($voir_utilisateur['id'], $verif_relation['id']));
                    }else{
                        $req = $connection->prepare("INSERT INTO relation (id_demandeur, id_receveur, statut, id_bloqueur) VALUES (?, ?, ?, ?)");
                        $req->execute(array($_SESSION['id'], $voir_utilisateur['id'], 3, $voir_utilisateur['id']));
                    }

                    header('Location: /user/voirprofile.php?id=' . $voir_utilisateur['id']);
                    exit;

                }elseif(isset($_POST['user-debloquer'])){

                    $req = $connection->prepare("SELECT id, statut FROM relation WHERE (id_receveur = :id1 AND id_demandeur = :id2) OR (id_receveur = :id2 AND id_demandeur = :id1)");
                    $req->execute(array('id1' => $voir_utilisateur['id'], 'id2' => $_SESSION['id']));

                    $verif_relation = $req->fetch();

                    if(isset($verif_relation['id'])){

                        if($verif_relation['statut'] == 3){
                            $req = $connection->prepare("DELETE FROM relation WHERE id = ?");
                            $req->execute(array($verif_relation['id']));
                        }else{
                            $req = $connection->prepare("UPDATE relation SET id_bloqueur = ? WHERE id = ?");
                            $req->execute(array(NULL, $verif_relation['id']));
                        }
                    }
                 
                    header('Location: /user/voirprofile.php?id=' . $voir_utilisateur['id']);
                    exit;                    
            }
    }
    ?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2><?php echo $voir_utilisateur["firstname"]; ?></h2>
            <ol>
                <li><a href="/">Accueil</a></li>
                <li><?php echo $voir_utilisateur["firstname"]; ?></li>
            </ol>
        </div>
    </div><!-- End Breadcrumbs -->

    <div class="container mt-5" id="profile-form">
        <div class="mx-auto col-lg-6">
            <p class="text-center">
                <i class="bi bi-person-circle" style="font-size: 10rem;"></i>
            </p>
        </div>
        <div class="col-lg-5 mx-auto text-center">
            <form action="../core/userUpdate.php" method="post">
                <input type="hidden" name="id" value="<?php echo $voir_utilisateur["id"];?>">
                <input type="text" class="form-control" value="<?php  echo $voir_utilisateur["firstname"];?>" disabled="disabled"><br>
                <input type="text" class="form-control" value="<?php  echo $voir_utilisateur["lastname"];?>" disabled="disabled"><br>
                <input type="text" class="form-control" name="phone_number" value="<?php  if ($voir_utilisateur["phone_number"] != "0100000000"){echo $voir_utilisateur["phone_number"];}else {echo "Votre numéro de téléphone";} ?>"disabled="disabled"><br>
                <input type="text" class="form-control" name="email" value="<?php  echo $voir_utilisateur["email"];?>" disabled="disabled"><br>
            </form>
        </div>
        <div>
            <form method="post">
                <?php
                    if(!isset($voir_utilisateur['statut'])){
                ?>
                <input type="submit" name="user-ajouter" value="Ajouter">
                <?php
                    }elseif (isset($voir_utilisateur['statut']) && $voir_utilisateur['id_demandeur'] == $_SESSION['id'] && !isset($voir_utilisateur['id_bloqueur']) && $voir_utilisateur['statut'] <> 2){
                ?>
                <div>Demande en attente</div>
                <?php
                    }elseif (isset($voir_utilisateur['statut']) && $voir_utilisateur['id_receveur'] == $_SESSION['id'] && !isset($voir_utilisateur['id_bloqueur']) && $voir_utilisateur['statut'] <> 2){
                ?>
                <div>Vous avez une demande à accepter</div>
                <?php
                    }elseif(isset($voir_utilisateur['statut']) && $voir_utilisateur['statut'] == 2 && !isset($voir_utilisateur['id_bloqueur'])){
                ?>
                <div>Vous etes amis</div>
                <?php
                    }
                    if(isset($voir_utilisateur['statut']) && !isset($voir_utilisateur['id_bloqueur']) && $voir_utilisateur['id_demandeur'] == $_SESSION['id'] && $voir_utilisateur['statut'] <> 2){
                ?>
                <input type="submit" name="user-supprimer" value="Supprimer">
                <?php
                    }
                    if((isset($voir_utilisateur['statut']) || $voir_utilisateur['statut'] == NULL) && !isset($voir_utilisateur['id_bloqueur'])){
                ?>
                <input type="submit" name="user-bloquer" value="Bloquer">
                <?php
                    }elseif($voir_utilisateur['id_bloqueur'] <> $_SESSION['id']){
                ?>
                <input type="submit" name="user-debloquer" value="Déloquer">
                <?php
                    }else{
                ?>
                <div>Vous avez été bloqué par cet utilisateur</div>
                <?php
                    }
                ?>
            </form>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";?>