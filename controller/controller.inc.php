<?php

include_once __DIR__."/connexion.php";
$serveur = "localhost"; $dbname = "FakeGmail"; $dbtable = "User"; $user = "root"; $pass = "";

$prenom = valid_donnees($_POST["prenom"]);
$nom = valid_donnees($_POST["nom"]);
$mail = valid_donnees($_POST["mail"]);
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);


function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}
session_start();

echo "<li><h2>Voici vos informations :</h2></li>
<li><strong>Nom :</strong> $nom</li>
<li><strong>Prénom :</strong> $prenom</li>
<li><strong>Âge :</strong> $mail</li>";

if (!empty($prenom)
    && strlen($prenom) <= 20
    && strlen($nom) <= 20
    && preg_match("/^[A-Za-z '-]+$/",$prenom)
    && preg_match("/^[A-Za-z '-]+$/",$nom)
    && !empty($mail)
    && filter_var($mail, FILTER_VALIDATE_EMAIL)){


    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($dbco){
            // on créer la requête
            $requete = "CREATE TABLE IF NOT EXISTS $dbname.$dbtable (
                        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
                        nom VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                        prenom VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                        email VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                        password VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
                        ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
        
            // on prépare et on exécute la requête
            $dbco->prepare($requete)->execute();
        }

        //On insère les données reçues

        $sth = $dbco->prepare("
            INSERT INTO User(nom, prenom, mail, password)
            VALUES(:nom, :prenom, :mail, :password)");
        $sth->bindParam(':nom',$nom);
        $sth->bindParam(':prenom',$prenom);
        $sth->bindParam(':mail',$mail);
        $sth->bindParam(':password',$password);
        $sth->execute();

        if (header("Location: connexion.php")) {
            die("Redirection vers connexion.php effectuée avec succès.");
        } else {
            die("Erreur lors de la redirection vers connexion.php.");
        }

    }
    catch(PDOException $e){
        echo 'Erreur : '.$e->getMessage();
    }
}else{
    header("Location:index.php");
}
?>
