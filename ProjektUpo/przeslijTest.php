<?php 
    session_start();
    require_once "connect.php";

    $tytulTestu = $_POST['titleTest'];
    $klasa = $_POST['klasa'];
    $czas = $_POST['time'];
    $liczba_pytan = $_POST['numberOfQuestions'];
    $liczba_odpowiedzi = $_POST['numberOfAnswers'];
    $id_nauczyciela = $_SESSION['id'];

    $pytania = array(); 
    $odpowiedzi = array();

    echo "ID nauczyciela: " . $_SESSION['id'] . "<br>";
    echo $tytulTestu . "<br>";
    echo "ID klasy: " . $klasa . "<br>";
    echo $czas . "<br>";
    echo $liczba_pytan . "<br>";
    echo $liczba_odpowiedzi . "<br>";

    // Zapisanie pytan do tablicy

    for($i=1; $i<=$liczba_pytan; $i++){
        $odnosnikPytania = "pytanie" . $i;
        $pytania[$i] = $_POST[$odnosnikPytania];

    }

    for($i=1; $i<=$liczba_pytan; $i++){
        echo $pytania[$i] . "<br>";

    }

    echo "<hr>";
    // Zapisanie odpowiedzi do tablicy

    for($i=1; $i<=$liczba_pytan; $i++){
        $odnosnikOdpowiedzDobra = "p" . $i . "odpowiedzD" . $i;
        $nastepneM = count($odpowiedzi)+1;
        $odpowiedzi[$nastepneM] = $_POST[$odnosnikOdpowiedzDobra];

        for($k=1; $k<$liczba_odpowiedzi; $k++){
            $odnosnikOdpowiedzZla = "p" . $i . "odpowiedzZ" . $k;
            $nastepneM = count($odpowiedzi)+1;
            $odpowiedzi[$nastepneM] = $_POST[$odnosnikOdpowiedzZla];

        }

    }

    for($i=1; $i<=count($odpowiedzi); $i++){
        echo $odpowiedzi[$i] . "<br>";

    }
    
    // Przesylanie formularza do serwera

    $sql = "INSERT INTO testy(id, tytul, id_nauczyciela, id_klasy, liczba_pytan, czas)
    VALUES ('', '$tytulTestu', '$id_nauczyciela', '$klasa', '$liczba_pytan', '$czas');";

    if(mysqli_query($baza, $sql)){
        echo "Dodano test do bazy danych!";
        sleep(60);
        header('Location: Nauczyciel.php');
    }else{
        echo "Błąd: " . $sql . " " . mysqli_error($baza);
    }


?>