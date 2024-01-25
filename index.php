<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Gmail Login Page">

    <meta property="og:title" content="Gmail">
    <meta property="og:type" content="website">
    <meta property="og:domain" content="">
    <meta property="og:url" content="">
    <meta property="og:description" content="Gmail Login page">
    <meta property="og:image" content="">

    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">

    <link rel="stylesheet" href="./css/themes.css">
    <title>Gmail</title>
    
</head>
<body itemscope itemtype="https://schema.org/website">
    <header>
        <nav class="navbar" aria-label="principal menu">
            <section class="icon">
                <h2>
                    <img src="./favicon/favicon-32x32.png" alt="icon-navbar" loading="lazy" itemprop="image">
                    Gmail
                </h2>
            </section>

            <ul itemprop="genre">
                <li><a href="#welcome-picture" itemprop="url">Pour les pros</a></li>
                <li><a href="connexion.html" itemprop="url">Connexion</a></li>
                <li class="first-new-account-button"><a href="#new-account" itemprop="url">Créer Un Compte</a></li>
            </ul>                
        
        </nav> 
    </header>

    <div id="welcome-picture" class="welcome-picture" >
        <p>Retrouvez la fluidité et la <br> simplicité de Gmail sur <br> tous vos appareils </p>
        <a class="second-new-account-button" href="#new-account" itemprop="url">
            Créer un compte
        </a>
    </div>
    
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
                    <form action="./connexion.html" method="post"> <!-- mettre le nom du fichier html dans aciton -->
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
</body>
