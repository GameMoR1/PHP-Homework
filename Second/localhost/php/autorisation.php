<?php
if (isset($_GET['login']) || isset($_GET['passw'])) 
{
    require_once('storage.php');

    $login = "$_GET[login]";
    $password = "$_GET[passw]";
    
    function checkFull($login, $password) : bool
    {
        if ($login != "" && $password != "")
        {
            return true;
        }
        return false;
    }
    
    function checkGate(array $storage, $login, $password) : string
    {
        $forHelp = 0;
        foreach ($storage['users']['login'] as $username) {
            if($username == $login)
            {
                if($storage['users']['passw'][$forHelp] == $password)
                {
                    header("Location: ../php/information.php");
                    exit;
                }
            }
            $forHelp++;
        }
        return "Авторизация провалена!";
    }
    
    if(checkFull($login, $password))
    {
        $otvet = checkGate($storage, $login, $password);
    
        // echo "$otvet";
        echo "    <div style='border: 1px solid #ccc; border-radius: 20px; background-color: cornflowerblue; padding: 10px; height: max-content; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'>
        <p style='color: black; font-family: Arial, Helvetica, sans-serif; font-size: large;'>$otvet</p>
    </div>";

    }
    else
    {
        $message = "Оба поля 'login' и 'password' должны быть заполнены!";
        echo "    <div style='border: 1px solid #ccc; border-radius: 20px; background-color: cornflowerblue; padding: 10px; height: max-content; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'>
        <p style='color: black; font-family: Arial, Helvetica, sans-serif; font-size: large;'>$message</p>
    </div>";
    }
}