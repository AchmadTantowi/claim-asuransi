<?php include 'head.php';?>

<body>

<?php include 'navbar.php';?>		
<?php include 'sidebar.php';?>
<?php
if(isset($_POST['btn-save']))
{
  $asuransi = $_POST['asuransi'];
  $no_polisi = $_POST['no_polisi'];
  
  if($crud->simpan_status_mobil($asuransi,$no_polisi))
  {
    header("Location: data_status_mobil.php?inserted");
  }
  else
  {
    header("Location: data_status_mobil.php?failure");
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
				<h1 class="page-header">Tambah Asuransi</h1>
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
										<label>Nama Asuransi</label>
										<select class="form-control" name='asuransi' required>
							                <option value="">-- Pilih asuransi --</option>                 
							                    <?php
							                        $query = "SELECT * FROM asuransi";
							                        $crud->dropdown_asuransi($query);
							                    ?>                                  
							            </select>
							            <label>No Polisi</label>
										<input type="text" name="no_polisi" class="form-control" required>

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
