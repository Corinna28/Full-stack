<?php
session_start();

// on importe le contenu du fichier "db.php"
include('../dao.php');

require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



$nom = (isset($_POST['nom']) && $_POST['nom'] != "") ? $_POST['nom'] : Null;
$prenom = (isset($_POST['prenom']) && $_POST['prenom'] != "") ? $_POST['prenom'] : Null;
$email = (isset($_POST['email']) && $_POST['email'] != "") ? $_POST['email'] : Null;
$telephone = (isset($_POST['telephone']) && $_POST['telephone'] != "") ? $_POST['telephone'] : Null;
$question = (isset($_POST['question']) && $_POST['question'] != "") ? $_POST['question'] : Null;


$message = "Détails du message reçu : Nom utilisateur : " .$nom . " Prénom : " .$prenom . " Adresse Mail : " .$email . " Numéro de téléphone : " . $telephone . " Corps de message : ". $question . ".";  



$mail = new PHPMailer(true);

// On va utiliser le SMTP
$mail->isSMTP();

// On configure l'adresse du serveur SMTP
$mail->Host       = 'localhost';

// On désactive l'authentification SMTP
$mail->SMTPAuth   = false;

// On configure le port SMTP (MailHog)
$mail->Port       = 1025;


// le dollars mail fait reférence au mail du client qui expédie le mail ..................
// ..........................................


// Expéditeur du mail - adresse mail + nom (facultatif)
$mail->setFrom($email);

// Destinataire(s) - adresse et nom (facultatif)
$mail->addAddress('from@thedistrict.com', 'The District Company');
// $mail->addAddress("client2@example.com");

//Adresse de reply (facultatif)
// $mail->addReplyTo("reply@thedistrict.com", "Reply");

//CC & BCC
// $mail->addCC("cc@example.com");
// $mail->addBCC("bcc@example.com");

// On précise si l'on veut envoyer un email sous format HTML 
$mail->isHTML(true);

// On ajoute la/les pièce(s) jointe(s)
// $mail->addAttachment('/path/to/file.pdf');

// Sujet du mail
$mail->Subject = 'Nouvelle demande de contact';

$mail->CharSet="utf-8";

// Corps du message
$mail->Body = $message;

// On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs
if ($mail) {
    try {
        $mail->send();
        // echo 'Email envoyé avec succès';
        header("Location: ../index.php");
    } catch (Exception $e) {
        echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
    }
}


// En cas d'erreur, on renvoie vers le formulaire
if (is_null($nom) || is_null($prenom)|| is_null($email)  || is_null($telephone)  || is_null($question)) {
        header("Location: ../contact.php");
}

// Si la vérification des données est ok :
$db = connexionBase();

try {
   
    // Association des valeurs aux paramètres via bindValue() 
    
    $requete->bindValue(":nom", $nom, PDO::PARAM_STR);
    $requete->bindValue(":prenom", $prenom, PDO::PARAM_STR);
    $requete->bindValue(":email", $email, PDO::PARAM_STR);
    $requete->bindValue(":telephone", $telephone, PDO::PARAM_STR);
    $requete->bindValue(":question", $question, PDO::PARAM_STR);
    
    $requete->execute();
  
    $requete->closeCursor();
   


} catch (Exception $e) {
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script/script_contact.php)");
    
}
