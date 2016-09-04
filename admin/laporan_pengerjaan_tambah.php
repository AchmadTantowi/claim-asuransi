<?php include 'head.php';?>

<body>

<?php include 'navbar.php';?>		
<?php include 'sidebar.php';?>
<?php
if(isset($_POST['btn-save']))
{
  $no_polisi = $_POST['no_polisi'];
  $las_ketok = $_POST['las_ketok'];
  $dempul = $_POST['dempul'];
  $cat = $_POST['cat'];
  $finishing = $_POST['finishing'];
  $poles = $_POST['poles'];
  
  if($crud->simpan_laporan_pengerjaan($no_polisi,$las_ketok,$dempul,$cat,$finishing,$poles))
  {
    header("Location: laporan_pengerjaan.php?inserted");
  }
  else
  {
    header("Location: laporan_pengerjaan.php?failure");
  }
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
				<h1 class="page-header">Tambah Laporan Pengerjaan</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
<?php
if(isset($_GET['inserted']))
{
?>
  <script>swal("Success", "Data tersimpan!", "success");</script>
<?php
}
else if(isset($_GET['failure']))
{
?>
  <div class="container">
    <div class="alert alert-warning">
      <strong>ERROR!</strong> Record Gagal disimpan !
    </div>
  </div>
<?php
}
?>
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<form method="POST">			
									<div class="form-group">
										<label>No Polisi</label>
										<input type="text" name="no_polisi" class="form-control" required>
										<label>Las Ketok *)Jumlah hari</label>
										<input type="number" name="las_ketok" class="form-control" required> 
										<label>Dempul *)Jumlah hari</label>
										<input type="number" name="dempul" class="form-control" required>
										<label>Cat *)Jumlah hari</label>
										<input type="number" name="cat" class="form-control" required>
										<label>Finishing *)Jumlah hari</label>
										<input type="number" name="finishing" class="form-control" required>
										<label>Poles *)Jumlah hari</label>
										<input type="number" name="poles" class="form-control" required>
									</div>
																	
									<button type="submit" class="btn btn-primary" name="btn-save">Submit</button>	
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
