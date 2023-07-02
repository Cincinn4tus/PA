<?php 
    session_start();
    $pageTitle = "Logs";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
    if(!isConnected() || $user['scope'] != 0){
        header("Location: /errors/403.php");
        }
        ?>

    
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $upload_dir = "../assets/img/captcha/";
        $file_name = basename($_FILES["captcha-file"]["name"]);
        $target_file = $upload_dir . $file_name;

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Vérifie si le fichier est une véritable image
        $check = getimagesize($_FILES["captcha-file"]["tmp_name"]);
        if($check !== false) {
            // Vérifie si le fichier existe déjà
            if (!file_exists($target_file)) {
                // Autorise certains formats de fichiers
                if($imageFileType == "jpg"  $imageFileType == "png"  $imageFileType == "jpeg" || $imageFileType == "gif" ) {
                    // Déplace le fichier de son emplacement temporaire vers le répertoire de destination
                    if (move_uploaded_file($_FILES["captcha-file"]["tmp_name"], $target_file)) {
                        echo "Le fichier ". $file_name. " a été uploadé.";
                    } else {
                        echo "Désolé, une erreur s'est produite lors de l'upload de votre fichier.";
                    }
                } else {
                    echo "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
                }
            } else {
                echo "Désolé, le fichier existe déjà.";
            }
        } else {
            echo "Le fichier n'est pas une image.";
        }
    }
?>





<script>
    document.getElementById('captcha-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const fileInput = document.getElementById('captcha-file');
    const formData = new FormData();
    formData.append('captcha-file', fileInput.files[0]);

    fetch('upload-captcha.php', {
        method: 'POST',
        body: formData
    }).then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        location.reload();
    }).catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });
});

</script>