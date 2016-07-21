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
				<h1 class="page-header">Data Claim</h1>
			</div>
		</div><!--/.row-->
<?php
	if(isset($_GET['deleted']))
	{
		?>
        <div class="alert alert-success">
    	<strong>Success!</strong> record telah dihapus... 
		</div>
        <?php
	}
?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
					<div style="overflow:scroll;">
						<table data-toggle="table" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
							    <tr>
							    	<th>No</th>
							        <th>Nama Pemilik</th>
							        <th>Status Pengerjaan</th>
							        <th>Asuransi</th>
							        <th>Telp</th>
							        <th>Email</th>
							        <th>No.Pol</th>
							        <th>Merk</th>
							        <th>Model</th>
							        <th>Warna</th>
							        <th>Tahun</th>
							        <th>Tgl Claim</th>
							        <th>Actions</th>
							    </tr>
						    </thead>
						    <tbody>
						    	<?php
									$query = "SELECT * FROM data_claim, asuransi, status_pengerjaan where data_claim.asuransi=asuransi.id_asuransi and data_claim.id_status=status_pengerjaan.id_status";
									$crud->data_claim($query);
								 ?>
						    </tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
							
	</div>	<!--/.main-->
<script>
$(function () {
    $('#hover, #striped, #condensed').click(function () {
        var classes = 'table';

        if ($('#hover').prop('checked')) {
            classes += ' table-hover';
        }
        if ($('#condensed').prop('checked')) {
            classes += ' table-condensed';
        }
        $('#table-style').bootstrapTable('destroy')
            .bootstrapTable({
                classes: classes,
                striped: $('#striped').prop('checked')
            });
    });
});

function rowStyle(row, index) {
    var classes = ['active', 'success', 'info', 'warning', 'danger'];

    if (index % 2 === 0 && index / 2 < classes.length) {
        return {
            classes: classes[index / 2]
        };
    }
    return {};
}
</script>

<?php include 'footer.php';?>
