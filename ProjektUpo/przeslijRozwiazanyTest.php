<?php 
    session_start();
    require_once "connect.php";

    $czasZakonczenia = date('H:i');
    $dobreOdpowiedzi = 0;
    
    echo "Ilość pytań: " . $_SESSION['iloscPytan'] . "<br>";

    echo "<hr>";

    echo "Ilość odpowiedzi: " . $_SESSION['iloscOdp'] . "<br>";
    $iloscOdpNa1Pytanie = $_SESSION['iloscOdp']/$_SESSION['iloscPytan'];
    echo "Ilość odpowiedzi na 1 pytanie: " . $iloscOdpNa1Pytanie;

    for($i=1; $i<=$_SESSION['iloscPytan']; $i++){
        $odpowiedzNaID = $_SESSION['tabIdPytan'][$i];

        if($_POST[$odpowiedzNaID]%$iloscOdpNa1Pytanie != 0){
            $dobreOdpowiedzi += 1;

        }
        
    }

    echo "<hr>";

    echo "Czas rozpoczecia testu: " . $_SESSION['czasRozpoczecia'] . "<br>";
    echo "Czas zakonczenia testu: " . $czasZakonczenia . "<br>";
    echo "<hr> Dobre odpowiedzi uzytkownika: $dobreOdpowiedzi / ".$_SESSION['iloscPytan']."<hr>";
    
    $wynikProcentowy = round(($dobreOdpowiedzi/$_SESSION['iloscPytan'])*100);
    echo "Wynik procentowy: $wynikProcentowy% <br>";
    
    if($wynikProcentowy <= 100 && $wynikProcentowy >= 86){
        $ocenaZprocentow = "Bardzo dobry";
    }else if($wynikProcentowy <= 85 && $wynikProcentowy >= 70){
        $ocenaZprocentow = "Dobry";
    }else if($wynikProcentowy <= 69 && $wynikProcentowy >= 55){
        $ocenaZprocentow = "Dostateczny";
    }else if($wynikProcentowy <= 54 && $wynikProcentowy >= 40){
        $ocenaZprocentow = "Dopuszczajacy";
    }else if($wynikProcentowy <= 39 && $wynikProcentowy >= 0){
        $ocenaZprocentow = "Niedostateczny";
    }

    echo "Ocena: $ocenaZprocentow";

    $idUcznia = $_SESSION['id'];
    $czasRozpoczecia = $_SESSION['czasRozpoczecia'];
    $idTestuTutaj = $_SESSION['idTestuTU'];

    $czasDoZakonczenia = $_SESSION['czasDoZakonczenia'];

    echo "<hr>";

    if($czasZakonczenia>$czasDoZakonczenia){
        echo "Oddales test: " . $czasZakonczenia . ", a czas był do" . $czasDoZakonczenia;
        $ocenaZprocentow = "Niedostateczny";
    }else{
        echo $czasZakonczenia . " " . $czasDoZakonczenia . "<br>";
        echo "<hr> Id testu: ".$idTestuTutaj."<br>";
    }

    

    $sql = "INSERT INTO wynikiztestow (id, id_testu, id_ucznia, wynikWproc, ocena, czas_rozpoczecia, czas_zakonczenia) VALUES ('', '$idTestuTutaj', '$idUcznia', '$wynikProcentowy', '$ocenaZprocentow', '$czasRozpoczecia', '$czasZakonczenia');";
    if (mysqli_query($baza, $sql)) {
        echo "Nowy rekord utworzony prawidłowo.";
        header('Location: uczen.php');
    } else {
        echo "Błąd: " . $sql . "
    " . mysqli_error($baza);
    }


?>