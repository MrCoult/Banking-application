<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    include "validate_customer.php";
    include "connect.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    $_SESSION['auto_delete_benef'] = false;
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="action_style.css">
</head>

<body>
    <div class="flex-container">
        <div class="flex-item">
            <p id="info" style="font-size:36px;">
                <b>Ai șters prietenul cu succes!</b><br>
            </p>
        </div>

        <div class="flex-item">
            <p id="info" style="margin-top:-40px;">
                <br>Din motive de securitate dacă datele pesonale ale prietenului (
                Telefon, IBAN, Email,) au fost schimbate <b>sau</b> dacă
                prietenul nu mai există, datele au fost șterse din lista ta de
                prieteni automat.<br><br>
                Te rugăm să adaugi prieteni din nou
            </p>
        </div>
        <?php $conn->close(); ?>

        <div class="flex-item">
            <a href="./beneficiary.php" class="button">Mergi la pagina de transferuri</a>
        </div>

    </div>

</body>
</html>
