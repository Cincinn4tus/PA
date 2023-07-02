<?php 
    session_start();
    $pageTitle = "Captchas";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
    if(!isConnected() || $user['scope'] != 0){
        header("Location: /errors/403.php");
        }


        ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <h2 class="text-center">Liste des images</h2>
        </div>
    </div>


    <!-- button to add a new captcha -->
    <div class="row mb-5 text-center">
        <form id="captcha-form" enctype="multipart/form-data">
            <input type="file" id="captcha-file" name="captcha-file">
            <button type="submit" class="btn btn-primary">Ajouter une image</button>
        </form>

    </div>

    <?php
    // for each image in /assets/img/captcha folder, display it (3 images per row for large screens, 2 for medium screens, 1 for small screens)
    // in each image, display a remove button that will delete the image from the folder
    $dir = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/captcha/";
    $files = scandir($dir);
    $files = array_diff(scandir($dir), array('.', '..'));
    $i = 0;
    foreach ($files as $file) {
        if ($i == 0) {
            echo "<div class='row'>";
        }
        echo "<div class='col-lg-4 col-md-6 col-sm-12'>";
        echo "<img src='/assets/img/captcha/$file' class='img-fluid' width='400px' height='400px'>";
        echo "<button class='btn btn-danger mt-2' onclick='removeCaptcha(\"$file\")'>Supprimer</button>";
        echo "</div>";
        $i++;
        if ($i == 3) {
            echo "</div>";
            $i = 0;
        }
    }
    ?>
</div>
<script type='text/javascript'>
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

function removeCaptcha(fileName) {
    const formData = new FormData();
    formData.append('file-name', fileName);

    fetch('delete-captcha.php', {
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
}

</script>


<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/templates/footer.php";
    page_load_time();
    ?>
