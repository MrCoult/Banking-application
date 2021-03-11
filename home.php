<?php
    include "header.php";
    include "navbar.php";

    if (isset($_GET['loginFailed'])) {
        $message = "Nume sau parola greșită ! Incearcă din nou.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home_style.css">
</head>

<body>
    <div class="flex-container-background">
        <div class="flex-container">
            <div class="flex-item-0">
                <h1 id="form_header">Bine ai venit la URA_Bank</h1>
            </div>
        </div>

        <div class="flex-container">
            <div class="flex-item-1">
                <form action="customer_login_action.php" method="post">
                    <div class="flex-item-login">
                        <h2>Logare în cont</h2>
                    </div>

                    <div class="flex-item">
                        <input type="text" name="cust_uname" placeholder="Nume de utilizator*" required>
                    </div>

                    <div class="flex-item">
                        <input type="password" name="cust_psw" placeholder="Parolă*" required>
                    </div>

                    <div class="flex-item">
                        <button type="submit">Intră în cont</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>
</html>

