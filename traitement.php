<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécuriser les données envoyées
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $objet = htmlspecialchars($_POST['objet']);
    $message = htmlspecialchars($_POST['message']);

    // Adresse où tu veux recevoir les mails
    $to = "ashleycodjia52@gmail.com";  

    // Sujet du mail
    $subject = "📩 Nouveau message depuis le site : " . $objet;

    // Corps du mail
    $body = "Vous avez reçu un nouveau message depuis le site web :\n\n";
    $body .= "👤 Nom : $nom\n";
    $body .= "📧 Email : $email\n";
    $body .= "📌 Objet : $objet\n\n";
    $body .= "💬 Message :\n$message\n";

    // Headers (expéditeur)
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoi du mail
    if (mail($to, $subject, $body, $headers)) {
        echo "<h2>✅ Merci $nom, votre message a bien été envoyé !</h2>";
    } else {
        echo "<h2>❌ Une erreur est survenue, veuillez réessayer.</h2>";
    }
} else {
    echo "⚠️ Accès non autorisé.";
}
?>
