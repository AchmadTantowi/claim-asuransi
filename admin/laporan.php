<?php include 'head.php';?>

<body>

<?php include 'navbar.php';?>		
<?php include 'sidebar.php';?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Laporan Claim</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-6">
				<form action="#" method="POST">			
					<div class="form-group">
						<label>Dari Tanggal</label>
						<input type="date" name="tgl_awal" class="form-control">
					</div>
													
					<div class="form-group">
						<label>Sampai Tanggal</label>
						<input type="date" name="tgl_akhir" class="form-control">
					</div>
					<button type="submit" class="btn btn primary">Cetak</button>				
				</form>
			</div><!--/.row-->
		
		</div>	<!--/.main-->
	</div>

<?php include 'footer.php';?>
