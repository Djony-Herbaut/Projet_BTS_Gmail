<?php
include_once __DIR__."/controller/controller.inc.php";
?>

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
    <div class="inner-form" role="form">
        <fieldset>
            <legend><h2>Créer un compte</h2></legend>
            <form action="connexion.php" method="post"> <!-- mettre le nom du fichier html dans aciton -->
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
<?php
    include_once __DIR__."/connexion.php";
?>
