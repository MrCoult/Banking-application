<?php
require('mysql_table.php');

if(!isset($_SESSION)) {
	session_start();
}


	$sql0 = "SELECT id as 'ID notificare',  title as 'NOTIFICARE', created as 'DATA TRIMITERE' from news";



class PDF extends PDF_MySQL_Table
{
function Header()
{
	// Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'Raport cu lista de notificari',0,1,'C');
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



