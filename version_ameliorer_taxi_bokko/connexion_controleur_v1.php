<?php
session_start();
include_once("function_v1.php");
//include_once("style.css");

// echo "<div class='.container-fluid'>";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['envoi_connexion']) && isset($_POST['email']) && isset($_POST['password'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $_SESSION['email_password'] = "les champs ne doivent pas etre vide";
            header("Location: conform.php");
            exit();
        }
        $email = verificationEmail($_POST['email']) ? $_POST['email'] : false;
        // header('Location: conform.php');
        // exit();
        if ($email != false) {
            global $connection;
            if ($connection) {
                $req = $connection->prepare("SELECT * FROM clients WHERE email= ?");
                $req->bindParam(1, $email, PDO::PARAM_STR);
                // echo "avant";
                // var_dump($req);
                // echo "apres";
                $req->execute();

                // echo 'apres exécution <br /><br />';

                // var_dump($req);

                $users = $req->fetch(PDO::FETCH_ASSOC);
                if ($users == false) {
                    $_SESSION['erreur_email_connexion'] = "adresse mail n'existe pas va t'inscrire d'abord";
                    header('Location: conform.php?');
                    exit();
                }
                // var_dump($users);
                $mot_de_passe = longpassword($_POST['password']) ? $_POST['password'] : false;
                if ($mot_de_passe == false) {
                    $_SESSION['erreur_password_connexion'] = " mot de passe incorrecte au moins 8 caractères";
                    header('Location: conform.php?');
                    exit();
                }
                // echo "<br /><br /><br /><br />";
                // var_dump($mot_de_passe);
                // die();

                if ($email == $users["email"] && $mot_de_passe == $users["password"]) {
                    $_SESSION['email_connexion'] = $users['nom'] . " " . $users["prenom"];
                    // echo $_SESSION['email_connexion'];
                    // die();
                    header('Location: page_acceuille_v1.php');
                    exit();
                } else {
                    $_SESSION['erreur_password_connexion'] = " ce mot de passe n'existe pas";

                    header('Location: conform.php');
                    exit();
                }
            }
        } else {
            $_SESSION['erreur_email_connexion'] = " Oups ! adresse email incorrecte Ex: exemple@gmail.com ";
            header('Location: conform.php');
            exit();
        }
    }
}
