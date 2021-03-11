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
    <form class="add_customer_form" action="customer_add_action.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Te rugăm să completezi formularul de adăugare . . .</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Prenume :</label><br>
                <input name="fname" size="30" type="text" required />
            </div>
            <div  class=container>
                <label>Nume :</b></label><br>
                <input name="lname" size="30" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Sex :</label>
            </div>
            <div class="flex-container-radio">
                <div class="container">
                    <input type="radio" name="gender" value="male" id="male-radio" checked>
                    <label id="radio-label" for="male-radio"><span class="radio">Bărbat</span></label>
                </div>
                <div class="container">
                    <input type="radio" name="gender" value="female" id="female-radio">
                    <label id="radio-label" for="female-radio"><span class="radio">Femeie</span></label>
                </div>
                <div class="container">
                    <input type="radio" name="gender" value="others" id="other-radio">
                    <label id="radio-label" for="other-radio"><span class="radio">Nespecificat</span></label>
                </div>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Data de naștere :</label><br>
                <input name="dob" size="30" type="text" placeholder="aaaa-ll-zz" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>CNP :</label><br>
                <input name="aadhar" size="255" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Email :</label><br>
                <input name="email" size="30" type="text" required />
            </div>
            <div  class=container>
                <label>Telefon :</b></label><br>
                <input name="phno" size="30" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Adresă :</label><br>
                <textarea name="address" required /></textarea>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Bancă principală :</label>
            </div>
            <div  class=container>
                <select name="branch">
                    <option value="ING">ING</option>
                    <option value="BCR">BCR</option>
                    <option value="BRD">BRD</option>
                    <option value="CEC">CEC</option>
                    <option value="BT">BT</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>IBAN :</label><br>
                <input name="acno" size="255" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Balanță inițială :</label><br>
                <input name="o_balance" size="20" type="text" required />
            </div>
            <div  class=container>
                <label>PIN :</b></label><br>
                <input name="pin" size="15" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Nume de utilizator :</label><br>
                <input name="cus_uname" size="30" type="text" required />
            </div>
            <div  class=container>
                <label>Parolă :</b></label><br>
                <input name="cus_pwd" size="30" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <button type="submit">Adaugă</button>
            </div>

            <div class="container">
                <button type="reset" class="reset" onclick="return confirmReset();">Resetează</button>
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
