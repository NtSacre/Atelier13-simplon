<?php
session_start();
include_once("function_v1.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo 'il arrie apre post';
    // die();
    if (isset($_POST['envoi_inscription']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['password'])) {

        if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['telephone'])) {
            $_SESSION['erreur_moyen'] = " Attention : les champs ne doivent pas etre vide";
            header('Location: inscription_v1.php');
            exit();
        } elseif (!checkstr($_POST['nom']) || !checkstr($_POST['prenom'])) {
            $_SESSION['erreur_str'] = "Attention : le nom et le prenom ont un probleme";
            // echo "il arrive au nom et prenom";
            // die();
            header('Location: inscription_v1.php');
            exit();
        } elseif (!verificationEmail($_POST['email'])) {
            $_SESSION['erreur_email'] = " Attention : ton adresse email n'est pas correcte";
            // echo "il arrive à email";
            // die();
            header('Location: inscription_v1.php');
            exit();
        } elseif (!checkphone($_POST['telephone'])) {
            $_SESSION['erreur_telephone'] = " Hum toi aussi ton numéro de telephone n'est pas correcte, utilise un code Sénégalais 77 ou 78 ou 70 ou 76 ";
            // echo "il arrive au telephone";
            // die();
            header('Location: inscription_v1.php');
            exit();
        } elseif (!longpassword($_POST['password'])) {
            $_SESSION['erreur_password'] = " Petit mot de passe là, tu vas l'enregistrer où ! ça doit au moins 8 caractère vraiment c'est pas possible ";
            //echo strlen($_POST['password']);

            header('Location: inscription_v1.php');
            exit();
        } else {


            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $telephone = $_POST["telephone"];
            $date = date("Y-m-d");
            if (chechEmailAndTel($email, $telephone)) {
                $_SESSION['email_telephone'] = "alert('l\'email ou le numéro de telephone existe déjà)";
                header('Location: inscription_v1.php');
                exit();
            }
            // global $connection;
            if ($connection) {

                try {
                    $req = $connection->prepare("INSERT INTO clients(nom,prenom,email,password,telephone,date) VALUES(?,?,?,?,?,?)");
                    $req->bindParam(1, $nom, PDO::PARAM_STR);
                    $req->bindParam(2, $prenom, PDO::PARAM_STR);
                    $req->bindParam(3, $email, PDO::PARAM_STR);
                    $req->bindParam(4, $password, PDO::PARAM_STR);
                    $req->bindParam(5, $telephone, PDO::PARAM_STR);
                    $req->bindParam(6, $date, PDO::PARAM_STR);

                    $req->execute();
                    $req->closeCursor();
                    $_SESSION['nom_prenom'] = " $nom $prenom";
                    header('location: page_acceuille_v1.php');
                    exit();
                } catch (PDOException $th) {
                    echo "Error : il y'a eu une erreur " . $th->getMessage();
                }
            } else {
                echo "la connexion n'est pas passé";
            }
        }
    } else {
        $_SESSION['erreur_faible'] = "<script> alert(' Oups ! le formulaire n\'a pas été envoyés.essayez de nouveau') </scrip>";
        echo $_SESSION['erreur_faible'];
        die();
        // header('Location: inscription_v1.php');
        // exit();
    }
}
// } else {
//     $_SESSION['erreur_critique'] = "<script> alert('c\'est pas aujourd\'hui que tu vas me pirater, va apprendre encore Petit Maudia') </scrip>";
//     header('Location: inscription_v1.php');
//     exit();
// }
