

<div class="row">
            <div class="col-sm-12">
                <div class="row">
                <div class="col-md-8">
                <div class="element-wrapper">
                    <div class="element-actions">
                    
<?php 
$retailer_account = "SELECT id FROM emp_login where user_role='customer' ";
$Total_emp = 0;
if ($result = mysqli_query($connection, $retailer_account)) {
    $Total_emp = mysqli_num_rows($result);
}

$retailer_account = "SELECT id FROM emp_login where user_role='customer' and status='1' ";
$Active_emp = 0;
if ($result = mysqli_query($connection, $retailer_account)) {
    $Active_emp = mysqli_num_rows($result);
}

$retailer_account = "SELECT id FROM emp_login where user_role='customer' and status='0' ";
$Deactive_emp = 0;
if ($result = mysqli_query($connection, $retailer_account)) {
    $Deactive_emp = mysqli_num_rows($result);
}

$retailer_account = "SELECT task_id FROM assign_task";
$Total_task = 0;
if ($result = mysqli_query($connection, $retailer_account)) {
    $Total_task = mysqli_num_rows($result);
}

$retailer_account = "SELECT task_id FROM assign_task where status='Open'";
$open_task = 0;
if ($result = mysqli_query($connection, $retailer_account)) {
    $open_task = mysqli_num_rows($result);
}


$retailer_account = "SELECT task_id FROM assign_task where status='WIP'";
$WIP_task = 0;
if ($result = mysqli_query($connection, $retailer_account)) {
    $WIP_task = mysqli_num_rows($result);
}

$retailer_account = "SELECT task_id FROM assign_task where status='Close'";
$close_task = 0;
if ($result = mysqli_query($connection, $retailer_account)) {
    $close_task = mysqli_num_rows($result);
}

$retailer_account = "SELECT task_id FROM assign_task where status='Cancel'";
$cancel_task = 0;
if ($result = mysqli_query($connection, $retailer_account)) {
    $cancel_task = mysqli_num_rows($result);
}?>
                    </div>
                    <h6 class="element-header">Welcome to Customer Dashboard <?php echo $_SESSION['emp_name'];?></h6>
                    <div class="element-content">
                        <div class="row">
                           
                        <div class="form-group"><label for="">Select a Service</label>
                                        <select id="emp_id" name="empid" class="form-control">
                                            <option>--service--<i class="fas fa-servicestack    "></i>--</option>
                                                                                                       <?php
                                                          
                 $qry = mysqli_query($connection, "SELECT * FROM emp_login where user_role='employee' and status='1'") or die("select query fail" . mysqli_error());
$count = 0;
while ($row = mysqli_fetch_assoc($qry)) {
    $count = $count + 1;
  
    $id = $row['id'];
            $emp_code = $row['emp_code'];
            $emp_name = $row['emp_name'];
        
            echo "<option value=".$id.">".$emp_code."/".$emp_name."</option>";
}?>
                                              
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group"><label for="">Task</label>
                                        <input class="form-control" name="task" placeholder="Enter Task" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-3">
    <div class="form-group">
        <label for="category">Category</label>
        <input class="form-control" name="category" placeholder="Enter Category" type="text">
    </div>
</div>
<div class="col-sm-3">
    <div class="form-group">
        <label for="nwords">No Of Words</label>
        <input class="form-control" name="nwords" placeholder="Enter no. of words" type="text">
    </div>
</div>

  <div class="col-sm-3">
                                    <div class="form-group"><label for="">File Attachment</label>
                                        <input name="file_attachment" type="file">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <br>
                                         <input class="btn btn-primary" type="submit" value="Place Order" name="submit">
                                        <!--<label for="">Conform Password</label>-->
                                        <!--<input class="form-control" name="CPSWD" placeholder="Conform Password" type="password">-->
                                    </div>
                                </div>




<!--                                <div class="form-buttons-w text-right">
                                    <input class="btn btn-primary" type="submit" value="Change Password" name="submit">
                                </div>-->
                            </div>
                        </form>
                            </div>
           
            </div>
        </div>
    </div>

                        <div class="col-sm-4 col-xxxl-3">
                                <a class="element-box el-tablo" href="placeorders.php">
                                    <div class="label">Place an order</div>
                                    <div class="value"><?php echo $close_task; ?></div>
 </a>
                            </div>
                           
                            
                            <div class="col-sm-4 col-xxxl-3">
                                <a class="element-box el-tablo" href="view-tickets.php">
                                    <div class="label">Tickets</div>
                                    <div class="value"><?php echo $close_task; ?></div>
 </a>
                            </div>
                            <div class="col-sm-4 col-xxxl-3">
                                <a class="element-box el-tablo" href="emp_assign_task_list_close.php">
                                    <div class="label">Sent to QA</div>
                                    <div class="value"><?php echo $close_task; ?></div>
 </a>
                            </div>
                            <div class="col-sm-4 col-xxxl-3">
                                <a class="element-box el-tablo" href="tickets.php">
                                    <div class="label">Raise a Ticket</div>
                                    <div class="value"><?php echo $WIP_task; ?></div>
                               </a>
                            </div>

                            <div class="col-sm-4 col-xxxl-3">
                                <a class="element-box el-tablo" href="assign_task_list_cancel.php">
                                    <div class="label">Cancel Task</div>
                                    <div class="value"><?php echo $cancel_task; ?></div>
                               </a>
                            </div>

<!--                            <div class="col-sm-4 col-xxxl-3">
                                <a class="element-box el-tablo" href="#">
                                    <div class="label">Approve</div>
                                    <div class="value"><?php echo $pan_Approve_count_row; ?></div>
                                </a>
                            </div>-->
                    
                        </div>
                           <div class="element-box">
