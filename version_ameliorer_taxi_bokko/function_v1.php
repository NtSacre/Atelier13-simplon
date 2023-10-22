<?php
include_once("connexion_v1.php");

function verificationEmail($email)
{
    $expressionReguliere = '/^(([^<>()\[\]\.,;:\s@"]+(\.[^<>()\[\]\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';

    return preg_match($expressionReguliere, $email);
}
//echo verificationEmail("a@a%.com");

function checkstr($str)
{
    $regex = '/^[a-zA-Z\sà-ÿÀ-Ÿ\'-]*$/u';
    return  preg_match($regex, $str);
}
//echo checkstr();
function checkphone($tel)
{
    // if (is_numeric($tel) && strlen($tel)) {
    $reg = '/^7([0]|[8]|[6]|[7])+[0-9]{7}$/';
    return  preg_match($reg, $tel);
    // } else {
    //     return "le numero doit etre de ce format 771115869";
    // }
}
function longpassword($password)
{
    return strlen($password) >= 8 ? true : false;
}

function chechEmailAndTel($email, $tel)
{
    global $connection;

    if ($connection) {
        $recup = $connection->prepare("SELECT * FROM clients ");

        $recup->execute();
        $tabEmailPhone = $recup->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($tabEmailPhone);
        // die();
        $bol = false;
        foreach ($tabEmailPhone as $tableau) {
            if ($tableau['email'] == $email) {
                $bol = true;
                //echo "Email trouvée ";
                break;
            } elseif ($tableau['telephone'] == $tel) {
                $bol = true;
                //echo "telephone trouvée ";
                break;
            }
        }
        return $bol;
    }
}
//echo "ça marche passe ici";
//echo chechEmailAndTel("email", "776148845");
