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

<!-- Votre HTML reste le même -->

<?php
    $dir = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/captcha/";
    $files = scandir($dir);
    $files = array_diff(scandir($dir), array('.', '..'));
    // Reste du code ...
?>

<script type='text/javascript'>
    // Votre script JS reste le même
    function removeCaptcha(fileName) {
        let formData = new FormData();
        formData.append('file-name', fileName);

        fetch('/admin/delete-captcha.php', {
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
