<?php
session_start();
// if (!isset($_SESSION['nom_prenom'])) {
//     header('location:inscription_v1.php');
//     exit();
// }
//session_unset();
if (include_once("connexion_v1.php")) {
    $recup = $connection->prepare("SELECT * FROM clients ");

    $recup->execute();
    $tabEmailPhone = $recup->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($tabEmailPhone);
    // die();

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'acceuille</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital@1&display=swap');

        * {
            padding: 0;
            margin: 0;
            font-family: 'Be Vietnam Pro', sans-serif;
            background-color: #f0f2f5;
            box-sizing: border-box;
        }

        h1,
        h2 {
            text-align: center;
        }

        th,
        td {
            padding: 10px;
        }

        table {
            margin: 20px auto;
        }

        .main {
            margin: 25px auto;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="main">
        <?= isset($_SESSION['nom_prenom']) ? "<h1> Bienvenue mon chèr(e) " .  $_SESSION['nom_prenom'] . "</h1>" : "" ?>
        <?= isset($_SESSION['email_connexion']) ? "<h1> Bon retour parmi nous mon chèr(e) " .  $_SESSION['email_connexion'] . "</h1>" : "" ?>


        <h2>Voici la liste des inscrits</h2>
        <?php if ($tabEmailPhone) : ?>
            <table border="1">
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse mail</th>
                <th>telephone</th>



                <?php foreach ($tabEmailPhone as $client) : ?>
                    <tr>
                        <td><?= $client['nom'] ?></td>
                        <td><?= $client['prenom'] ?></td>
                        <td><?= $client['email'] ?></td>
                        <td><?= $client['telephone'] ?></td>



                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </table>
    </div>
</body>

</html>