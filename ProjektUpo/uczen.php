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
    <title>Uczeń - Testy</title>
    <link rel="stylesheet" href="main.css">
    <style>
        #textTests{
            font-size: 3vw;
            margin-top: 80px;
        }

        @media screen and (max-width: 600px) {
            #textTests{
                font-size: 60px;
                margin-top: 80px;
            }
        }

    </style>
</head>
<body>
    <header>
        <?php
        echo "<h1>Uczeń</h1>";
        ?>

        <section id="profilPicture">
            <a href="logowanieUczen.php"><img src="images/profilPicture.png" height="80" title="Wyloguj się"></a>
        </section>
    </header>
    
    <main>
        <nav>
            <h1 id="textTests">Tutaj <br>pojawią się testy</h1>
        </nav>

        <?php 
            $id_klasy = $_SESSION['id_klasy'];
            $sql = "SELECT * FROM testy WHERE id_klasy = $id_klasy";
            //SELECT * FROM testy JOIN klasy ON testy.id_klasy=klasy.id WHERE testy.id_klasy = $id_klasy
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

                    $idTT = $wiersz['id'];
                    $idUcz = $_SESSION['id'];

                    $sqlDoUzupelniania = "SELECT * FROM wynikiztestow WHERE wynikiztestow.id_testu = $idTT AND id_ucznia = $idUcz";
                    $wynikDoUzu = mysqli_query($baza, $sqlDoUzupelniania);
                    
                    if (mysqli_num_rows($wynikDoUzu) > 0) {
                        $wierszUzu = mysqli_fetch_assoc($wynikDoUzu);

                        echo "<nav class='test'>";
                        echo "<h1>" . $wiersz['tytul'] . "</h1>";
                        echo "<p><img src='images/dot.png' class='dot'> Liczba pytań: " . $wiersz['liczba_pytan'] . "</p>";
                        echo "<p><img src='images/dot.png' class='dot'> Czas rozpoczecia: ".$wierszUzu['czas_rozpoczecia']."</p>";
                        echo "<p><img src='images/dot.png' class='dot'> Czas ukończenia: ".$wierszUzu['czas_zakonczenia']."</p>";
                        echo "<section class='wynik'> Wynik: ".$wierszUzu['wynikWproc']."%</section>";
                        echo "<br>";
                        echo "<section class='wynik'>".$wierszUzu['ocena']."</section>";
                        echo "</nav>";
                    }else{
                        echo "<nav class='test'>";
                        echo "<h1>" . $wiersz['tytul'] . "</h1>";
                        echo "<p><img src='images/dot.png' class='dot'> Liczba pytań: " . $wiersz['liczba_pytan'] . "</p>";
                        echo "<p><img src='images/dot.png' class='dot'> Czas rozpoczecia: </p>";
                        echo "<p><img src='images/dot.png' class='dot'> Czas ukończenia: </p>";
                        echo "<section class='wynik'> Wynik: </section>";
                        echo "<br>";
                        echo "<a href='rozwiazywanie.php?title=". $wiersz['tytul'] ."'><button type='button'>Rozpocznij</button></a>";
                        echo "</nav>";
                    }

                    

                }
            }

        ?>

        <!-- <nav class="test">
            <h1>Biologia</h1>
            <p><img src="images/dot.png" class="dot"> Liczba pytań: </p>
            <p><img src="images/dot.png" class="dot"> Czas rozpoczecia: </p>
            <p><img src="images/dot.png" class="dot"> Czas ukończenia: </p>
            
            <section class="wynik">
                Wynik:
            </section>
            <br>
            <button type="button">Rozpocznij</button>

        </nav>

        <nav class="test">
            <h1>DNA i RNA</h1>
            <p><img src="images/dot.png" class="dot"> Liczba pytań: </p>
            <p><img src="images/dot.png" class="dot"> Czas rozpoczecia: </p>
            <p><img src="images/dot.png" class="dot"> Czas ukończenia: </p>
                
            <section class="wynik">
                Wynik:
            </section>
            <br>
            <button type="button">Rozpocznij</button>

        </nav>

        <nav class="test">
            <h1>Test 3</h1>
            <p><img src="images/dot.png" class="dot"> Liczba pytań: </p>
            <p><img src="images/dot.png" class="dot"> Czas rozpoczecia: </p>
            <p><img src="images/dot.png" class="dot"> Czas ukończenia: </p>
                
            <section class="wynik">
                Wynik:
            </section>
            <br>
            <button type="button">Rozpocznij</button>

        </nav> -->
        
        
    </main>
</body>
</html>