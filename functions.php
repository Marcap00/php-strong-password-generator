<?php

function generatePassword($length)
{
    // Controllo se la variabile è settata e non vuota, se è compresa tra 5 e 30 e se è un numero
    if (isset($length) && !empty($length) && $length >= 5 && $length <= 30 && is_numeric($length)) {
        // Caratteri per generare la password
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
        // Lunghezza dei caratteri
        $characters_length = strlen($characters);
        // Variabile per la password
        $password = '';
        // Genero la password con un ciclo che itera per la lunghezza stabilita dall'utente
        for ($i = 0; $i < $length; $i++) {
            // Aggiungo a password un carattere casuale di characters
            $password .= $characters[random_int(0, $characters_length - 1)];
            //var_dump("password=======", $password);
        }
        // Ritorno la password montata
        return $password;
    }
}
