<link rel="stylesheet" href="css/style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />

  </link> 

<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } 
     ?>

<body>
<div class="page-container">
<div class="left-content">
			<div class="inner-content">
      <div class="outter-wp">
					<!--sub-heard-part-->
					<!--//sub-heard-part-->
		<div class="graph-visual tables-main" id="exampl">
				
    
<?php include_once('includes/sidebar.php');?>

<div class="clearfix"></div>		

	
<div class="container">
  <div class="row">
        <div class="col-lg-6">
      <input type="submit" name="btn" class="col-lg-6"value="Today Date : <?php echo date('d-m-Y') ?>" class="form-control btn btn-success"> <br><br>
     <a href="multi/delete_rec_bydate.php"> <input class="col-lg-6" type="submit" name="btn" value="Today Attendance  (<?php echo date('d-m-Y') ?>)  Reset" class="form-control btn btn-danger" onclick="return confirm('Are you sure want to reset attedence?') "></a> 
    </div>
  </div>
</div>
  
 
  
  
<?php 

$host = 'localhost';
$username = 'root';
$db = 'attedence_mgmt';
$pass = '';

$con = mysqli_connect($host,$username,$pass,$db);
if(isset($_REQUEST['btn']))
{

$name = $_REQUEST['fname'];



$q = "insert into emp_tbl (name) values('$name')";

$r = mysqli_query($con,$q);

$n = mysqli_affected_rows($con);
if($n)
{
  echo "<script>alert('reg sucessfully')</script>";
}

}

$select = 'select * from emp_tbl';

$r = mysqli_query($con,$select);
$n = 0;

?> 

<div class="container"><div class="row"><br>
<div class ="col-lg-4"><form id="user_form"> <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Save attedence"  /> 
<table class="table table-striped">
    <thead>
      <tr>
        <th>Sn mo</th>
        <th>Name</th>
        <th>Present</th>
        <th>Absent</th>
        <th>Half Day</th>
        <th>full day/application</th>
        <th>Today(<?php echo date('d-m-Y') ?>) Status</th>
       </tr>
    </thead>
    

 <?php
 error_reporting(0);
 while ($row2 = mysqli_fetch_array($r)) { 
  $n++;
 
 $u_id  = $row2 ['id'];
 $originalDate = date('d-m-Y');

  $select1 = "select * from   attedence_tbl where emp_id = '$u_id' and date1 = '$originalDate'";

$r1 = mysqli_query($con,$select1);
 
 while ($row3 = mysqli_fetch_array($r1)) { 
  $attede = $row3['attedence'];
 }
?>
    
  
  <tbody>
      <tr>
        <td><?php echo $n ?></td>
        <input type="hidden" name="emp_id[]" value="<?php echo $row2 ['id'] ?> " class="first_name">
        <td><?php echo $row2['name'] ?></td>
         <input type="hidden" name="name[]" value="<?php echo $row2 ['name'] ?>" class="first_name">

         <td><input type="checkbox" class="Present <?php echo $row2 ['id'] ?>" name="attedence[]" id ="<?php echo $row2 ['id'] ?>"  value="P" required></td>
          <td><input type="checkbox" class="Present <?php echo $row2 ['id'] ?>" name="attedence[]" id ="<?php echo $row2 ['id'] ?>" value="A" required></td>
        <td><input type="checkbox" class="Present <?php echo $row2 ['id'] ?>" name="attedence[]" id ="<?php echo $row2 ['id'] ?>"  value="H" required></td>
        <td><input type="checkbox" class="Present <?php echo $row2 ['id'] ?>" name="attedence[]" id ="<?php echo $row2 ['id'] ?>"  value="F" required></td>


       <td> <?php if($attede == '') { ?>

      <button type="button" class="btn btn-warning">Today Attendance Not Save in Database </button>
      <?php } else { ?> 


      <?php if($attede == 'P') { ?>

          <button type="button" class="btn btn-success">Present</button>
       <?php } ?>
  
<?php  if($attede == 'H') { ?>
       <button type="button" class="btn btn-primary">Half Day</button>
         <?php } ?>

<?php  if($attede == 'A') { ?>
      <button type="button" class="btn btn-danger">Absent</button>
       <?php } ?>
       <?php if($attede == 'F') { ?>

      <button type="button" class="btn btn-warning">full day/application</button>
      <?php } ?>

      <?php if($attede == '') { ?>

      <button type="button" class="btn btn-warning">save attedednce</button>
      <?php }} ?>
       </td>

      </tr>
      
<?php 
       


}
?>
 </tbody>
  </table></form></div></div></div>

  <?php include 'footer.php'; ?>
</body>
</html>

<script>  
$(document).ready(function(){ 
var count = 0;
$('#user_form').on('submit', function(event){

event.preventDefault();
var count_data = 0;
$('.first_name').each(function(){
count_data = count_data + 1;
});
if(count_data > 0)
{
var form_data = $(this).serialize();
$.ajax({
url:"multi/insert.php",
method:"POST",
data:form_data,
success:function(data)
{  
 (data)
if(data==0)
 {
   alert('you have already attedence save in this date')
  } 
  else alert('attedence save successfully')   
    window.location.reload()
}
})
}
});
});  

</script>

<script type="text/javascript">
  function myfunn(){
    $(".Present:checked").each(function(){
   var id = ($(this).attr('id'));
   var val = ($(this).attr('value'));
   $.ajax({
url:"multi/insert1.php",
method:"POST",
data:{'id':id,'val':val},
success:function(data)
{  
 alert(data)
 if(data>1)
 {
   alert('you have already attedence save in this date')
  } 
  else alert('attedence save successfully')  
}
})  
});

  


  }


 $('input:checkbox').click(function(){
   var id = ($(this).attr('id'));
   // alert(id)
    var $inputs = $("#id")
        if($(this).is(':checked')){
            // $("."+id).prop('disabled', true); // <-- disable all but checked one
             $("."+id).not(this).prop('disabled',true);
        }else{
           // $inputs.prop('disabled',false); // <--
           $("."+id).prop('disabled', false);
        }
    })
</script>

