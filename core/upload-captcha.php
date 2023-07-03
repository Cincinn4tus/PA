<?php
    session_start();
    require "/conf.inc.php";
    require "/core/functions.php";

    if (isset($_FILES['captcha-file'])) {
        $file = $_FILES['captcha-file'];
        move_uploaded_file($file['tmp_name'], "/assets/img/captcha/" . $file['name']);
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