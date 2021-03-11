<?php
require('mysql_table.php');


if(!isset($_SESSION)) {
	session_start();
}

if (isset($_SESSION['loggedIn_cust_id'])) {

	$sql111 = "SELECT trans_id as 'ID', trans_date as 'DATA', remarks as 'MENTIUNE', debit as 'DEBIT', credit as 'CREDIT', balance as 'BALANTA' FROM passbook".$_SESSION['loggedIn_cust_id']." where remarks IN ('Depozit la bancomat', 'Retragere la bancomat')";


}



class PDF extends PDF_MySQL_Table
{
function Header()
{
	// Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'Raport cu operatiunile efectuate la bancomat',0,1,'C');
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
$pdf->Table($link,$sql111);


$pdf->Output();
?>
