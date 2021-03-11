<?php
require('mysql_table.php');

if(!isset($_SESSION)) {
	session_start();
}
	

if (isset($_GET['cust_id'])) {
	$_SESSION['cust_id'] = $_GET['cust_id'];
}

$sql0 = "SELECT trans_id as 'ID',trans_date as 'Data',remarks as 'MENTIUNE', debit as 'DEBIT', credit as 'CREDIT',balance as 'BALANTA' FROM passbook".$_SESSION['cust_id'];

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



class PDF extends PDF_MySQL_Table
{
function Header()
{
	// Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'Raport cu tranzactiile efectuate',0,1,'C');
	$this->Ln(10);
	// Ensure table header is printed
	parent::Header();
}
}

// Connect to database
$link = mysqli_connect('localhost','root','','bank');

$pdf = new PDF();
$pdf->AddPage();
// First table: output all columns
$pdf->Table($link, $sql0);







$pdf->Output();
?>



