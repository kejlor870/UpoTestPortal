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
    <title>Zaloguj się</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <section id="logIn">
        <h1>Zaloguj się</h1>
        <form action="zaloguj.php" method="post">
            <p>Login</p>
            <input type="text" name="login" class="formInput">
            <p>Hasło</p>
            <input type="password" name="password" class="formInput">
            <br>
            <input type="submit" id="submitcss">
        </form>
    </section>
</body>
</html>