<?php

ob_start();

include('../html/information.html');
require_once('../php/storage.php');

    foreach($_SERVER as $info)
    {
        if (!empty($info)) 
        {
            echo "<div style='border: 1px solid #ccc; border-radius: 20px; background-color: green; padding: 10px; height: max-content;'>
            <p style='color: black; font-family: Arial, Helvetica, sans-serif; font-size: large;'>$info</p>
            </div>";
        }
    }

    if (isset($_GET['pass'])) 
    {
        $kolvo = (int)$_GET['kolvopol'];
        $storage['polzovateli'] = $kolvo;

        // echo "Кнопка нажата!";

        header("Location: ../php/polzovateli.php");
        exit;
    }

ob_end_flush();