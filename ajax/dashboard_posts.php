<?php 
include '../core/config.php';
$dp_date = $_POST['dp_date'];
$fetch_dp = $mysqli->query("SELECT * FROM posts WHERE DATE_FORMAT(date_added, '%Y-%m-%d')='$dp_date' ORDER BY date_added DESC") or die(mysqli_error());

if(mysqli_num_rows($fetch_dp)>0){
	while ($dp_row = $fetch_dp->fetch_array()) {
?>
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample<?= $dp_row['post_id']?>" class="d-block card-header py-3" data-toggle="collapse"
            role="button" aria-expanded="true" aria-controls="collapseCardExample<?= $dp_row['post_id']?>">
            <h5 class="m-0 font-weight-bold text-primary">Title: <?= $dp_row['title']?> </h5>
            <div class="font-weight-bold" style="font-size: 10px;color:#8f8b8b;">Author: <?= userFullName($dp_row['user_id']) ?></div>
            <div class="font-weight-bold" style="font-size: 10px;color:#8f8b8b;">Date: <?=date("F j, Y H:i A",strtotime($dp_row['date_added']));?></div>
        	
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample<?= $dp_row['post_id']?>">
            <div class="card-body">
               <?= $dp_row['content']?>
            </div>
        </div>
    </div>
<?php }?>
<?php }else{ ?>
    <br><br><br><br><br>
	<center><h3><strong>No post found on this day.</strong></h3></center>
<?php }?>