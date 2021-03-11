
<?php
	//include connection file 
	include_once("connection.php");
	 
	// initilize all variable
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		0 =>'id',
		1 =>'nume', 
		2 => 'code',
		3 => 'serv	',
		4 => 'sts',
		5 => 'data'

	);

	$where = $sqlTot = $sqlRec = "";

	// getting total number records without any search
	$sql = "SELECT a.id as Id, a.nume as 'Nume Utilizator',a.email as 'Email Utilizator', b.titlu as 'Titlu Tichet', c.descriere_categorie as 
	'Categorie', b.raspuns as 'Raspuns', b.mesaj as 'Mesaj Autor' ,
	case when b.status = 1 then 'Inchis'
		else 'Deschis'
		end as 'Status'
	from utilizator as a
				inner join tichete as b on a.nume = b.tichetautor
				inner join categorie as c on b.categorie = c.id
			";
	$sqlTot .= $sql;
	$sqlRec .= $sql;


 	$sqlRec .=  " ORDER BY a.nume";

	$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));


	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die("error to fetch employees data");

	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_row($queryRecords) ) { 
		$data[] = $row;
	}	

	$json_data = array(
			"draw"            => 1,   
			"recordsTotal"    => intval( $totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
			);

	echo json_encode($json_data);  // send data as json format
?>
	