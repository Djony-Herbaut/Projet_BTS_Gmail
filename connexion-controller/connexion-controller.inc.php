<?php
include_once __DIR__ . "/home.php";
session_start();

$serveur = "localhost";
$dbname = "FakeGmail";
$dbtable = "User";
$user = "root";
$pass = "";

try {
  // Connexion à la base de données
  $connexion = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = stripslashes($_POST["mail"]);
    $password = $_POST['password'];

    $requete_Verif = $connexion->prepare("SELECT prenom, password FROM $dbtable WHERE email = ?");
    $requete_Verif->bindParam(1, $mail);
    $requete_Verif->execute();

    $row = $requete_Verif->fetch(PDO::FETCH_ASSOC);
    $prenom = $row['prenom'];
    $hash = $row['password'];

    if ($requete_Verif->rowCount() > 0 && password_verify($password, $hash)) {
        $_SESSION['prenom'] = $prenom;

      // **Ajout du message de bienvenue dans une section**
        echo '<h2>Bienvenue ' . $_SESSION['prenom'] . ' !</h2>';
        exit();
        
    } else {
      // L'utilisateur ou le mot de passe est incorrect
      print '<p class="error msg-alert"> Votre nom utilisateur ou le mot de passe est incorrect </p>';
    }
  } else {
    echo "Failed";
  }
} catch (PDOException $e) {
  // Gérer les exceptions PDO
  echo "Connection failed: " . $e->getMessage();
}

?>


