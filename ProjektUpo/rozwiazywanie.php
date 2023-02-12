<?php 
    session_start();
    require_once "connect.php";


    $tytulTestu = $_GET['title'];
    $idKlasy = $_SESSION['id_klasy'];

    $sql = "SELECT * FROM testy WHERE tytul='$tytulTestu' AND id_klasy='$idKlasy'";
    $wynik = mysqli_query($baza, $sql);
        
    if (mysqli_num_rows($wynik) > 0) {
        while($wiersz = mysqli_fetch_assoc($wynik)) {
            if($wiersz['czas']<5 && $wiersz['czas']>1){
                $czasNaUkonczenie = $wiersz['czas'] . " minuty";
            }else if($wiersz['czas']==1){
                $czasNaUkonczenie = $wiersz['czas'] . " minuta";
            }else{
                $czasNaUkonczenie = $wiersz['czas'] . " minut";
            }

            // echo date('H:i:s', time()+($wiersz['czas']*60));
            $czasRozpoczecia = date('H:i');

            $czasDoZakonczenia = date('H:i', time()+($wiersz['czas']*60));

            $_SESSION['czasRozpoczecia'] = $czasRozpoczecia;

            $idTestu = $wiersz['id'];
            $_SESSION['idTestuTU'] = $idTestu;
            $_SESSION['czasDoZakonczenia'] = $czasDoZakonczenia;

        }
    }
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
    <title>TEST</title>
    <link rel="stylesheet" href="main.css">
    <style>
        hr{
            height: 3px;
            width: 98%;
            background-color: #7D6E83;
            border: 0;

        }

        main #solveTest{
            box-sizing: border-box;
            background-color: #DFD3C3;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
            padding-top: 20px;
            text-align: center;

        }

        main #solveTest h1{
            font-size: 3vw;
            background-color: #D0B8A8;
            border-radius: 10px;
            width: 50%;
            margin-left: auto;
            margin-right: auto;

        }

        main .questionPole{
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            padding-top: 20px;
            text-align: left;

        }

        main .questionPole h2{
            text-align: center;
            font-size: 1.7vw;

        }

        #solveTest input[type=submit]{
            background-color: #D0B8A8;
            width: 40%;
            border: 0;
            border-radius: 10px;
            font-size: 1.2vw;
            padding: 10px 20px 10px 20px;
            margin: 20px 0 50px 0;

        }

        #solveTest input[type=submit]:hover{   
            cursor: pointer;
        }
        
        /*  Responsywne */

        @media screen and (max-width: 600px) {
            main #solveTest{
                width: 100%;

            }

            main #solveTest h1{
                font-size: 6vw;
                width: 70%;

            }

            main .questionPole{
                width: 70%;

            }

            main .questionPole h2{
                text-align: center;
                font-size: 4vw;

            }

            #solveTest input[type=submit]{
                width: 70%;
                font-size: 4vw;

            }

        }

    </style>
</head>
<body>
    <header>
        <?php
            echo "<h1>TEST - Koniec: " . $czasDoZakonczenia . "</h1>";
        ?>

        <!-- <script>
            const aktualnyCzas = new Date();
            console.log(aktualnyCzas.getMinutes() + ":" + (aktualnyCzas.getSeconds()));
        </script> -->

        <section id="profilPicture">
            <a href="logowanieUczen.php"><img src="images/profilPicture.png" height="80" title="Wyloguj się"></a>
        </section>
    </header>
    
    <main>
        <section id="solveTest">
            <form method="POST" action="przeslijRozwiazanyTest.php">
                <?php
                    echo "<h1>" . $_GET['title'] . "</h1>";
                ?>

                <!-- Odczyt pytan i odpowiedzi z bazy (wyswietlanie na stronie) -->

                <?php 
                    $tabIdPytan = array();
                    $iloscOdpo = 0;

                    $sql = "SELECT * FROM pytania WHERE id_testu='$idTestu'";
                    $wynik = mysqli_query($baza, $sql);
        
                    if (mysqli_num_rows($wynik) > 0) {
                        //Tworzenie pola z pytaniem i odpowiedziami
                        while($wiersz = mysqli_fetch_assoc($wynik)) {
                            echo "<section class='questionPole'>";
                            echo "<h2>" . $wiersz['pytanie'] . "</h2>";

                            $idPytania = $wiersz['id'];

                            // Zapisanie w tablicy id pytan
                            $mWtablicy = count($tabIdPytan)+1;
                            $tabIdPytan[$mWtablicy] = $idPytania;

                            // Wypisywanie odpowiedzi
                            $sql2 = "SELECT * FROM odpowiedzi WHERE id_pytania='$idPytania'";
                            $wynik2 = mysqli_query($baza, $sql2);

                            while($wiersz2 = mysqli_fetch_assoc($wynik2)) {
                                $odpowiedz = $wiersz2['odpowiedz'];
                                $iloscOdpo += 1;

                                echo '<input type="radio" id="'.$odpowiedz.'" name="'.$idPytania.'" value="'.$iloscOdpo.'">';
                                echo '<label for="'.$odpowiedz.'">'.$odpowiedz.'</label><br>';
                    
                            }

                            echo "<hr></section>";
                
                        }
                        
                        $_SESSION['tabIdPytan'] = $tabIdPytan;
                        $_SESSION['iloscPytan'] = count($tabIdPytan);
                        $_SESSION['iloscOdp'] = $iloscOdpo;

                    }
                    
                    
                ?>

                <!-- <section class="questionPole">
                    <h2> Pytanie numer1? </h2>

                    <input type="radio" id="html" name="fav_language" value="HTML">
                    <label for="html">HTML</label>
                    <br>

                    <input type="radio" id="css" name="fav_language" value="CSS">
                    <label for="css">CSS</label>
                    <br>

                    <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                    <label for="javascript">JavaScript</label>

                    <hr>
                </section>

                <section class="questionPole">
                    <h2> Pytanie numer2? </h2>

                    <input type="radio" id="Zaba" name="jezyk" value="Zaba">
                    <label for="Zaba">Zaba</label>
                    <br>

                    <input type="radio" id="Zapka" name="jezyk" value="Zapka">
                    <label for="css">Zapka</label>
                    <br>

                    <input type="radio" id="Rzaba" name="jezyk" value="Rzaba">
                    <label for="Rzaba">Rzaba</label>

                    <hr>
                </section>

                <section class="questionPole">
                    <h2> Pytanie numer3? </h2>

                    <input type="radio" id="Tak" name="pytanie3" value="Tak">
                    <label for="Tak">Tak</label>
                    <br>

                    <input type="radio" id="Nie" name="pytanie3" value="CSS">
                    <label for="Nie">Nie</label>
                    <br>

                    <input type="radio" id="Nie wiem" name="pytanie3" value="Nie wiem">
                    <label for="Nie wiem">Nie wiem</label>

                    <hr>
                </section> -->


                <input type="submit" value="Zakończ test">

            </form>

        </section>
    </main>
</body>
</html>