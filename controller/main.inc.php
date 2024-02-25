<main >

<div id="scroll" class="button-scroll">
    <a href="#new-account"> 
        <img class="button-img" src="./asset/arrow.png" alt="icon-arrow" loading="lazy" itemprop="image">
    </a>
</div>

<section id="new-account">
    <h2>
        Une boîte de réception<br>
        entièrement repensée
    </h2>
    <p>
        Avec les nouveaux onglets personnalisables, repérez<br>
        Immédiatement les nouveaux messages et choisissez <br>
        ceux vous souhaitez lire en priorité.
    </p>
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
    <div class="inner-form" role="form">
        <fieldset>
            <legend><h2>Créer un compte</h2></legend>
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"> 
                <label for="nom">Nom *</label>
                <input type="text" id="nom" name="nom" placeholder="Nom" aria-required="true"  autofocus>

                <label for="prenom">Prénom *</label>
                <input type="text" id="prenom" name="prenom" placeholder="Prénom" aria-required="true">

                <label for="mail">Mail *</label>
                <input type="email" id="mail" name="mail" placeholder="Veuillez entre votre mail" aria-required="true">
    
                <label for="password">Choisissez votre mot de passe *</label>
                <input type="password" id="password" name="password" placeholder="Veuillez entrez votre mot de passe" aria-required="true">

                <div class="button-account">
                    <button type="submit" value="Envoyer" aria-label="cliquez pour envoyer" itemprop="button">Valider votre compte</button>
                </div>
                
            </form>
        </fieldset>
    </div>
</section>
</main>

