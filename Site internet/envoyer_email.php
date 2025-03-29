<?php
// Vérification de la méthode d'envoi du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $message = $_POST['message'];
    $rating = $_POST['rating'];

    // Validation des données
    if (empty($nom) || empty($message) || empty($rating)) {
        echo "Tous les champs sont obligatoires.";
        exit;
    }

    // Paramètres de l'email
    $to = "simioncimpoies@gmail.com";  // Remplace par ton adresse email
    $subject = "Nouveau témoignage de $nom";
    $body = "Nom : $nom\nNote : $rating étoiles\nTémoignage :\n$message";
    $headers = "From: no-reply@votre-site.com" . "\r\n" .
               "Reply-To: no-reply@votre-site.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envoi de l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "Merci pour votre témoignage ! Votre avis a été envoyé.";
    } else {
        echo "Une erreur est survenue, veuillez réessayer.";
    }
}
?>
