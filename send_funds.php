<?php
    include "validate_customer.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    if (isset($_GET['cust_id'])) {
        $id = $_GET['cust_id'];
    }

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$id;
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer_add_style.css">
</head>

<body>
    <form class="add_customer_form" action="send_funds_action.php?cust_id=<?php echo $id ?>" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Transferă bani</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>
                    Către : <label id="info_label">
                        <?php echo $row0["first_name"]." ".$row0["last_name"] ?>
                    </label>
                </label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>IBAN : <label id="info_label"><?php echo $row0["account_no"] ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Adaugă suma :</label><br>
                <input name="amt" size="24" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div  class=container>
                <label>Introdu parola de securitate :</b></label><br>
                <input name="password" size="24" type="password" required />
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <a href="/beneficiary.php" class="button">Înapoik</a>
            </div>

            <div class="container">
                <button type="submit">Trimite</button>
            </div>

            <div class="container">
                <button type="reset" class="reset" onclick="return confirmReset();">Resetează</button>
            </div>
        </div>

    </form>

    <script>
    function confirmReset() {
        return confirm('Esti sigur ca vrei sa resetezi?')
    }
    </script>

</body>
</html>
