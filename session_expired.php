<?php
    include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="session_expired_style.css">
</head>


<body>
    <div class="flex-container">
        <div class="flex-item">
            <img id="session" src="/images/hourglass.png">
        </div>
        <div class="flex-item-message">
            <h1 id="session">Sesiunea a expirat!</h1>
            <p id="session">
                Din motive de securitate dacă contul tău e inactiv 5 minute
                vei fi delogat automat<br><br>
                Te rugăm să te loghezi din nou
            </p>
        </div>
        <div class="flex-item">
            <a href="./home.php" class="button">Acasă</a>
        </div>
    </div>

</body>
</html>
