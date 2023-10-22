<?php
session_start();
//session_unset();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E- E-Taxibokko</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <div class="container-fluid">
        <div id="div1">
            <h1>Incription</h1>
            <span>c'est sure, c'est cool</span><br><img src="../image/téléchargement.jpg" width="500px">
        </div>
        <div id="div2">
            <form action="inscription_controlleur_v1.php" method="POST">
                <h2>S'inscrire</h2>
                <span class="sous-titre">c'est rapide et facile</span>
                <hr />
                <input type="text" placeholder="Prénom" name="prenom" />
                <input type="text" placeholder="Nom de famille" name="nom" />
                <p style="color:red;font-size:15px; margin: 10px 0"><?= isset($_SESSION['erreur_str']) ? $_SESSION['erreur_str'] : '' ?></p>
                <section class="section1">
                    <input type="text" placeholder=" votre adresse mail ici " name="email" />
                    <p style="color:red;font-size:15px; margin: 10px 0"><?= isset($_SESSION['erreur_email']) ? $_SESSION['erreur_email'] : '' ?></p>

                    <div class="numero_tel">
                        <div class="code_pays"><img src="../image/drapeau senegal signification.jpg" width="20px"> +221</div>
                        <input type="tel" placeholder="Numéro de telephone" name="telephone" />
                    </div>
                    <p style="color:red;font-size:15px; margin: 10px 0"><?= isset($_SESSION['erreur_telephone']) ? $_SESSION['erreur_telephone'] : '' ?></p>

                    <input type="password" placeholder="Nouveau mot de passe" name="password" />
                    <p style="color:red;font-size:15px; margin: 10px 0"><?= isset($_SESSION['erreur_password']) ? $_SESSION['erreur_password'] : '' ?></p>

                </section>
                <!-- <section class="section2">
              <p>Date de naissance <img src="question.png" alt="question" class="ask" ></p>
              <select name="" id="">
                <option value="">25</option>
                <option value="">24</option>
                <option value="">23</option>
                <option value="">22</option>
                <option value="">21</option>
                <option value="">20</option>
              </select>
              <select >
                <option value="">sep</option>
                <option value="">Aout</option>
                <option value="">Juillet</option>
                <option value="">Juin</option>
                <option value="">Mai</option>
              </select>
              <select >
                <option value="">2023</option>
                <option value="">2022</option>
                <option value="">2021</option>
                <option value="">2020</option>
                <option value="">2019</option>




              </select>
            </section>
           <section class="section3">
            <p>Genre <img src="question.png" alt="question" class="ask" ></p>
            <label for="">Femme <input type="radio" name="genre" id="" /> </label>
            <label for="">Homme <input type="radio" name="genre" id="" /> </label>
            <label for=""
              >Personnalisé <input type="radio" name="genre" id="" />
            </label>
           </section> -->

                <section class="section4">
                    <p>
                        Les personnes qui utilisent notre service ont pu importer vos
                        coordonnées sur E- E-Taxibokko.<a href="">En savoir plus.</a>
                    </p>
                    <p>
                        En cliquant sur s'inscrire, vous accceptez nos
                        <a href="">Conditions générales</a>, notre
                        <a href="">Politique de confidentialité</a> et notre
                        <a href="">Politique d'utilisation des cookies.</a> Vous recevez
                        peut-etre des notifications par texto de notre part et vous pouvez
                        à tout moment vous désabonner.
                    </p>
                </section>
                <section class="inscription">
                    <a class="compte" href="conform.php">j'ai déjà un compte</a>
                    <button type="submit" name="envoi_inscription"><a>S'inscrire</a></button>
                    <!-- <input type="submit" value="send" name="send">
 -->

                </section>
                <p style="color:red;font-size:15px; margin: 10px 0"><?= isset($_SESSION['erreur_moyen']) ? $_SESSION['erreur_moyen'] : '' ?></p>
                <p style="color:red;font-size:15px; margin: 10px 0"><?= isset($_SESSION['email_telephone']) ? $_SESSION['email_telephone'] : '' ?></p>

            </form>
        </div>
    </div>
    </div>
</body>

</html>

<?php

// if (isset($_SESSION['email_telephone']) && $_SESSION['email_telephone'] != '') {
//     echo $_SESSION['email_telephone'];
// }
// if (isset($_SESSION['erreur_moyen']) && $_SESSION['erreur_moyen'] != '') {
//     echo $_SESSION['erreur_moyen'];
// } elseif (isset($_SESSION['erreur_faible']) && $_SESSION['erreur_faible'] != '') {
//     echo $_SESSION['erreur_faible'];
// } elseif (isset($_SESSION['erreur_critique']) && $_SESSION['erreur_critique'] != '') {
//     echo $_SESSION['erreur_critique'];
// }
?>