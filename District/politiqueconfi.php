<?php
session_start();

// on importe le contenu du fichier "db.php"
include('dao.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();


// requetes lancer via le dao

include_once "Template/header.php";
include_once "Template/nav.php";
?>




<!-- Image promotion -->
<img class="promos" src="assets/images/bg2-modified.png" alt="district" title="district" width="1800" height="300" />
<div class="container-fluid container-confi">
    <p class="h1">Politique de confidentialité</p>

    <h3>A. Collecte de l’information</h3>

    <P>Nous recueillons des informations lorsque vous vous inscrivez sur notre site, lorsque vous vous connectez à votre compte, faites un achat, participez à un concours, et / ou lorsque vous vous déconnectez. Les informations recueillies incluent votre nom, votre adresse e-mail, numéro de téléphone, et / ou carte de crédit.</P>

    <P>En outre, nous recevons et enregistrons automatiquement des informations à partir de votre ordinateur et navigateur, y compris votre adresse IP, vos logiciels et votre matériel, et la page que vous demandez.</P>

    <h3>B.Utilisation des informations</h3>

    <P>Toutes les informations que nous recueillons auprès de vous peuvent être utilisées pour :</P>

    <P> - Personnaliser votre expérience et répondre à vos besoins individuels</P>
    <p> - Fournir un contenu publicitaire personnalisé </P>
    <p> - Améliorer notre site</P>
    <p> - Améliorer le service client et vos besoins de prise en charge</P>
    <p> - Vous contacter par e-mail</P>
    <p> - Administrer un concours, une promotion, ou une enquête.</P>

    <h3>C. Confidentialité du commerce en ligne</h3>

    <P>Nous sommes les seuls propriétaires des informations recueillies sur ce site. Vos informations personnelles ne seront pas vendues, échangées, transférées, ou données à une autre société pour n’importe quelle raison, sans votre consentement, en dehors de ce qui est nécessaire pour répondre à une demande et / ou une transaction, comme par exemple pour expédier une commande.</P>

    <h3>D. Divulgation à des tiers</h3>

    <P>Nous ne vendons, n’échangeons et ne transférons pas vos informations personnelles identifiables à des tiers. Cela ne comprend pas les tierce parties de confiance qui nous aident à exploiter notre site Web ou à mener nos affaires, tant que ces parties conviennent de garder ces informations confidentielles.

        Nous pensons qu’il est nécessaire de partager des informations afin d’enquêter, de prévenir ou de prendre des mesures concernant des activités illégales, fraudes présumées, situations impliquant des menaces potentielles à la sécurité physique de toute personne, violations de nos conditions d’utilisation, ou quand la loi nous y contraint.

        Les informations non-privées, cependant, peuvent être fournies à d’autres parties pour le marketing, la publicité, ou d’autres utilisations.</P>

    <h3>E. Protection des informations</h3>
    <P>Nous mettons en œuvre une variété de mesures de sécurité pour préserver la sécurité de vos informations personnelles. Nous utilisons un cryptage à la pointe de la technologie pour protéger les informations sensibles transmises en ligne. Nous protégeons également vos informations hors ligne. Seuls les employés qui ont besoin d’effectuer un travail spécifique (par exemple, la facturation ou le service à la clientèle) ont accès aux informations personnelles identifiables. Les ordinateurs et serveurs utilisés pour stocker des informations personnelles identifiables sont conservés dans un environnement sécurisé.</P>

    <h3>F. Se désabonner</h3>

    <P>Nous utilisons l’adresse e-mail que vous fournissez pour vous envoyer des informations et mises à jour relatives à votre commande, des nouvelles de l’entreprise de façon occasionnelle, des informations sur des produits liés, etc. Si à n’importe quel moment vous souhaitez vous désinscrire et ne plus recevoir d’e-mails, des instructions de désabonnement détaillées sont incluses en bas de chaque e-mail.</P>

    <h3>G. Consentement</h3>

    <P>En utilisant notre site, vous consentez à notre politique de confidentialité.</P>

    <h3>H. Quels sont vos droits ?</h3>

    <P>Vous disposez de différents droits, que vous pouvez exercer à tout moment. Vous pouvez ainsi :

        accéder à vos données personnelles (droit d’accès),

        demander la correction, la mise à jour ou la modification des données vous concernant qui ne sont plus exactes ou complètes (droit de rectification),

        demander la limitation ou la suppression de vos données personnelles, notamment si vous croyez que leur traitement n’est pas justifié ou n’est pas légal ou dans les autres cas prévus par la loi (droit de limitation et de suppression),

        retirer votre consentement au traitement de vos données personnelles, dans le cas où vous avez donné un tel consentement (droit de retrait du consentement),

        vous opposer à la continuation d’un traitement (droit d’opposition),

        demander la portabilité de vos données personnelles à savoir, la restitution de vos données personnelles sous un format électronique aux fins de les utiliser vous-même ou de les transmettre à un autre organisme, dans les cas permis par la loi (droit à la portabilité),

        définir des directives relatives au sort de vos données personnelles après votre décès (conformément à l’art. 40-1 de la Loi Informatique et Libertés).

        Si vous considérez que le traitement de vos données personnelles ne respecte pas vos droits, vous pouvez adresser une réclamation auprès de la CNIL, autorité de contrôle dont la mission est de veiller en France au respect de la réglementation applicable aux traitements de données à caractère personnel : www.cnil.fr </P>

</div>
<?php
include_once "./Template/footer.php";
?>