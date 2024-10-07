<!-- 
Milestone 1
// TODO Creare un form che invii in GET la lunghezza della password.
// TODO Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
// ! Scriviamo tutto (logica e layout) in un unico file index.php 
-->
<?php

function generatePassword($length)
{
    if (isset($length) && !empty($length) && $length >= 5 && $length <= 30 && is_numeric($length)) {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
        $characters_length = strlen($characters);
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[random_int(0, $characters_length - 1)];
            //var_dump("password=======", $password);
        }
        return $password;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Generator</title>
    <!-- Bootstrap 5 -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css'
        integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=='
        crossorigin='anonymous' />
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1 class="fw-semibold my-5">Strong Password Generator</h1>
            <p>Inserisci la lunghezza della password e genera una password sicura</p>
        </div>
        <div class="border border-secondary-subtle rounded-3 p-4">
            <span>Password Generata:</span>
            <span
                class="w-75 p-2 border border-secondary-subtle rounded-3"><?= isset($_GET["passwordLength"]) ? generatePassword($_GET["passwordLength"]) : "" ?></span>
        </div>
        <div class="card p-4">
            <form action="index.php" method="GET">
                <div class="mb-3">
                    <label class="form-label" for="password-length">Inserisci la lunghezza della password:</label>
                    <input class="form-control w-25" type="number" id="password-length" name="passwordLength" min="5"
                        max="30" value="<?= isset($_GET["passwordLength"]) ? $_GET["passwordLength"] : '' ?>">
                </div>
                <button class="btn btn-primary me-2" type="submit">Genera password</button>
                <button class="btn btn-secondary" type="reset">Annulla</button>
            </form>
        </div>
    </div>
</body>

</html>