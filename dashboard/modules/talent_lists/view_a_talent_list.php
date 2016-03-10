<?php


$sql = 'SELECT * FROM tams_talent WHERE talent_id IN (
SELECT talent_id 
FROM tams_talent_list_items
GROUP BY talent_list_id)';
$sql .= 'LIMIT 20';
$get_talents = DB::query($sql);
?>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> 
          View Talent List
            <small>View All Talents in List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">View Talent List</li>
          </ol>
        </section>

        <!-- Main content -->
  <!-- Main content -->
        <section class="content">
<form id="view_talent_list" name="view_talent_list" class="form-horizontal" method="post" action="process_talent_lists.php?talent_list_id=<?php echo $talent_list_id; ?>" >
<!-- Default box -->
           <div class="box">
            <div class="box-header with-border">
             <h3 class="box-title">View Talent List</h3>
            <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div><!-- /box hearder close --> 
			
	
		<div class="box-body bg-info">
		<div class="row">

		<?php 
		foreach($get_talents as $talent) {  
					  
		?>			
	        <div class="col-md-4 col-sm-6" >
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $talent['first_name']." ".$talent['last_name']; ?></h3>
              <h5 class="widget-user-desc"><?php echo $talent['sex'].",&nbsp;". getAge($talent['dob']);  ?> Years</h5>
            </div>
            <div class="widget-user-image">
            <img class="img-circle" src="<?php echo $talent['photo1_url']; ?>"  alt="talent_photo"  />
            </div>
            <div class="box-footer">
            <div class="row">
            <?php
			$events = $talent['events'];
				if (is_null($events) OR $events == "" ) {
					$events = " - not set - ";
				} 
				elseif($events == 1 ){
					$events = "Yes";
				}
				else {
					$events ="No"; 
				} 

			
			?>
                  
              <ul class=" nav nav_stacked">
			   <li><h4>Nationality</h4></li>
			   <li ><?php echo $talent['nationality'];?></li>
                <li><h4>Professional Skills</h4></li>
                <li><?php echo list_talent_experience($talent['talent_id']);?></li>
                <li><h4>spoken Languages</h4></li>
                <li><?php echo list_talent_language($talent['talent_id']);?></li>
				<li><h4>Available for Events?</h4></li>
				<li><?php echo $events;?></li>
              </ul>
            </div>
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">

                    <span class="description-text">
					<a class='btn btn-warning btn-circle btn-lg' title="Remove" href ="process_delete_talent.php?action=delete_talent&id=<?php echo $talent['talent_id']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');"  >&nbsp;&nbsp;<span class='glyphicon glyphicon-trash'></span></a>
					</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <span class="description-text">
					<a class='btn btn-info btn-circle btn-lg' title="View Profile" href ="index.php?route=modules/talent/view_talent_profile&talent_id=<?php echo $talent['talent_id']; ?>">&nbsp;&nbsp;<span class='glyphicon glyphicon-user'></span></a>
					</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                 
                    <span class="description-text">
					<a class='btn btn-danger btn-circle btn-lg' title="Add to favourite" href ="index.php?route=modules/talent_lists/add_talent_to_list&talent_id=<?php echo $talent['talent_id']; ?>">&nbsp;&nbsp;<span class='glyphicon glyphicon-heart'></span></a>
					</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
					
			
<?php 
}		  

?>	
			</div> <!--.row-->
			</div> <!--.box-body-->
			</div><!-- /close box --> 
			</form>
			
			</section><!-- /close section --> 
			
<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="view_talent_list" />
					 
<!-- /Hidden Fields --> 
			