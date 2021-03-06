<?php include 'head.php';?>

<body>

<?php include 'navbar.php';?>		
<?php include 'sidebar.php';?>
<?php
if(isset($_POST['btn-update']))
{
	$id_asuransi = $_GET['edit_id'];
	$nama_asuransi = $_POST['nama_asuransi'];
	
	if($crud->update_asuransi($id_asuransi, $nama_asuransi))
	{
		$msg = "<div class='alert alert-info'>
				<strong>Selamat</strong> Record telah berhasil diubah :) <a href='asuransi.php'>Lihat Data</a>!
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
	extract($crud->getAsuransi($id));	
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
				<h1 class="page-header">Edit Data Asuransi</h1>
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
										<label>Nama Asuransi</label>
										<input type="text" name="nama_asuransi" value="<?php echo $nama_asuransi; ?>" class="form-control">
									</div>
																	
									<button type="submit" class="btn btn-primary" name="btn-update">Update</button>	
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
