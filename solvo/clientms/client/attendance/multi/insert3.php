<?php

//insert.php


//$connect = new PDO("mysql:host=localhost;dbname=sachive_data", "root", "");
require('conn.php');
 $query = "
INSERT INTO tbl_disburse 
(panchayat_name, name,ifc_code,account_no,month_of_sal,fta,gred_pay,basic,da,ddo_code,s_id,tot_da,total_amount
  ,total_days,present,total_tax_d,Income_tax,other_ded,per_of_salary,sal_ded,net_sal,year,tvr_no,tvr_date,bill_no,bill_date,fin_year,final_total,
  status,bill_type,nps_ded) 
VALUES (:panchayat_name, :name,:ifc_code,:account_no,:month_of_sal,:fta,:gred_pay,:basic,:rate_of_da,:ddo,
	:s_id,:tot_da,:total_amount,:total_days,:present,:total_tax_d,:Income_tax,:other_ded,:per_of_salary,:sal_ded,
  :net_sal,:year,:tvr_no,:tvr_date,:bill_no,:bill_date,:fin_year,:final_total,:status,:bill_type,:nps_ded)
";

for($count = 0; $count<count($_POST['panchayat_name']); $count++)
{

	    
	    
                
	$data = array(
		':panchayat_name'	=>	$_POST['panchayat_name'][$count],
		':name'	=>	$_POST['name'][$count],
		 ':ifc_code'	=>	$_POST['ifc_code'][$count],
		':account_no'	=>	$_POST['account_no'][$count],
      	':ddo'	=>	$_POST['ddo'][$count],
		':basic'	=>	$_POST['basic'][$count],
		':gred_pay'	=>	$_POST['gred_pay'][$count],
		':rate_of_da'	=>	$_POST['rate_of_da'][$count],
		 ':fta'	=>	$_POST['fta'][$count],
         ':month_of_sal'         => $_POST['month_of_sal'][$count],

         ':tot_da'         => $_POST['tot_da'][$count],
         ':total_amount'         => $_POST['total_amount'][$count],
          ':total_days'         => $_POST['total_days'][$count],
          ':present'         => $_POST['present'][$count],
          ':total_tax_d'         => $_POST['total_tax_d'][$count],
           ':Income_tax'         => $_POST['Income_tax'][$count],
            ':other_ded'         => $_POST['other_ded'][$count], 
            ':per_of_salary'         => $_POST['per_of_salary'][$count], 
            ':sal_ded'         => $_POST['sal_ded'][$count],
            ':net_sal'         => $_POST['net_sal'][$count],
            ':year'         => $_POST['year'][$count],

            ':tvr_no'         => $_POST['tvr_no'],
            ':tvr_date'         => $_POST['tvr_date'],
            ':bill_no'         => $_POST['bill_no'],
            ':bill_date'         => $_POST['bill_date'],
            ':fin_year'         => $_POST['fin_year'],
             ':final_total'         => $_POST['final_total'][$count],
 ':status'         => $_POST['status'][$count],

 ':nps_ded'         => $_POST['nps_ded'][$count],

   ':bill_type'  => 'stop vetan bill',
         ':s_id'         =>$_POST['s_id'][$count]

      );



 
	$statement = $connect->prepare($query);
	echo $statement->execute($data);
	if($statement)
{
require('conn1.php');
$query2="DELETE FROM tbl_sachive_account_from_stop ";
    $result= mysqli_query($con,$query2);

}		
  
}

?>