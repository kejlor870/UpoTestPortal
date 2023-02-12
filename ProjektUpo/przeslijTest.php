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

        //Przesylanie pytan do bazy danych

        $sql = "SELECT id FROM testy WHERE tytul = '$tytulTestu' AND id_nauczyciela = $id_nauczyciela";
        $dane = mysqli_fetch_assoc(mysqli_query($baza, $sql));

        $id_testu = $dane['id'];
        $mOdpowiedzi = 1; // Miejsce Odpowiedzi
        $maxModpowiedzi = $liczba_odpowiedzi;

        for($i=1; $i<=$liczba_pytan; $i++){
            $sql = "INSERT INTO pytania(id, id_testu, pytanie) VALUES ('', '$id_testu', '$pytania[$i]');";
            if (mysqli_query($baza, $sql)) {
                echo "Nowy rekord utworzony prawidłowo.";

                //Przesylanie odpowiedzi do bazy danych

                $sql = "SELECT id FROM pytania WHERE pytanie = '$pytania[$i]';";
                $dane2 = mysqli_fetch_assoc(mysqli_query($baza, $sql));

                $id_pytania = $dane2['id'];

                for($mOdpowiedzi; $mOdpowiedzi<=$maxModpowiedzi; $mOdpowiedzi++){
                    $sql = "INSERT INTO odpowiedzi(id, id_pytania, odpowiedz) VALUES ('', '$id_pytania', '$odpowiedzi[$mOdpowiedzi]')";
                    mysqli_query($baza, $sql);
                   
                }
                
                $maxModpowiedzi += $liczba_odpowiedzi; 

            } else {
                echo "Błąd: " . $sql . " " . mysqli_error($baza);
            }

        }


        header('Location: Nauczyciel.php');
    }else{
        echo "Błąd: " . $sql . " " . mysqli_error($baza);
    }

    
    

    


?>