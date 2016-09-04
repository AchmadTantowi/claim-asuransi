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
          <h1>Cek Status Mobil</h1>
        </div>
          
        <div class="col-lg-6 col-md-6 col-sm-6">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="cek-status-mobil.php">Cek Status Mobil</a></li>
          </ul>
        </div>
      </div>
   </div>
</section>
<?php
if(isset($_POST['btn-check']))
{
  $no_pol = $_POST['no_pol'];
  $asuransi = $_POST['asuransi'];
  if(extract($crud->getCekMobil($asuransi,$no_pol)))
  {
    // extract($crud->getStatus($id_status));
    $msg = "<script>swal('Status Mobil Terdaftar', '', 'success');</script>";
  }
  else
  {
    $msg = "<script>swal('Maaf, Mobil Tidak Terdaftar', '', 'error');</script>";
  }
}
?>

  <div class="container">            
    <div class="contact_form">
      <form method="POST">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
            <label for="name_contact">Asuransi<span>*</span></label>
            <select class="form-control" name='asuransi' required>
                <option value="">-- Pilih asuransi --</option>                 
                    <?php
                        $query = "SELECT * FROM asuransi";
                        $crud->dropdown_asuransi($query);
                    ?>                                  
            </select><br><br>

            <label for="name_contact">No Polisi<span>*</span></label>
            <input name="no_pol" type="text" required/>
          
            <button class="btn btn-default" type="submit" name="btn-check">Cek</button>
          </div>
       </div>         
    </form><!--contact form-->
    <?php
    if(isset($msg))
    {
      echo $msg;
    }
    ?>
  </div><!--contact_form-->                   
  </div><!--container-->
</section> <!--contact-->
<!--=========================================================
    #
    #             Footer
    #==========================================================-->
<?php include 'footer.php' ;?>