<?php
    include "validate_admin.php";
    include "header.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
    include "session_timeout.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_home_style.css">
</head>

<body>
    <div class="flex-container">
        <div class="flex-item">
            <h1 id="customer">
                Bun venit!
            </h1>
            <p id="customer" style="max-width:800px">
            De aici poți manageria toate setările aplicației.
            Poți adăuga sau edita clienți, poți vedea tranzacțiile lor,sau le poți edita
            detaliile sau chiar și șterge. De altfel poți să postezi notificări în aplicație.
            Te rugăm să ții minte că toate acestea vin cu responsabilități.</br>
            Ai grijă să nu abuzezi de controlalele pe care le ai ca angajat al băncii noastre!!!
            </p>
        </div>
    </div>

</body>
</html>

