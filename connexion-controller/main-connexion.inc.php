<main>
        <div id="scroll" class="button-scroll">
            <a href="#"> 
                <img class="button-img" src="./asset/arrow.png" alt="icon-arrow" loading="lazy" itemprop="image">
            </a>
        </div>

        <section id="connexion">
            <h2>
                <?php 
                    include_once "connexion-controller/connexion-controller.inc.php"
                ?>
            </h2>

            <div class="inner-form" role="form">
                <fieldset>
                    <legend><h2>Connectez-vous à votre compte</h2></legend>
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"> <!-- mettre le nom du fichier html dans aciton -->
    
                        <label for="mail">Mail *</label>
                        <input type="email" id="mail" name="mail" placeholder="Veuillez entre votre mail" aria-required="true">
            
                        <label for="password">Choisissez votre mot de passe *</label>
                        <input type="password" id="password" name="password" placeholder="Veuillez entrez votre mot de passe" aria-required="true">

                        <div class="button-account">
                            <button type="submit" value="Envoyer" aria-label="cliquez pour envoyer" itemprop="button">Connexion à votre compte</button>
                        </div>
                        
                    </form>
                </fieldset>
            </div>

        </section>
    </main>
</body>