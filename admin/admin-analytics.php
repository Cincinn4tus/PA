<?php

    session_start();
    $pageTitle = "Analytics";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
    ?>


    <!--
    <div class="progress-bar">
      <div class="progress"></div>
    </div>
-->


<?php
	$connection = connectDB();
	$results = $connection->query("SELECT * FROM ".DB_PREFIX."logs");
	$results = $results->fetchAll();


            // compte le nombre de lignes du tableau des dernières 24 heures

            $logs24 = 0;
            // pour chaque log dont la date est inférieure ou égale à la date actuelle - 24h, on incrémente le compteur

            foreach ($results as $logs) {
                if ($logs["visit_date"] >= date("Y-m-d H:i:s", strtotime("-24 hours"))){
                    $logs24++;
                }
            }

            // on affiche le nombre de logs des dernières 24h

            echo "<h3 class='mt-5'>Nombre de logs des dernières 24 heures : ".$logs24."</h3>";


?>




    <div class="container">
      <div class="row">
        <div id="day-analytics" class="col-lg-8">
          <table class="table mt-5">
            <thead>
                <!--
                chaque colonne représente deux heures et on affiche les 24 dernières heures arrondies à l'heure inférieure
                -->
                <tr>
                    <th>Heure</th>
                    <?php
                        for ($i = 0; $i < 12; $i++){
                            echo "<th>".date("H:i", strtotime("-".(24-$i*2)." hours"))."</th>";
                        }
                    ?>
            </thead>
            

            <?php

                // on récupère le nombre de logs pour chaque heure des 24 dernières heures

                $logs = array();
                for ($i = 0; $i < 12; $i++){
                    $logs[$i] = 0;
                    foreach ($results as $log){
                        if ($log["visit_hour"] == date("H:i", strtotime("-".(24-$i*2)." hours"))){
                            $logs[$i]++;
                        }
                    }
                }

                // on converti le tableau en pourcentage

                $logs = array_map(function($value) use ($logs24){
                    return round($value/$logs24*100, 2);
                }, $logs);

                // on affiche le nombre de logs pour chaque heure des 24 dernières heures sous forme de progress bar verticale

                echo "<tbody class='table_odd'>";
                    for ($i = 0; $i < 12; $i++){
                        echo "<tr class='progress-bar'>";
                            echo "<td class='progress'>".date("H:i", strtotime("-".(24-$i*2)." hours"))."</td>";
                            echo "<td><div class='progress-bar'><div class='progress' style='height: ".$logs[$i]."%;'></div></div></td>";
                        echo "</tr>";
                    }

                echo "</tbody>";
?>


          </table>
        </div>
      </div>
    </div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";?>