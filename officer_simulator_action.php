<?php
    include "validate_admin.php";
    include "header.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
    include "session_timeout.php";

    $conn = mysqli_connect('localhost','root','','bank');


    if (isset($_GET['cust_id'])) {
        $_SESSION['cust_id'] = $_GET['cust_id'];
    }
    $amt = mysqli_real_escape_string($conn, $_POST["amt"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);


    $sql0 = "SELECT balance FROM passbook".$_SESSION['cust_id']." ORDER BY trans_id DESC LIMIT 1";
    $result = $conn->query($sql0);
    $row = $result->fetch_assoc();
    $balance = $row["balance"];

   
    $err_no = -1;


        if ($type == "credit") {
            $final_balance = $balance + $amt;

            $sql1 = "INSERT INTO passbook".$_SESSION['cust_id']." VALUES(
                        NULL,
                        NOW(),
                        'Depozit la bancă',
                        '0',
                        '$amt',
                        '$final_balance'
                    )";

            if (($conn->query($sql1) === TRUE)) {
                $err_no = 0;
            }
        }

        if ($type == "debit") {
            $final_balance = $balance - $amt;

            if ($final_balance >= 0) {
                $sql1 = "INSERT INTO passbook".$_SESSION['cust_id'] ." VALUES(
                            NULL,
                            NOW(),
                            'Retragere la bancă',
                            '$amt',
                            '0',
                            '$final_balance'
                        )";

                if (($conn->query($sql1) === TRUE)) {
                    $err_no = 0;
                }
            }
            else {
                $err_no = 1;
            }
        }
   
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
            <?php
            if ($err_no == -1) { ?>
                <p id="info"><?php echo "Eroare la conexiune ! Te rugăm să încerci din nou.\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 0) { ?>
                <p id="info"><?php echo "Actiune cu succes !\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 1) { ?>
                <p id="info"><?php echo "Fonduri insuficiente !\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 2) { ?>
                <p id="info"><?php echo "PIN greșit !\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="./office_simulator.php" class="button">Incearcă din nou</a>
        </div>
    </div>

</body>
</html>
