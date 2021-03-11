<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rapoarte</title>
    <link rel="stylesheet" type="text/css" href="../lib/semantic.min.css">
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
    <script src="../lib/semantic.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      


       <!-- Icons font CSS-->
       <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">





    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/style5.css">

		   
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  

    

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>



  </head>
  <body>


    <?php

    session_start();
    if(!isset($_SESSION['username'])){
      header("Location: logare.php");
      exit;
    }

     ?>

    <div class="ui huge menu">
      <a class="item" href="../index.php">
        Acasa
      </a>
      <a class="item" href="../adaugatichet.php">
        Scrie un tichet
      </a>
      <a class="item" href="../tichet.php">
        Lista tichete
      </a>
      <?php
      include('../database.php');
      $user = $_SESSION["username"];
      $abfrage = "SELECT id as id,  nume as username, email as email, parola as  password, grad as rank, ban as ban, raspunsuri as answers, status as status, inregistrat as reg_at FROM utilizator WHERE nume= '$user'";
      $ergebnis = mysqli_query($mysqli,$abfrage) or die(mysqli_error($mysqli));
      while($row = mysqli_fetch_array($ergebnis)){
        if($row["rank"] == 2){
          echo '<a class="item" href="../cont.php">
            Lista conturi
          </a>';
        }
      }
       ?>
        <?php
      include('../database.php');
      $user = $_SESSION["username"];
      $abfrage = "SELECT id as id,  nume as username, email as email, parola as  password, grad as rank, ban as ban, raspunsuri as answers, status as status, inregistrat as reg_at FROM utilizator WHERE nume= '$user'";
      $ergebnis = mysqli_query($mysqli,$abfrage) or die(mysqli_error($mysqli));
      while($row = mysqli_fetch_array($ergebnis)){
        if($row["rank"] == 2){
          echo '<a class="item" href="../categorie.php">
            Adaugă categorie
          </a>';
        }
      }
       ?>
       <?php
      $user = $_SESSION["username"];
      $abfrage = "SELECT id as id,  nume as username, email as email, parola as  password, grad as rank, ban as ban, raspunsuri as answers, status as status, inregistrat as reg_at FROM utilizator WHERE nume = '$user'";
      $ergebnis = mysqli_query($mysqli,$abfrage) or die(mysqli_error($mysqli));
      while($row = mysqli_fetch_array($ergebnis)){
        if($row["rank"] == 2){
          echo '<a class="item" href="rapoarte.php">
            Rapoarte
          </a>';
        }
      }
       ?>
      <div class="right menu">
        <a class="item" href="../edit.php">
          <?php echo $_SESSION['username'] ?>
        </a>
        <div class="item">
            <a class="ui primary button" href="../delogare.php">Iesi din cont</a>
        </div>
      </div>
    </div>


      </div>
     
      <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    

      <div class="card card-5">
                <div class="card-body">
    <?php


	
		 
            echo '<a href="ex1.php" class="btn btn--radius-2 btn--blue">
            Lista cu utilizatori activi
            </a>';
            echo '<a href="ex2.php" class="btn btn--radius-2 btn--blue">
            Lista cu tichete existente
			</a>';
		
			echo '<a href="ex3.php" class="btn btn--radius-2 btn--blue">
            Lista cu categoriile existente
            </a>';
    
			
 ?>

    </div>
    </div>
    <br><br>

    <div class="card card-6">
                <div class="card-body">



<div class="" style="padding:20px;20px;">
      <div class="input--style-4">
      
        <div class="">
		<table id="employee_grid" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="20%">Nume utilizator</th>
				<th width="20%">Email utilizator</th>
                <th width="20%">Titlu tichet</th>
                <th width="20%">Categorie tichet</th>
                

                <th width="20%">Raspuns</th>
                <th width="20%">Mesaj tichet</th>
                <th width="20%">Status</th>
                
            </tr>
        </thead>
 
        <tfoot>
            <tr>
            <th width="5%">ID</th>
                <th width="20%">Nume client</th>
				<th width="20%">Serviciu</th>
                <th width="20%">Nume speciaslist</th>
                <th width="20%">Data programare</th>

                <th width="20%">Raspuns</th>
                <th width="20%">Mesaj tichet</th>
                <th width="20%">Status</th>
                
                
            </tr>
        </tfoot>
    </table>
    </div>
      </div>

    </div>


      </div>
      </div>
    </div>






 <!-- jQuery CDN - Slim version (=without AJAX) -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>



    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>



<script type="text/javascript">
$( document ).ready(function() {
$('#employee_grid').DataTable({
		 "processing": true,
         "sAjaxSource":"response.php",
		 "dom": 'lBfrtip',
		 "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'excel',
                    'csv',
                    'print'
                ]
            }
        ]
        });
});
</script>


  </body>
</html>
