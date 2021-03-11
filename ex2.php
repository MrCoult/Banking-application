<?php
require('mysql_table.php');


if(!isset($_SESSION)) {
	session_start();
}

if (isset($_SESSION['loggedIn_cust_id'])) {

	$sql11 = "SELECT ben.benef_id as 'ID',CONCAT(customer.first_name,' ',customer.last_name) as 'NUME',ben.email as 'EMAIL',ben.account_no AS 'IBAN'  FROM beneficiary".$_SESSION['loggedIn_cust_id']." as ben 
	inner join customer on ben.benef_cust_id = customer.cust_id";;

}





class PDF extends PDF_MySQL_Table
{
function Header()
{
	// Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'Raport cu lista de prieteni asociati',0,1,'C');
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
$pdf->Table($link,$sql11);


$pdf->Output();
?>