<table class="dataTable table table-responsive">
                    <tr>
                        <th>S No.</th>
                        <!--<th>Emp Code</th>-->
                        <th>Writer Name</th>
                         <th>Mobile No</th>
                        <th>Total</th>    
                        <th>Open</th>                          
                            <th>WIP</th>                            
                            <th>Close</th>
                             <th>Cancel</th>
                              <!--<th>Date</th>-->
                              <!--<th>Status</th>-->
                               <!--<th>Edit</th>-->
                          <!--<th>Delete</th>-->
                    </tr>
                                                               <?php
                 $qry = mysqli_query($connection, "SELECT * FROM emp_login where user_role='employee'") or die("select query fail" . mysqli_error());
$count = 0;
while ($row = mysqli_fetch_assoc($qry)) {
    $count = $count + 1;
  
    $id = $row['id'];
            $emp_code = $row['emp_code'];
            $emp_name = $row['emp_name'];
            $user_id = $row['user_id'];
            $pswd = $row['pswd'];
            $status = $row['status'];
            $created = $row['created'];
            $user_role = $row['user_role'];
            $emp_pro = $row['emp_pro'];
            $email_id = $row['email_id'];
            $emp_mob = $row['emp_mob'];
     $status = '';
    $btnClass = '';
    if ($row['status'] == '1') {
        $btnClass = "btn  btn-success btn-sm";
        $status = "Active";
    } else {
        $status = "Deactive";
        $btnClass = "btn btn-danger btn-sm";
    }
        $retailer_account = "SELECT task_id FROM assign_task where emp_id='$id'";
$Total_task = 0;
if ($result = mysqli_query($connection, $retailer_account)) {
    $Total_task = mysqli_num_rows($result);
}

    
    $retailer_account = "SELECT task_id FROM assign_task where status='Open' and  emp_id='$id'";
$open_task = 0;
if ($result = mysqli_query($connection, $retailer_account)) {
    $open_task = mysqli_num_rows($result);
}


$retailer_account = "SELECT task_id FROM assign_task where status='WIP' and  emp_id='$id'";
$WIP_task = 0;
if ($result = mysqli_query($connection, $retailer_account)) {
    $WIP_task = mysqli_num_rows($result);
}

$retailer_account = "SELECT task_id FROM assign_task where status='Close' and  emp_id='$id'";
$close_task = 0;
if ($result = mysqli_query($connection, $retailer_account)) {
    $close_task = mysqli_num_rows($result);
}

$retailer_account = "SELECT task_id FROM assign_task where status='Cancel' and  emp_id='$id'";
$cancel_task = 0;
if ($result = mysqli_query($connection, $retailer_account)) {
    $cancel_task = mysqli_num_rows($result);
}
    ?>
                    <tr>
  <td><?php echo $count;?></td>
<!--  <td><?php echo $emp_code;?></td>-->
  <td><?php echo  $emp_code."/".$emp_name;?></td>
  <td><?php echo $emp_mob;?></td> 
<!--  <td><?php echo $email_id;?></td> -->
   <td><a href="#" class="btn btn-primary"><?php echo $Total_task;?></a></td> 
  <td><a href="admin_assign_task_list.php?status=Open&Emp_ID=<?php echo $id;?>" class="btn btn-primary"><?php echo $open_task;?></a></td> 
  <td><a href="admin_assign_task_list.php?status=WIP&Emp_ID=<?php echo $id;?>" class="btn btn-primary"><?php echo $WIP_task;?></a></td> 

    <td><a href="admin_assign_task_list.php?status=Close&Emp_ID=<?php echo $id;?>" class="btn btn-primary"><?php echo $close_task;?></a></td> 
        <td><a href="admin_assign_task_list.php?status=Cancel&Emp_ID=<?php echo $id;?>" class="btn btn-primary"><?php echo $cancel_task;?></a></td> 
    <!--<td> <img src="user_profile/<?php echo $emp_pro;?>" height="80px" width="80px"></td>--> 
      <!--<td><?php echo $created;?></td>--> 
      <!--<td><a href="employee.php?id=<?php echo $row['id']; ?>&Status=<?php echo $row['status']; ?>" class="<?php echo $btnClass; ?> " ><?php echo $status; ?></a></td>-->
    <!--<td><a class="btn btn-primary" href="employee.php?source=update_emp&emp_id=<?php echo $id;?>">Edit</a></td>-->
                              <!--<td><a class="btn btn-danger" href="employee.php?delete=<?php echo $id;?>">Delete</a></td>-->
                    </tr>
<?php }?>
                </table>
   </div>
                    </div>
                </div>
          </div> 
                <div class="col-md-4">
                      <!--------------------
    START - Sidebar
    -------------------->
    <div class="content-panel">
        <div class="content-panel-close"><i class="os-icon os-icon-close"></i></div>
        <div class="element-wrapper">
            <h6 class="element-header">Quickk Links</h6>
            <div class="element-box-tp">
                <div class="el-buttons-list full-width">
                   
                    <a class="btn btn-white btn-sm" href="all-tickets.php">
                        <i class="os-icon os-icon-delivery-box-2"></i><span>Tickets</span>
                    </a>
                    <!--<a class="btn btn-white btn-sm" href="download.php">
                        <i class="os-icon os-icon-delivery-box-2"></i><span>Submit the Document</span>
                    </a>-->
                   
                   

                </div>
            </div>
        </div>

    </div>
    <!--------------------
    END - Sidebar
    -------------------->
                </div>
            </div>
            </div>
        </div>    