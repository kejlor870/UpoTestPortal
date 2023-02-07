<?php 
    session_start();
    require_once "connect.php";

    if(!mysqli_connect_errno()) {
        $login = $_POST['login'];
        $pass = $_POST['password'];

        
        $sql = "SELECT * FROM nauczyciele WHERE login='$login' AND haslo='$pass'";
        $wynik = mysqli_query($baza, $sql);

        if(mysqli_num_rows($wynik)>0){
            $wiersz = mysqli_fetch_assoc($wynik);
            
            $_SESSION['id'] = $wiersz['id'];
            $_SESSION['imie'] = $wiersz['imie'];
            $_SESSION['nazwisko'] = $wiersz['nazwisko'];
            
            header('Location: Nauczyciel.php');

        }else{
            $sql = "SELECT * FROM uczniowie WHERE login='$login' AND haslo='$pass'";
            $wynik = mysqli_query($baza, $sql);

            if(mysqli_num_rows($wynik)>0){
                $_SESSION['id'] = $wiersz['id'];
                $_SESSION['imie'] = $wiersz['imie'];
                $_SESSION['nazwisko'] = $wiersz['nazwisko'];

                header('Location: uczen.php');
            
            }else{
                header('Location: logowanie.php');

            }

        }

    }

    

?>