<?php 
    session_start();
    require_once "connect.php";

    $testDoUsuniecia = $_GET['titleToDel'];

    echo $testDoUsuniecia;

    $sqlDoUsuwaniaTestow = "DELETE FROM testy WHERE tytul='$testDoUsuniecia';";
    if (mysqli_query($baza, $sqlDoUsuwaniaTestow)) {
        echo "Nowy rekord utworzony prawidłowo.";
        header('Location: Nauczyciel.php');
    } else {
        echo "Błąd: " . $sqlDoUsuwaniaTestow . " " . mysqli_error($baza);
    }


?>