<?php
//reset all the form fields
$first_name                = "";
$last_name                 = "";
$dob                       = "";
$sex                       = "";
$address                   = "";
$mobile_no                  = "";
$email_id                  = "";
$nationality               = "";
$passport_no               = "";
$qatari_id                 = "";
$is_qatari                 = 0;
$passport_copy_attached    = 0;
$noc_required              = 0;
$noc_copy_attached         = 0;
$sponsors_id_copy_attached = 0;
$message = "";

if(isset($_GET['talent_id'])){
	$talent_id = $_GET['talent_id'];

		$sql = "SELECT
				*
				FROM
				tams_talent
				WHERE talent_id = $talent_id ;";
$talent= DB::queryFirstRow($sql);
$talent_id = $talent['talent_id'];
$first_name = $talent['first_name'];
$last_name = $talent['last_name'];
$dob = $talent['dob'];
$sex = $talent['sex'];
$address = $talent['Address'];
$mobile_no = $talent['mobile_no'];
$email_id = $talent['email_id'];
$nationality = $talent['nationality'];
$passport_no = $talent['passport_no'];
$qatari_id   = $talent['qatari_id'];
$is_qatari   = $talent['is_qatari'];
$passport_copy_attached  = $talent['passport_copy_attached'];
$noc_required     = $talent['noc_required'];
$noc_copy_attached   = $talent['noc_copy_attached'];
$sponsors_id_copy_attached = $talent['sponsors_id_copy_attached'];
$talent_status = $talent['talent_status']; 
$created_on = $talent['created_on'];
$created_by = $talent['created_by'];
$last_modified_by = $talent['last_modified_by'];
$last_modified_on = $talent['last_modified_on'];

}
if(isset($_POST['save']))
{
 
$talent_id = $_POST['talent_id'];
$talent_id = $_POST['talent_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$sex = $_POST['sex'];
$address = $_POST['address'];
$mobile_no = $_POST['mobile_no'];
$email_id = $_POST['email_id'];
$nationality = $_POST['nationality'];
$passport_no = $_POST['passport_no'];
$qatari_id   = $_POST['qatari_id'];
$is_qatari   = $_POST['is_qatari'];
$passport_copy_attached  = $_POST['passport_copy_attached'];
$noc_required     = $_POST['noc_required'];
$noc_copy_attached   = $_POST['noc_copy_attached'];
$sponsors_id_copy_attached = $_POST['sponsors_id_copy_attached'];
$talent_status = $_POST['talent_status']; 
$last_modified_by = $_SESSION['user_id'];
$last_modified_on = getDateTime(NULL,"mySQL");
 
	if($talent_id <> ""){
		$update = DB::update('tams_talent', array(
			
			'first_name'=> $first_name,
			'last_name'=> $last_name, 
			'dob' => $dob,
			'sex' => $sex,
			'address' => $address,
			'mobile_no' => $mobile_no,
			'email_id' => $email_id,
			'nationality' => $nationality,
			'passport_no' => $passport_no,
			'qatari_id' => $qatari_id,
			'is_qatari' => $is_qatari,
			'passport_copy_attached' => $passport_copy_attached,
			'noc_required' => $noc_required,
			'noc_copy_attached'=> $noc_copy_attached,
			'sponsors_id_copy_attached' => $sponsors_id_copy_attached,
			'talent_status' => $talent_status,
			'last_modified_by'	=> $last_modified_by,
			'last_modified_on'	=> $last_modified_on
			),
			"talent_id=%s", $talent_id
		);
		
		if($update)
		{
			echo '<script>alert("Edited Details Successfully");</script>';
			echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/talent/view_talents");</script>';
		}
	}
	 
echo "<pre>";
print_r($_POST);
echo "</pre>";
 
}
?>

<!--   Content Header (Page header) -->
<section class="content-header">
	<h1>
		Edit Talent Profile

		<small>
			Editing Talent Profile
		</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="fa fa-dashboard">
				</i>Home
			</a>
		</li>
		<li class="active">
			Edit Talent Profile
		</li>
	</ol>
</section>

<!-- Main content -->
<section   class="content">
	<div class="row">

		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">
					Editing <?php echo $talent['first_name']; ?> Profile
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
 				<div class="box-body">
					<div class="row">
<div class="col-xs-3"> <!-- required for floating -->
					  <!-- Nav tabs -->
					  <ul class="nav nav-tabs tabs-left">
					    <li class="active"><a href="#basic" data-toggle="tab">Basic Info </a></li>
					<li><a href="#contact" data-toggle="tab">Contact</a></li>
					  <li><a href="#employbility" data-toggle="tab">Employbility </a></li> 	
					    <li><a href="#vitals" data-toggle="tab">Vitals</a></li>
					    <li><a href="#photos" data-toggle="tab">Photos</a></li>
					    <li><a href="#experience" data-toggle="tab">Experience</a></li>
					    <li><a href="#languages" data-toggle="tab">Spoken Languages</a></li>
					    <li><a href="#portfolio" data-toggle="tab">Portfolio</a></li>
					    <li><a href="#notes" data-toggle="tab">Notes</a></li>
					    <li><a href="#histoy" data-toggle="tab">History</a></li>
					  </ul>
</div>					
<div class="col-xs-9">
  <!-- Tab panes -->
  <div class="tab-content">
					  <!-- Basic Information Tab Panel Start -->
					    <div class="tab-pane active" id="basic">
<?php include("includes/inc_talent_basic.php"); ?>
						</div><!-- /.col-md-6 -->
					  <!-- Contact Information Tab Panel Start -->
					    <div class="tab-pane active" id="contact">
<?php include("includes/inc_talent_contact.php"); ?>
						</div><!-- /.col-md-6 -->
					<!-- Employability Information Tab Panel Start -->
					    <div class="tab-pane active" id="employbility">
<?php include("includes/inc_talent_employbility.php"); ?>
						</div><!-- /.col-md-6 -->
				<!-- Vitals Information Tab Panel Start -->
					    <div class="tab-pane active" id="vitals">
<?php include("includes/inc_talent_vitals.php"); ?>
						</div><!-- /.col-md-6 -->
				<!-- Photos Information Tab Panel Start -->
					    <div class="tab-pane active" id="photos">
<?php include("includes/inc_talent_photos.php"); ?>
						</div><!-- /.col-md-6 -->
				<!-- Experience Information Tab Panel Start -->
					    <div class="tab-pane active" id="experience">
<?php include("includes/inc_talent_experience.php"); ?>
						</div><!-- /.col-md-6 -->
				<!-- Languages Information Tab Panel Start -->
					    <div class="tab-pane active" id="languages">
<?php include("includes/inc_talent_languages.php"); ?>
						</div><!-- /.col-md-6 -->
				<!-- Portfolio Information Tab Panel Start -->
					    <div class="tab-pane active" id="portfolio">
<?php include("includes/inc_talent_portfolio.php"); ?>
						</div><!-- /.col-md-6 -->
				<!-- Notes Information Tab Panel Start -->
					    <div class="tab-pane active" id="notes">
<?php include("includes/inc_talent_notes.php"); ?>
						</div><!-- /.col-md-6 -->
				<!-- History Information Tab Panel Start -->
					    <div class="tab-pane active" id="history">
<?php include("includes/inc_talent_history.php"); ?>
						</div><!-- /.col-md-6 -->

	 
<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="talent_form_step_1" />
<!-- /Hidden Fields -->

				</div><!-- /.box-body -->
				<div class="form-group">
					<div class="col-sm-12">
						<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/view_talents"?>">
							Cancel &nbsp;
							<i class="fa fa-chevron-circle-right">
							</i>
						</a>
						<button style="margin-right:10px;" type="submit" class='btn btn-success btn-lg pull-right' name="save" value="save">
							Save &nbsp;
							<i class="fa fa-chevron-circle-right">
							</i>
						</button>
					</div>	<!-- /.col -->
				</div>		<!-- /form-group -->
					    </div><!-- Basic Information Form End -->
 
	</div>
		 <?php echo $message; ?> 
</div>					    
					 
					</div> <!-- /.row -->
				</div><!-- /.box-body -->
			 
			<div class="box-footer">
				<small>
				</small>
			</div><!-- /.box-footer-->
		</div><!-- /.box -->

	</div><!-- /.row -->

</section><!--  /.content -->					