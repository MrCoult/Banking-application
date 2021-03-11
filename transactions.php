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

    $sql0 = "SELECT * FROM passbook".$_SESSION['cust_id'];

    if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];
    }

    if (isset($_POST['search_term'])) {
        $_SESSION['search_term'] = $_POST['search_term'];
    }
    if (isset($_POST['date_from'])) {
        $_SESSION['date_from'] = $_POST['date_from'];
    }
    if (isset($_POST['date_to'])) {
        $_SESSION['date_to'] = $_POST['date_to'];
    }

    $filter_indicator = "Nimic";

    if (!empty($_SESSION['search_term'])) {
        $sql0 .= " WHERE remarks COLLATE latin1_GENERAL_CI LIKE '%".$_SESSION['search_term']."%'";
        $filter_indicator = "Mențiune";

        if (!empty($_SESSION['date_from']) && empty($_SESSION['date_to'])) {
            $sql0 .= " AND trans_date > '".$_SESSION['date_from']." 00:00:00'";
            $filter_indicator = "Mențiune și data";
        }
        if (empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) {
            $sql0 .= " AND trans_date < '".$_SESSION['date_to']." 23:59:59'";
            $filter_indicator = "Mențiune și data";
        }
        if (!empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) {
            $sql0 .=  " AND trans_date BETWEEN '".$_SESSION['date_from']." 00:00:00' AND '".$_SESSION['date_to']." 23:59:59'";
            $filter_indicator = "Mențiune, Dată";
        }
    }

    if (empty($_SESSION['search_term'])) {
        if (!empty($_SESSION['date_from']) && empty($_SESSION['date_to'])) {
            $sql0 .= " WHERE trans_date > '".$_SESSION['date_from']." 00:00:00'";
            $filter_indicator = "Dată";
        }
        if (empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) {
            $sql0 .= " WHERE trans_date < '".$_SESSION['date_to']." 23:59:59'";
            $filter_indicator = "Dată";
        }
        if (!empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) {
            $sql0 .=  " WHERE trans_date BETWEEN '".$_SESSION['date_from']." 00:00:00' AND '".$_SESSION['date_to']." 23:59:59'";
            $filter_indicator = "Interval";
        }
    }

    if (isset($_GET['sort'])) {
        if ($sort == 'tid_down') {
            $sql0 .= " ORDER BY trans_id ASC";
        }
        if ($sort == 'tid_up') {
            $sql0 .= " ORDER BY trans_id DESC";
        }
        if ($sort == 'date_down') {
            $sql0 .= " ORDER BY trans_date ASC";
        }
        if ($sort == 'date_up') {
            $sql0 .= " ORDER BY trans_date DESC";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="transactions_style.css">
</head>

<body>
    <div class="search-bar-wrapper">
        <div class="search-bar" id="the-search-bar">
            <div class="flex-item-search-bar" id="fi-search-bar">
                <button id="search" onclick="document.getElementById('id01').style.display='block'">Filtrează</button>
                <button id="search" onclick="document.getElementById('id02').style.display='block'">Generează raport</button>

                <div class="flex-item-by">
                    <label id="sort">Sortează după :</label>
                </div>

                <div class="flex-item-search-by">
                    <select name="by" onChange="window.location.href=this.value">
                        <option selected disabled hidden>
                            <?php if (empty($_GET['sort'])) {?>ID tranzacție &darr;<?php } else { ?>
                                <?php if ($sort == 'tid_down') {?>ID tranzacție &darr;<?php } ?>
                                <?php if ($sort == 'tid_up') {?>ID tranzacție &uarr;<?php } ?>
                                <?php if ($sort == 'date_down') {?>Dată &darr;<?php } ?>
                                <?php if ($sort == 'date_up') {?>Dată &uarr;<?php } ?>
                            <?php } ?>
                        </option>
                        <option value="transactions.php?sort=tid_down">ID tranzacție &darr;</option>
                        <option value="transactions.php?sort=tid_up">ID tranzacție &uarr;</option>
                        <option value="transactions.php?sort=date_down">Dată &darr;</option>
                        <option value="transactions.php?sort=date_up">Dată &uarr;</option>
                    </select>
                </div>

            </div>
        </div>
    </div>

    <div id="id01" class="modal">

      <form class="modal-content animate" action="" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Filter">&times;</span>
        </div>

        <div class="container">
            <h1 id="filter">Filtru :</h1>
            <p id="filter">(Lasă gol ca să ștergi filtrele)</p>
          <label>Mențiune tranzacție :</label>
          <input type="text" placeholder="Mențiunes" name="search_term">

          <label>Interval (aaaa-ll-zz) :</label>
          <div class="duration-container">
              <div class="date-container">
                  <input id="date" type="text" placeholder="De la " name="date_from">
              </div>
              <p id="minus">&minus;<b</p>
              <div class="date-container">
                  <input id="date" type="text" placeholder="Până la" name="date_to">
              </div>
          </div>


          <button id="submit" type="submit">Filtrează</button>
        </div>

      </form>
    </div>


    <div id="id02" class="modal">

<form class="modal-content animate" action="rapoarte/ex5.php" method="post">
  <div class="imgcontainer">
    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Filter">&times;</span>
  </div>

  <div class="container">
      <h1 id="filter">Generează raport :</h1>
      <p id="filter">(Lasă gol dacă vrei toată lista)</p>

    <label>Interval (aaaa-ll-zz) :</label>
    <div class="duration-container">
        <div class="date-container">
            <input id="date1" type="text" placeholder="De la " name="date_from">
        </div>
        <p id="minus">&minus;<b</p>
        <div class="date-container">
            <input id="date2" type="text" placeholder="Până la" name="date_to">
        </div>
    </div>


    <button id="submit" type="submit">Generează</button>
  </div>

</form>
</div>






    <div class="flex-container">
        <p id="none">Filtru : <?php echo $filter_indicator ?></p>
    </div>

    <div class="flex-container">

        <?php
            $result = $conn->query($sql0);

            if ($result->num_rows > 0) {?>
                <table id="transactions">
                    <tr>
                        <th>Id tranzacție</th>
                        <th>Dată efectuare</th>
                        <th>Mențiune</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Balanță</th>
                    </tr>
        <?php
            while($row = $result->fetch_assoc()) {?>
                    <tr>
                        <td><?php echo $row["trans_id"]; ?></td>
                        <td>
                            <?php
                                $time = strtotime($row["trans_date"]);
                                $sanitized_time = date("d/m/Y, g:i A", $time);
                                echo $sanitized_time;
                             ?>
                        </td>
                        <td><?php echo $row["remarks"]; ?></td>
                        <td><?php echo number_format($row["debit"]); ?></td>
                        <td><?php echo number_format($row["credit"]); ?></td>
                        <td><?php echo number_format($row["balance"]); ?></td>
                    </tr>
            <?php } ?>
            </table>
            <?php
            } else {  ?>
                <p id="none"> Niciun rezultat găsit :(</p>
            <?php }
            $conn->close(); ?>

    </div>

    <script>
    $(document).ready(function() {
        var curr_scroll;

        $(window).scroll(function () {
            curr_scroll = $(window).scrollTop();

            if ($(window).scrollTop() > 120) {
                $("#the-search-bar").addClass('search-bar-fixed');

              if ($(window).width() > 855) {
                  $("#fi-search-bar").addClass('fi-search-bar-fixed');
              }
            }

            if ($(window).scrollTop() < 121) {
                $("#the-search-bar").removeClass('search-bar-fixed');

              if ($(window).width() > 855) {
                  $("#fi-search-bar").removeClass('fi-search-bar-fixed');
              }
            }
        });

        $(window).resize(function () {
            var class_name = $("#fi-search-bar").attr('class');

            if ((class_name == "flex-item-search-bar fi-search-bar-fixed") && ($(window).width() < 856)) {
                $("#fi-search-bar").removeClass('fi-search-bar-fixed');
            }

            if ((class_name == "flex-item-search-bar") && ($(window).width() > 855) && (curr_scroll > 120)) {
                $("#fi-search-bar").addClass('fi-search-bar-fixed');
            }
        });

        var modal = document.getElementById('id01');

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
    </script>

</body>
</html>
