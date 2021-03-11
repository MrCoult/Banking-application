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
    <link rel="stylesheet" href="customer_add_style.css">
</head>

<body>
    <form class="news_form" action="post_news_action.php" method="post">
        <div class="flex-container">
            <div class=container>
                <label>Titlu notificare :</label><br>
                <input name="headline" size="50" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Detalii notificare :</label><br>
                <textarea name="news_details" style="height: 200px; width: 60vw;" required /></textarea>
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <button type="submit">Trimite notificarea</button>
            </div>

            <div class="container">
                <button type="reset" class="reset" onclick="return confirmReset();">Resetează</button>
            </div>


            
        </div>


       

    </form>
    <form class="news_form" action="rapoarte/ex7.php" method="post">
        <div class="flex-container">
         

        <div class="flex-container">
            <div class="container">
                <button type="submit">Raport cu lista de notificări trimise în aplicație</button>
            </div>

            
        </div>
        </form>


    

    <script>
    function confirmReset() {
        return confirm('Vrei să resetezi?')
    }
    </script>

</body>
</html>
