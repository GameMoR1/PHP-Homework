<?php

ob_start();

include('../html/polzovateli.html');
require_once('../php/storage.php');

echo $storage['polzovateli'];

if (isset($_GET['pass'])) 
{
    $kolvo = (int)$_GET['kolvopol'];

    for($help = 0; $help < $kolvo; $help++)
    {
        $loginOUT = $storage['users']['login'][$help];
        $passwordOUT = $storage['users']['passw'][$help];

        echo "<div>
        <p style='color: black; font-family: Arial, Helvetica, sans-serif; font-size: large;'>Логин: $loginOUT <br>Пароль: $passwordOUT</p>
        </div>";

    }

}

ob_end_flush();