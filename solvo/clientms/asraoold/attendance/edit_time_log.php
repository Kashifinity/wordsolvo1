<?php include ("db_connect.php"); ?>
<?php
$date = explode('_',$id);
$lt_arr = array(1 => " Time-in AM",2=>"Time-out AM",3 => " Time-in PM",4=>"Time-out PM");
$dt = date("Y-m-d",strtotime($date[1]));
$emp = $conn->query("SELECT concat( ',firstname,' ',middlename) as enamem,employee_no from employee where id =".$date[0])->fetch_array()['ename'];
$qry = $conn->db->query("SELECT * FROM attendance where employee_id = '".$date[0]."' and date(datetime_log) ='$dt' order by UNIX_TIMESTAMP(datetime_log) asc ");
while($row=$qry->fetch_assoc()){
	if($row['log_type'] == 1 || $row['log_type'] == 2){
		if(isset($att[$row['log_type']]))
			$att[$row['log_type']] = $row;
	}else{
			$att[$row['log_type']] = $row;
	}
}
?>
<div class="container-fluid">
	<div class="col-ld-12">
		<div class="row">
			<h4><b><?php echo ucwords($emp['ename']).' | '.$emp['employee_no'] ?></b></h4>
		</div>
		<hr>
		<?php foreach($att as $k => $v): ?>
		<div class="row">
			<p><b><?php echo $lt_arr[$k] ?></b></p>
		</div>
		<hr>
		<div class="row form-group">
			<div class="col-md-4">
				<select name="hour" id="hour" class="form-control">
				<?php
				for ($i = 0; $i <= 23; $i++) {
					for ($j = 0; $j < 60; $j += 15) {
						$time = str_pad($i, 2, '0', STR_PAD_LEFT) . ':' . str_pad($j, 2, '0', STR_PAD_LEFT);
						echo '<option value="' . $time . '">' . $time . '</option>';
					}
				}
				?>
				</select>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<style>
	#uni_modal .modal-header{
		display: none
	}
</style>