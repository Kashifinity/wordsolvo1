

<?php    

 $date1 = $_POST['date1'];
 $date2 = $_POST['date2'];
  $id = $_POST['id'];

$originalDate1 = $date1;
$newDate1 = date("d-m-Y", strtotime($originalDate1));

$originalDate2 = $date2;
$newDate2 = date("d-m-Y", strtotime($originalDate2));

include "conn1.php";
 $select3 = "select * from emp_tbl JOIN attedence_tbl ON emp_tbl.id=1 AND attedence_tbl.emp_id=".$id." WHERE attedence_tbl.attedence='p' and attedence_tbl.date1 BETWEEN '".$newDate1."' AND '".$newDate2."' ";

          $data13 = mysqli_query($con,$select3);
           $n = 0;
                while ($row2 = mysqli_fetch_array($data13)) { $n++;

                  $name =  $row2 ['name']; }



$select4 = "select * from emp_tbl JOIN attedence_tbl ON emp_tbl.id=1 AND attedence_tbl.emp_id=".$id." WHERE attedence_tbl.attedence='A' and attedence_tbl.date1 BETWEEN '".$newDate1."' AND '".$newDate2."' ";

          $data14 = mysqli_query($con,$select4);
           $A = 0;
                while ($row4 = mysqli_fetch_array($data14)) { $A++;

                   }



                   $select1 = "select * from emp_tbl JOIN attedence_tbl ON emp_tbl.id=1 AND attedence_tbl.emp_id=".$id." WHERE attedence_tbl.attedence='H' and attedence_tbl.date1 BETWEEN '".$newDate1."' AND '".$newDate2."' ";

          $data1 = mysqli_query($con,$select1);
           $H = 0;
                while ($row1 = mysqli_fetch_array($data1)) { $H++;

                   }

                    $select2 = "select * from emp_tbl JOIN attedence_tbl ON emp_tbl.id=1 AND attedence_tbl.emp_id=".$id." WHERE attedence_tbl.attedence='F' and attedence_tbl.date1 BETWEEN '".$newDate1."' AND '".$newDate2."' ";

          $data2 = mysqli_query($con,$select2);
           $F = 0;
                while ($row1 = mysqli_fetch_array($data2)) { $F++;

                   }




                  ?>
                 



<table class="table table-striped">
    <caption><h1><b> Attedence Between <?php echo $newDate1 ?> To <?php echo $newDate2 ?> </b></h1></caption>
    <thead>
      <tr>
        <th>Sn No</th>
        <th>Name</th>
        <th>Present</th>
        <th>Absent</th>
        <th>Half Day</th>
        <th>full day/application</th>
        <!-- <th>Today(<?php echo date('d-m-Y') ?>) Status</th> -->
        <!-- <th>View</th> -->
      </tr>
    </thead>
    
            
                     

                    
                       
  <tbody>
      <tr>
        <td>1</td>
      
        <td><?php echo $name ?></td>
         

         <td><?php echo $n ?></td>
          <td> <?php echo $A ?></td>
        <td> <?php echo $H ?></td>
        <td><?php echo $F ?></td>


       <td>        </td>

        
      </tr>
   
    
 </tbody>
  </table>


                
        

                      </table>  