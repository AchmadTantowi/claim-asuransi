<?php include 'head.php'; ?>
<body>
<!--=========================================
				Navigation
  =========================================-->   
<?php include 'menu.php';?>
<section class="breadcrumb">   
   <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <h1>Form Claim</h1>
        </div>
          
        <div class="col-lg-6 col-md-6 col-sm-6">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="form-claim.php">Form Claim</a></li>
          </ul>
        </div>
      </div>
   </div>
</section>
<?php
if(isset($_POST['btn-save']))
{
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $asuransi = $_POST['asuransi'];
  $email = $_POST['email'];
  $telp = $_POST['telp'];
  $no_pol = $_POST['no_pol'];
  $merk = $_POST['merk'];
  $model = $_POST['model'];
  $warna = $_POST['warna'];
  $tahun = $_POST['tahun'];
  $tgl_claim = date('Y-m-d');
  $jam_claim = date('H:i:s');
  $status = 6;
  
  if($crud->simpan_claim($nama,$alamat,$status,$asuransi,$telp,$email,$no_pol,$merk,$model,$warna,$tahun,$tgl_claim,$jam_claim))
  {
    header("Location: form-claim.php?inserted");
  }
  else
  {
    header("Location: form-claim.php?failure");
  }
}
?> 
<div class="clearfix"></div>

<section id="shortcode">

<?php
if(isset($_GET['inserted']))
{
?>
  <script>swal("Claim terkirim", "You clicked the button!", "success");</script>
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

  <div class="container">            
    <div class="contact_form">
      <form method="POST">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 

            <label for="name_contact">Nama<span>*</span></label>
            <input name="nama" type="text" required/>

            <label for="name_contact">Alamat<span>*</span></label>
            <input name="alamat" type="text" required/>

            <label for="name_contact">Asuransi<span>*</span></label>
            <select class="form-control" name='asuransi' required>
                <option value="">-- Pilih asuransi --</option>                 
                    <?php
                        $query = "SELECT * FROM asuransi";
                        $crud->dropdown_asuransi($query);
                    ?>                                  
            </select><br><br>
            
            <label for="email_contact">Email<span>*</span></label>
            <input name="email" type="email" required/>
            
            <label for="subj_contact">Telp<span>*</span></label>
            <input name="telp" type="text" required/>

            <label for="subj_contact">No.Polisi<span>*</span></label>
            <input name="no_pol" type="text" required/>
        
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">  

            <label for="subj_contact">Merk Kendaraan<span>*</span></label>
            <input name="merk" type="text" required/>

            <label for="subj_contact">Model Kendaraan<span>*</span></label>
            <input name="model" type="text" required/>

            <label for="subj_contact">Warna Kendaraan<span>*</span></label>
            <input name="warna" type="text" required/>

            <label for="subj_contact">Tahun Kendaraan<span>*</span></label>
            <input name="tahun" type="text" required/>

            <button class="btn btn-default" type="submit" name="btn-save">Submit Claim</button>
          </div>
       </div>         
    </form><!--contact form-->
               
  </div><!--contact_form-->                   
  </div><!--container-->
</section> <!--contact-->
<!--=========================================================
    #
    #							Footer
    #==========================================================-->
<?php include 'footer.php' ;?>