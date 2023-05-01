<?php

// écrire un mail à l'adresse suivante : a.goumane@yahoo.com

$to = "a.goumane@yahoo.com";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";


?>