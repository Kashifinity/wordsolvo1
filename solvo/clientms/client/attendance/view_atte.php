<body>

  <header>
  <ul><li>Employee Attedence Management System</li>
   <a href="http://localhost/mtest/index.php">   <li>Home</li></a>
    <!-- <li>Blog</li>
    <li>Join Us</li>
    <li>About</li> -->
</header>

<br><br><br><br><br><br><br><br><br><br><br><br>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      
     <input type="date" id="date1" name="date1" class="form_control"> To
     <input type="date" id="date2" name="date2" class="form_control"> <input type="submit" name="batan" value="Search by Date" class="btn btn-success" onclick="return myfun()">
    </div>
    <div class="col-sm-6">
      
     
    </div>
  </div>
</div>
  
 
  
  

<div class="container"><div class="row"><br>
<div class="col-md-12">

<div id="showreport1"></div>

  <form id="user_form"> <!-- <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Save attedence"  />  -->
<table class="table table-striped">
	<caption><h1><b>Total Attedence</b></h1></caption>
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
    
   <?php 

   $host = 'localhost';
$username = 'root';
$db = 'attedence_mgmt';
$pass = '';

$con = mysqli_connect($host,$username,$pass,$db);
 $u_id = $_REQUEST['id'];
 $select = "select * from emp_tbl JOIN attedence_tbl ON emp_tbl.id=$u_id  AND attedence_tbl.emp_id=$u_id  WHERE attedence_tbl.attedence='p'";
$r = mysqli_query($con,$select);
$n = 0;

while ($row2 = mysqli_fetch_array($r)) { 
  $n++;
  $name =  $row2 ['name']; 
 }



$select1 = "select * from emp_tbl JOIN attedence_tbl ON emp_tbl.id=$u_id  AND attedence_tbl.emp_id=$u_id  WHERE attedence_tbl.attedence='A'";
$r1 = mysqli_query($con,$select1);
$A = 0;

while ($row2 = mysqli_fetch_array($r1)) { 
  $A++;
   
 }

 $select2 = "select * from emp_tbl JOIN attedence_tbl ON emp_tbl.id=$u_id  AND attedence_tbl.emp_id=$u_id  WHERE attedence_tbl.attedence='H'";
$r2 = mysqli_query($con,$select2);
$H = 0;

while ($row2 = mysqli_fetch_array($r2)) { 
  $H++;
   
 }

  $select3 = "select * from emp_tbl JOIN attedence_tbl ON emp_tbl.id=$u_id  AND attedence_tbl.emp_id=$u_id  WHERE attedence_tbl.attedence='F'";
$r3 = mysqli_query($con,$select3);
$F = 0;

while ($row2 = mysqli_fetch_array($r3)) { 
  $F++;
   
 }





   ?>
 
    
  
  <tbody>
      <tr>
        <td>1</td>
      
        <td><?php echo $name ?></td>
         <input type="hidden" name="name" value="<?php echo $name ?>" class="first_name">

         <td><?php echo $n ?></td>
          <td> <?php echo $A ?></td>
        <td> <?php echo $H ?></td>
        <td><?php echo $F ?></td>


       <td>        </td>

        
      </tr>
   
    
 </tbody>
  </table></form></div></div></div>
</body>
</html>



<script type="text/javascript">

function myfun(){


var date1 =$('#date1').val();
var date2 =$('#date2').val();
var id = <?php echo $u_id ?>

 // alert(id);


$.ajax({


          type:'POST',


          data:{'date1':date1,'date2':date2,'id':id},


          url:'http://localhost/mtest/multi/ajax_fetch.php',

          success:function(result){

               // alert(result)

          $('#showreport1').html(result);

           }

          });



          }



</script>
