<?php 
    session_start();
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
    <title>Dodaj test - Nauczyciel - Testy</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1>Dodaj test</h1>

        <section id="profilPicture">
            <a href="Nauczyciel.php"><img src="images/profilPicture.png" height="80" title="Strona główna"></a>
        </section>
    </header>
    
    <main>
        <section id="formAddTest">
            <form action="przeslijTest.php" method="POST">
                <p>Tytuł testu:</p>
                <input type="text" name="titleTest" id="titleInput" placeholder="Tytuł">

                <p>Klasa:</p>
                
                <!-- <option value="1TPro">1TPro</option>
                <option value="2TPro">2TPro</option>
                <option value="3TPro">3TPro</option> -->
                <!-- SELECT -->
                <?php 

                    require_once "connect.php";
                        
                    $sql = "SELECT * FROM klasy";
                    $wynik = mysqli_query($baza, $sql);

                    if (mysqli_num_rows($wynik) > 0) {
                        echo '<select name="klasa" class="klasaANDtime"> ';
                        echo '<option value="default">Wybierz klase</option>';

                        while($wiersz = mysqli_fetch_assoc($wynik)) {
                            echo "<option value='" . $wiersz['id'] . "'>" . $wiersz['nazwa_klasy'] . "</option>";
                        }

                        echo '</select>';
                    }

                ?>
                 <!-- SELECT END -->

                <p>Czas w minutach:</p>
                <input type="number" name="time" class="klasaANDtime">

                <hr>

                <p id="letDown">Liczba pytań: <input type="number" id="numberOfQuestions" name="numberOfQuestions" class="klasaANDtime"></p>

                <section class="toLeft">
                    <p>Liczba odpowiedzi: <input type="number" id="numberOfAnswers" name="numberOfAnswers" class="klasaANDtime" onkeyup="generujPola()"></p>
                </section>

                <hr>

                <div id="pytanka">
                    <!-- <h1>Pytanie: <input type="text" class="questionStyle"></h1>

                    <p>Dobra odpowiedź: <input type="text" class="answersStyle"></p>
                    <p>Zła odpowiedź: <input type="text" class="answersStyle"></p>
                    <p>Zła odpowiedź: <input type="text" class="answersStyle"></p>
                    <p>Zła odpowiedź: <input type="text" class="answersStyle"></p>


                    <h1>Pytanie: <input type="text" class="questionStyle"></h1>

                    <p>Dobra odpowiedź: <input type="text" class="answersStyle"></p>
                    <p>Zła odpowiedź: <input type="text" class="answersStyle"></p>
                    <p>Zła odpowiedź: <input type="text" class="answersStyle"></p>
                    <p>Zła odpowiedź: <input type="text" class="answersStyle"></p> -->

                </div>

                <script>
                    function generujPola(){
                        document.getElementById("pytanka").innerHTML = '';
                        document.getElementById("pytanka").innerHTML += '<form method="POST">';

                        let liczbaPytan = Number(document.getElementById("numberOfQuestions").value);
                        let liczbaOdpowiedzi = Number(document.getElementById("numberOfAnswers").value);

                        for(let i=1; i<=liczbaPytan; i++){
                            document.getElementById("pytanka").innerHTML += '<h1>Pytanie '+i+': <input type="text" class="questionStyle" name="pytanie'+i+'"></h1> <p>Dobra odpowiedź: <input type="text" class="answersStyle" name="p'+i+'odpowiedzD'+i+'"></p>';
                            
                            for(let k=1; k<liczbaOdpowiedzi; k++){
                                document.getElementById("pytanka").innerHTML += '<p>Zła odpowiedź: <input type="text" class="answersStyle" name="p'+i+'odpowiedzZ'+k+'"></p>';
                            }

                        }
                        
                        document.getElementById("pytanka").innerHTML += '<input type="submit" value="Zapisz">';

                        document.getElementById("pytanka").innerHTML += '</form>';
                        //document.getElementById("pytanka").innerHTML = '<h1>Pytanie: <input type="text"></h1><p>Dobra odpowiedź: <input type="text"></p><p>Zła odpowiedź: <input type="text"></p><p>Zła odpowiedź: <input type="text"></p><p>Zła odpowiedź: <input type="text"></p>';

                    }

                </script>

            </form>
        </section>
    </main>
</body>
</html>