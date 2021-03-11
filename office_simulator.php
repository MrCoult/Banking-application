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
    <form class="add_customer_form" action="officer_simulator_action.php" method="post">
        <div class="flex-container-form_header">    
            <h1 id="form_header">Operații în bancă la casierie</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Sumă:</label><br>
                <input name="amt" size="24" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Tip acțiune :</label>
            </div>
            <div class="flex-container-radio">
                <div class="container">
                    <input type="radio" name="type" value="debit" id="debit-radio" checked>
                    <label id="radio-label" for="debit-radio"><span class="radio">Debit</span></label>
                </div>
                <div class="container">
                    <input type="radio" name="type" value="credit" id="credit-radio">
                    <label id="radio-label" for="credit-radio"><span class="radio">Credit</span></label>
                </div>
            </div>
        </div>

        

        <div class="flex-container">
            <div class="container">
                <button type="submit">Efectuează operațiunea</button>
            </div>

            <div class="container">
                <button type="reset" class="reset" onclick="return confirmReset();">Resetează</button>
            </div>
        </div>




        

    </form>

    <form class="add_customer_form" action="rapoarte/ex3.php" method="post">
       
       <div class="flex-container">
           <div class="container">
           </div>

       </div>
       











    </form>

    <script>
    function confirmReset() {
        return confirm('Ești sigur că vrei să resetezi?')
    }
    </script>

</body>
</html>
