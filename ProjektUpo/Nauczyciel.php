<?php 
    session_start();
    require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <link rel="icon" type="image/png" href="images/icon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <!-- -->
    <title>Nauczyciel - Testy</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <?php
        echo "<h1>Nauczyciel - " . $_SESSION['imie'] . " " . $_SESSION['nazwisko'] . "</h1>";
        ?>
        
        <section id="profilPicture">
            <a href="logowanie.php"><img src="images/profilPicture.png" height="80" title="Wyloguj się"></a>
        </section>
    </header>
    
    <main>
        <a href="dodajTest.php">
            <nav>
                <h1>Dodaj test</h1>
                <img src="images/plus.png">
            </nav>
        </a>

        <?php 
            $id_nauczyciela = $_SESSION['id'];
            $sql = "SELECT * FROM testy JOIN klasy ON testy.id_klasy=klasy.id WHERE testy.id_nauczyciela = $id_nauczyciela";
            $wynik = mysqli_query($baza, $sql);

            if (mysqli_num_rows($wynik) > 0) {
                while($wiersz = mysqli_fetch_assoc($wynik)) {
                    if($wiersz['czas']<5 && $wiersz['czas']>1){
                        $nazwaMinut = "minuty";
                    }else if($wiersz['czas']==1){
                        $nazwaMinut = "minuta";
                    }else{
                        $nazwaMinut = "minut";
                    }

                    echo "<nav class='test' >";
                    echo "<h1>" . $wiersz['tytul'] . "</h1>";
                    echo "<p><img src='images/dot.png' class='dot'> Liczba pytań: " . $wiersz['liczba_pytan'] . "</p>";
                    echo "<p><img src='images/dot.png' class='dot'> Klasa: " . $wiersz['nazwa_klasy'] . "</p>";
                    echo "<p><img src='images/dot.png' class='dot'> Czas: " . $wiersz['czas'] . " $nazwaMinut</p>";
                    
                    echo "<a href='usunTestNauczyciel.php?titleToDel=" . $wiersz['tytul'] . "'><button type='button'>Usuń</button></a>";
                    echo "<br>";
                    echo "<a href='odpowiedziUczniow.php?tytulTestuODP=" . $wiersz['tytul'] . "'><button type='button'>Pokaz odpowiedzi</button></a>";
                    echo "</nav>";

                }
            }

        ?>

        </form>

        <!-- <nav class="test">
            <h1>Biologia</h1>
            <p><img src="images/dot.png" class="dot"> Liczba pytań: </p>
            <p><img src="images/dot.png" class="dot"> Klasa: </p>
            <p><img src="images/dot.png" class="dot"> Czas: </p>

            <button type="button">Edytuj</button>
            <br>
            <button type="button">Pokaz odpowiedzi</button>

        </nav>

        <nav class="test">
            <h1>DNA i RNA</h1>
            <p><img src="images/dot.png" class="dot"> Liczba pytań: </p>
            <p><img src="images/dot.png" class="dot"> Klasa: </p>
            <p><img src="images/dot.png" class="dot"> Czas: </p>

            <button type="button">Edytuj</button>
            <br>
            <button type="button">Pokaz odpowiedzi</button>

        </nav>

        <nav class="test">
            <h1>Test 3</h1>
            <p><img src="images/dot.png" class="dot"> Liczba pytań: </p>
            <p><img src="images/dot.png" class="dot"> Klasa: </p>
            <p><img src="images/dot.png" class="dot"> Czas: </p>

            <button type="button">Edytuj</button>
            <br>
            <button type="button">Pokaz odpowiedzi</button>

        </nav> -->
        
        
    </main>
</body>
</html>