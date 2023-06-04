<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $email = $_GET["email"];
    if($email == NULL){
        $data = "SELECT * FROM ".DB_PREFIX."user";   
    } else {
        $data = "SELECT * FROM ".DB_PREFIX."user WHERE email LIKE '$email%'";
    }


        $pdo = connectDB();
		$queryPrepared = $pdo->prepare($data);
		$queryPrepared->execute();
		$results = $queryPrepared->fetchAll();
    ?>

        <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    foreach ($results as $user) {
                        echo '<tr>
                                <td>'.$user["id"].'</td>
                                <td>'.$user["lastname"].'</td>
                                <td>'.$user["firstname"].'</td>
                                <td>'.$user["email"].'</td>
                                <td>

                                    <div class="btn-group">
                                        <a href="delUser.php?id='.$user["id"].'" class="btn btn-danger">Supprimer</a>
                                        <a href="#" class="btn btn-warning" >Modifier</a>
                                    </div>
                                </td>
                            </tr>';
                    }


                    ?>
    <?php   


?>