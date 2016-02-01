<?php
// List of Experiences
$sql              = "SELECT `experience_item_id`,`experience_item_name`, `experience_item_desc` FROM `tams_experience_items` WHERE `experience_item_status` = 'active'";
$experience_items = DB::query($sql);




if(isset($_GET['talent_id']))
{
	$talent_id = $_GET['talent_id'];
}

$experience_sql    = "SELECT
*
FROM
tams_talent_experience
WHERE talent_id = $talent_id";

$talent_experience = DB::query($experience_sql);


?>
<form
	id="edit_talent_experience_info" name="edit_talent_experience_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id="<?php echo $talent_id; ?>" >
	<!-- Experience Information box -->
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">
				Experience Information
			</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box">
					<i class="fa fa-minus">
					</i>
				</button>
				<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
					<i class="fa fa-times">
					</i>
				</button>
			</div>
		</div>

		<div class="box-body bg-info">
			<div class="row">

				<?php
				if($experience_items )
				{
					?>

					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Experience Items :
						</label>
						<div class="col-md-9 col-sm-9">
						<div class="input-group">
						<select name="experience_item_id" id="experience_item_id" class=" input-group form-control  select2"  style="padding:5px;"  >
					
							<option value="">
								Select an experience item
							</option>
	
							<?php 
							foreach($experience_items as $item){
								?>	
							<option value="<?php echo $item['experience_item_id'];?>">
								<?php echo $item['experience_item_name'];?>
							</option>
							<?php
							} // for each experience item									
							?>

						</select>
						<div class="input-group-addon"> <button type="submit" class='btn btn-xs pull-right' name="save" value="save">
							Add &nbsp;
							<i class="fa fa-plus">
							</i>
					</button>
					</div>
						</div>
				
				 
					
					

					</div>
					<script type="text/javascript">
	$(".select2").select2();
	
</script>




					<?php

				}  // End if $experience_items

				?>


			</div> <!--/.row-->
			<div class="box-footer">
				<div class="form-group">
					<div class="col-sm-12">
						<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/view_talents"?>">
							Cancel &nbsp;
							<i class="fa fa-chevron-circle-right">
							</i>
						</a>
					</div>	<!-- /.col -->
				</div>		<!-- /form-group -->
				<small>
				</small>
			</div><!-- /.box-footer-->
		</div><!--/.box-body-->
	</div><!--Experience Information Box-->
	<!-- Hidden Fields -->
	<input type="hidden" name="form_name" id="experience_info_hidden_field" value="edit_talent_experience_info" />
	<input type="hidden" name="talent_id" id="experience_talent_id" value="edit_talent_experience_info" />
	<!-- /Hidden Fields -->
</form>