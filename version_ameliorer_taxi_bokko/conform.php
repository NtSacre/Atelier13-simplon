<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion | Page</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="flex-container">
        <div id="div1">
            <h1>E-Taxibokko</h1>
            <span>Avec E-Taxibokko,partagez vos course en toute sécurité</span><br /><img src="../image/istockphoto-1159586745-612x612.jpg" alt="" width="500px" />
        </div>

        <div id="div2">
            <form action="connexion_controleur_v1.php" method="post">
                <div class="form_head">
                    <h1>Connexion</h1>
                    <p>Votre chauffeur en un clic !</p>
                </div>
                <div class="Facebook">
                    <a href="http://" target="_blank" rel="noopener noreferrer">Continuer avec Facebook</a>
                </div>
                <div class="line_du_milieu">
                    <div class="line_gauche"></div>
                    <span class="ou">OU</span>
                    <div class="line_droite"></div>
                </div>
                <input type="email" placeholder=" votre adresse e-mail ici" name="email" />
                <p style="color:red;font-size:15px; margin: 10px 0"><?= isset($_SESSION['erreur_email_connexion']) ? $_SESSION['erreur_email_connexion'] : "" ?></p>
                <input type="password" placeholder="Mot de passe" name="password" />
                <p style="color:red;font-size:15px; margin: 10px 0"><?= isset($_SESSION['erreur_password_connexion']) ? $_SESSION['erreur_password_connexion'] : '' ?></p>

                <div class=" form_foot">
                    <a class="creer_compte" href="inscription_v1.php" class="lien">creer un compte</a>
                    <input type="submit" value="Se connecter" name="envoi_connexion" />
                </div>
                <p style="color:red;font-size:15px; margin: 10px 0"><?= isset($_SESSION['email_password']) ? $_SESSION['email_password'] : "" ?></p>

            </form>
        </div>
    </div>
</body>

</html>