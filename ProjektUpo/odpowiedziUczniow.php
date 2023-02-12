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
    <title>Odpowiedzi</title>
    <link rel="stylesheet" href="main.css">
    <style>
        main #containerOdpowiedzi{
            box-sizing: border-box;
            background-color: #DFD3C3;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
            padding-top: 20px;
            text-align: center;
            border-radius: 10px;

        }

        main #containerOdpowiedzi h1{
            font-size: 2vw;
                
        }

        table,tr,td,th{
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 1vw;

        }

        table{
            margin: 20px auto 30px auto;

        }

        th{
            background-color: gray;
        }

        td,th{
            padding: 10px;
        }

        #empty{
            height: 20px;
        }

        @media screen and (max-width: 600px) {
            main #containerOdpowiedzi{
                width: 100%;

            }

            main #containerOdpowiedzi h1{
                font-size: 7vw;
                    
            }

            table,tr,td,th{
                border: 1px solid black;
                border-collapse: collapse;
                font-size: 2vw;

            }

            td,th{
                padding: 5px;
            }
        }

        @media screen and (max-width: 400px) {
            main #containerOdpowiedzi{
                width: 100%;

            }

            main #containerOdpowiedzi h1{
                font-size: 7vw;
                    
            }

            table,tr,td,th{
                border: 1px solid black;
                border-collapse: collapse;
                font-size: 2vw;

            }

            td,th{
                padding: 4px;
            }
        }

    </style>
</head>
<body>
    <header>
        <?php
            $tytulTestu = $_GET['tytulTestuODP'];
            echo "<h1>Odpowiedzi</h1>";
        ?>

        <section id="profilPicture">
            <a href="Nauczyciel.php"><img src="images/profilPicture.png" height="80" title="Wyloguj się"></a>
        </section>
    </header>
    
    <main>
        <section id="containerOdpowiedzi">
            <?php 

                $sqlIdTestuDoWyciagniecia = "SELECT id FROM testy WHERE testy.tytul='$tytulTestu' LIMIT 1;";
                $daneId = mysqli_fetch_assoc(mysqli_query($baza, $sqlIdTestuDoWyciagniecia));
                $IdTestuWyciagnietego = $daneId['id'];

                echo "<h1>$tytulTestu</h1>";
                
                $sqlWynikiTestow = "SELECT imie, nazwisko, wynikWproc, ocena, czas_rozpoczecia, czas_zakonczenia FROM wynikiztestow JOIN uczniowie ON wynikiztestow.id_ucznia=uczniowie.id WHERE id_testu='$IdTestuWyciagnietego';";
                $wynikDoWypisania = mysqli_query($baza, $sqlWynikiTestow);
                
                if (mysqli_num_rows($wynikDoWypisania) > 0) {
                    echo "<table><tr><th>Imię:</th><th>Nazwisko:</th><th>Wynik %:</th><th>Ocena:</th><th>Czas rozpoczecia:</th><th>Czas zakończenia:</th></tr>";
                    while($wiersz = mysqli_fetch_assoc($wynikDoWypisania)) {
                        echo "<tr>";
                        echo "<td>" . $wiersz["imie"] . "</td><td>" . $wiersz["nazwisko"] . "</td><td>" . $wiersz['wynikWproc'] . "</td><td>" . $wiersz['ocena'] . "</td><td>" . $wiersz['czas_rozpoczecia'] . "</td><td>" . $wiersz['czas_zakonczenia'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Brak wyników";
                }
            
            ?>
            <section id="empty"></section>
        </section>
    </main>
</body>
</html>