<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    include "validate_admin.php";
    include "connect.php";
    include "header.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
    include "session_timeout.php";

    if (isset($_GET['cust_id'])) {
        $_SESSION['cust_id'] = $_GET['cust_id'];
    }

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$_SESSION['cust_id'];
    $sql1 = "SELECT * FROM passbook".$_SESSION['cust_id']." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$_SESSION['cust_id'].")";

    $result0 = $conn->query($sql0);
    $result1 = $conn->query($sql1);

    if ($result0->num_rows > 0) {
        while($row = $result0->fetch_assoc()) {
            $fname = $row["first_name"];
            $lname = $row["last_name"];
            $gender = $row["gender"];
            $dob = $row["dob"];
            $aadhar = $row["aadhar_no"];
            $email = $row["email"];
            $phno = $row["phone_no"];
            $address = $row["address"];
            $branch = $row["branch"];
            $acno = $row["account_no"];
            $pin = $row["pin"];
            $cus_uname = $row["uname"];
            $cus_pwd = $row["pwd"];
        }
    }

    if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {
            $balance = $row["balance"];
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer_add_style.css">
</head>

<body>
    <form class="add_customer_form" action="./edit_customer_action.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Editează/Vizualizează profil client</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label> ID Client : <label id="info_label"> <?php echo $_SESSION['cust_id'] ?> </label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Prenume :</label><br>
                <input name="fname" size="30" type="text" value="<?php echo $fname ?>" required />
            </div>
            <div  class=container>
                <label>Nume :</b></label><br>
                <input name="lname" size="30" type="text" value="<?php echo $lname ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Balanță : <label id="info_label"> <?php echo number_format($balance)  ?><?php echo ' RON'  ?> </label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Sex :
                    <label id="info_label">
                    <?php
                        if ($gender == "male") {echo "Bărbat";}
                        elseif ($gender == "female") {echo "Femeie";}
                        else {echo "Nespecificat";}
                    ?>
                    <label>
                </label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Data de naștere :</label><br>
                <input name="dob" size="30" type="text" placeholder="aaaa-ll-zz" value="<?php echo $dob ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>CNP :</label><br>
                <input name="aadhar" size="25" type="text" value="<?php echo $aadhar ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Email :</label><br>
                <input name="email" size="30" type="text" value="<?php echo $email ?>" required />
            </div>
            <div  class=container>
                <label>Telefon :</b></label><br>
                <input name="phno" size="30" type="text" value="<?php echo $phno ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Adresă :</label><br>
                <textarea name="address" required /><?php echo $address ?></textarea>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Banca principală :</label>
            </div>
            <div  class=container>
                <select name="branch">
                    <option value="ING" <?php if ($branch == 'ING') {?> selected="selected" <?php }?>>ING</option>
                    <option value="BCR" <?php if ($branch == 'BCR') {?> selected="selected" <?php }?>>BCR</option>
                    <option value="BRD" <?php if ($branch == 'BRD') {?> selected="selected" <?php }?>>BRD</option>
                    <option value="CEC" <?php if ($branch == 'CEC') {?> selected="selected" <?php }?>>CEC</option>
                    <option value="BT" <?php if ($branch == 'BT') {?> selected="selected" <?php }?>>BT</option>
                    <option value="Alta" <?php if ($branch == 'Alta') {?> selected="selected" <?php }?>>Alta</option>
                </select>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>IBAN :</label><br>
                <input name="acno" size="25" type="text" value="<?php echo $acno ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div  class=container>
                <label>PIN :</b></label><br>
                <input name="pin" size="15" type="text" value="<?php echo $pin ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Nume de utilizator :</label><br>
                <input name="cus_uname" size="30" type="text" value="<?php echo $cus_uname ?>" required />
            </div>
            <div  class=container>
                <label>Parolă :</b></label><br>
                <input name="cus_pwd" size="30" type="text" value="<?php echo $cus_pwd ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <a href="./manage_customers.php" class="button">Înapoi</a>
            </div>
            <div class="container">
                <button type="submit">Actualizează</button>
            </div>
        </div>

    </form>

</body>
</html>
