<?php

if(isset($_POST['raison']) && empty($_POST['raison'])) {
    $to = "cdtprestige@gmail.com";
    $subject = "Un utilisateur de entraxe-jante-alu.com souhaite vous contacter par mail.";
    $message = "Nom / Prénom : ".$_POST['name'] ."
    Adresse mail : ".$_POST['email']."
    Téléphone : ".$_POST['telephone']."
    Sujet : ".$_POST['sujet']."
    Contenu du mail : ".$_POST['message']."
    Cet utilisateur a souhaité vous contacter. La verification anti-spam a prouvé que ce n'est pas un robot.
    NE PAS REPONDRE A CE MAIL.";

    $headers = "MIME-Version: 1.0";
    $headers.= "From : entraxe-jante-alu.com";
    $headers.= "Reply-to : ".$_POST['email'];
    $headers.= "Content-Type: text/plain; charset=\"iso-8859-1\"";

    if(mail($to, $subject, $message, $headers)) {
        echo '<p>Votre message a bien été envoyé !</p>';
        header ("Refresh: 0.5;URL=/index.php");
    }
} else {
    exit;
}

