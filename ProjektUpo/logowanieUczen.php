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
    <title>Zaloguj się - Uczeń</title>
    <link rel="stylesheet" href="main.css">
    <style>
        h6{
            display: block;
            background-color: #a19a92;
            padding: 0;
            border: 0;
            border-radius: 10px 10px 0 0;
            font-size: 0.7vw;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            
        }

        @media screen and (max-width: 600px) {
            h6{
                border-radius: 10px 10px 0 0;
                font-size: 3vw;
                
            }

        }
    </style>
</head>
<body>
    <section id="logIn">
        <h1>Zaloguj się <br> Uczeń</h1>
        <form action="zalogujU.php" method="post">
            <p>Login</p>
            <input type="text" name="login" class="formInput">
            <p>Hasło</p>
            <input type="password" name="password" class="formInput">
            <br>
            <input type="submit" id="submitcss">
        </form>
        <a href="logowanie.php"><h6> Logowanie - nauczyciel </h6></a>
    </section>
</body>
</html>