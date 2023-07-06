<?php
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Récupération des valeurs :
$id = (isset($_POST['id']) && $_POST['id'] != "") ? intval($_POST['id']) : Null;
// le intval donne les entiers voir dans la structure de la base de donnee et dans le "type" 
$libelle = (isset($_POST['libelle']) && $_POST['libelle']!= "") ? $_POST['libelle'] : Null;
$quantite = (isset($_POST['quantite']) && $_POST['quantite'] != "") ? intval($_POST['quantite']) : Null;
$prix = (isset($_POST['prix']) && $_POST['prix'] != "") ? 0 + $_POST['prix'] : Null;
$nom_prenom = (isset($_POST['nom_prenom']) && $_POST['nom_prenom'] != "") ? $_POST['nom_prenom'] : Null;
$email = (isset($_POST['email']) && $_POST['email'] != "") ? $_POST['email'] : Null;
$telephone = (isset($_POST['telephone']) && $_POST['telephone'] != "") ? $_POST['telephone'] : Null;
$adresse = (isset($_POST['adresse']) && $_POST['adresse'] != "") ? $_POST['adresse'] : Null;

$message  = "Vous avez commandé: ";
$message .= $quantite . ' '; 
$message .= $libelle;



$mail = new PHPMailer(true);

// On va utiliser le SMTP
$mail->isSMTP();

// On configure l'adresse du serveur SMTP
$mail->Host       = 'localhost';

// On désactive l'authentification SMTP
$mail->SMTPAuth   = false;

// On configure le port SMTP (MailHog)
$mail->Port       = 1025;

// Expéditeur du mail - adresse mail + nom (facultatif)
$mail->setFrom('from@thedistrict.com', 'The District Company');

// Destinataire(s) - adresse et nom (facultatif)
$mail->addAddress("client1@example.com", "Mr Client1");
// $mail->addAddress("client2@example.com");

//Adresse de reply (facultatif)
$mail->addReplyTo("reply@thedistrict.com", "Reply");

//CC & BCC
$mail->addCC("cc@example.com");
// $mail->addBCC("bcc@example.com");

// On précise si l'on veut envoyer un email sous format HTML 
$mail->isHTML(true);

// On ajoute la/les pièce(s) jointe(s)
// $mail->addAttachment('/path/to/file.pdf');

// Sujet du mail
$mail->Subject = 'Test PHPMailer';

$mail->CharSet="utf-8";

// Corps du message
$mail->Body = $message;

// On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs
if ($mail) {
    try {
        $mail->send();
        echo 'Email envoyé avec succès';
    } catch (Exception $e) {
        echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
    }
}


// En cas d'erreur, on renvoie vers le formulaire
if (is_null($id) || is_null($libelle)|| is_null($quantite) || is_null($prix) || is_null($nom_prenom) || is_null($email)  || is_null($telephone)  || is_null($adresse)) {
    // if ($id == Null || $quantite == Null || $prix == Null || $nom_prenom == Null || $email == Null  || $telephone == Null  || $adresse == Null) {
    header("Location: ../commande.php?id=" . $id);
}

$etat = 'En attente';
// Si la vérification des données est ok :
include "../db.php";
$db = connexionBase();
$total = $quantite * $prix;
try {
    // Construction de la requête UPDATE sans injection SQL :
    $req = "INSERT INTO `commande`
 (`id_plat`, `quantite`, `total`, `date_commande`, `etat`,`nom_client`, `telephone_client`, `email_client`, `adresse_client`) 
     VALUES (:id_plat, :quantite, :prix, NOW(), :etat, :nom_prenom, :telephone, :email, :adresse)";
    //  var_dump($req);
    $requete = $db->prepare($req);
   


    // Association des valeurs aux paramètres via bindValue() 
    $requete->bindValue(":id_plat", $id, PDO::PARAM_INT);
    $requete->bindValue(":quantite", $quantite, PDO::PARAM_INT);
    $requete->bindValue(":prix", $total, PDO::PARAM_STR);
    $requete->bindValue(":etat", $etat, PDO::PARAM_STR);
    $requete->bindValue(":nom_prenom", $nom_prenom, PDO::PARAM_STR);
    $requete->bindValue(":email", $email, PDO::PARAM_STR);
    $requete->bindValue(":telephone", $telephone, PDO::PARAM_STR);
    $requete->bindValue(":adresse", $adresse, PDO::PARAM_STR);
    
    $requete->execute();
  
    $requete->closeCursor();
   


} catch (Exception $e) {
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script/script_commande.php)");
}

// Si OK: redirection 
header("Location: /index.php");
exit;
?>
