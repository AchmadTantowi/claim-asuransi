<?php include 'head.php';?>

<body>

<?php include 'navbar.php';?>		
<?php include 'sidebar.php';?>
<?php
if(isset($_POST['btn-update']))
{
	$id_claim = $_GET['edit_id'];
	$id_status = $_POST['id_status'];
	
	if($crud->update_claim($id_claim, $id_status))
	{
		$msg = "<div class='alert alert-info'>
				<strong>Selamat</strong> Record telah berhasil diubah :) <a href='index.php'>HOME</a>!
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>ERROR!</strong> Update Record Gagal !
				</div>";
	}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getIdClaim($id));	
}

?>	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Status Claim</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
<?php
if(isset($msg))
{
	echo $msg;
}
?>
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<form method="POST">			
									<div class="form-group">
										<label>No.Polisi</label>
										<input type="text" name="no_polisi" value="<?php echo $no_polisi; ?>" class="form-control">
									</div>
																	
									<div class="form-group">
										<label>Status Pengerjaan</label>

										<select class="form-control" name='id_status' required>
							                <option value="<?php echo $id_status; ?>" selected="selected">
											<?php echo $nama_status; ?>
											<?php
						                        $query = "SELECT * FROM status_pengerjaan ";
						                        $crud->dropdown_status_pengerjaan($query);
						                    ?>
							                </option>                 
							                                                      
							            </select>
									</div>
									<button type="submit" class="btn btn-primary">Update</button>	
									<button onclick="goBack()" class="btn btn-default">Back</button>				
								</form>
							</div><!--/.row-->
						
						</div>	<!--/.main-->
					</div>
				</div>
			</div>
		</div><!--/.row-->	
							
	</div>	<!--/.main-->
<script>
function goBack(){
	window.history.back();
}
</script>
<?php include 'footer.php';?>
