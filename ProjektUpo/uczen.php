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
        <h1>Uczeń</h1>

        <section id="profilPicture">
            <img src="images/profilPicture.png" height="80" title="Wyloguj się">
        </section>
    </header>
    
    <main>
        <nav>
            <h1 id="textTests">Tutaj <br>pojawią się testy</h1>
        </nav>

        <nav class="test">
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

        </nav>
        
        
    </main>
</body>
</html>