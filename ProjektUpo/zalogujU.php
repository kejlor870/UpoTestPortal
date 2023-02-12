<?php 
    session_start();
    require_once "connect.php";

    if(!mysqli_connect_errno()) {
        $login = $_POST['login'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM uczniowie WHERE login='$login' AND haslo='$pass'";
        $wynik = mysqli_query($baza, $sql);

        if(mysqli_num_rows($wynik)>0){
            $wiersz = mysqli_fetch_assoc($wynik);

            $_SESSION['id'] = $wiersz['id'];
            $_SESSION['imie'] = $wiersz['imie'];
            $_SESSION['nazwisko'] = $wiersz['nazwisko'];
            $_SESSION['id_klasy'] = $wiersz['id_klasy'];

            // echo $_SESSION['id'] . "<br>";
            // echo $_SESSION['imie'] . "<br>";
            // echo $_SESSION['nazwisko'] . "<br>";
            // echo $_SESSION['id_klasy'] . "<br>";

            header('Location: uczen.php');
        
        }else{
            header('Location: logowanieUczen.php');

        }

    }

    

?>