<?php include 'head.php';?>

<body>

<?php include 'navbar.php';?>		
<?php include 'sidebar.php';?>
<?php
if(isset($_POST['btn-update']))
{
	$id_claim = $_GET['edit_id'];
	$id_status = $_POST['id_status'];
	$alamat = $_POST['alamat'];
	$tgl_selesai = date('Y-m-d');
	$nama_pemilik = $_POST['nama_pemilik'];
	$no_telp = $_POST['no_telp'];
	$email = $_POST['email'];
	$merk_mobil = $_POST['merk_mobil'];
	$warna_mobil = $_POST['warna_mobil'];
	$tahun_mobil = $_POST['tahun_mobil'];
	
	if($crud->update_claim($id_claim, $id_status, $tgl_selesai,$nama_pemilik,$alamat,$no_telp,$email,$merk_mobil,$warna_mobil,$tahun_mobil))
	{
		$msg = "<div class='alert alert-info'>
				<strong>Selamat</strong> Record telah berhasil diubah :) <a href='claim.php'>Lihat Data Claim</a>!
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
										<label>Nama Pemilik</label>
										<input type="text" name="nama_pemilik" value="<?php echo $nama_pemilik; ?>" class="form-control">
									</div>
									<div class="form-group">
										<label>Alamat</label>
										<input type="text" name="alamat" value="<?php echo $alamat; ?>" class="form-control">
									</div>
									<div class="form-group">
										<label>Telepon</label>
										<input type="text" name="no_telp" value="<?php echo $no_telp; ?>" class="form-control">
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" value="<?php echo $email; ?>" class="form-control">
									</div>
									<div class="form-group">
										<label>No.Polisi</label>
										<input type="text" name="no_polisi" value="<?php echo $no_polisi; ?>" class="form-control">
									</div>
									<div class="form-group">
										<label>Merk Mobil</label>
										<input type="text" name="merk_mobil" value="<?php echo $merk_mobil; ?>" class="form-control">
									</div>
									<div class="form-group">
										<label>Warna Mobil</label>
										<input type="text" name="warna_mobil" value="<?php echo $warna_mobil; ?>" class="form-control">
									</div>
									<div class="form-group">
										<label>Tahun Mobil</label>
										<input type="text" name="tahun_mobil" value="<?php echo $tahun_mobil; ?>" class="form-control">
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
