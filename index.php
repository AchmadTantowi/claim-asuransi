<?php include 'head.php'; ?>
<body>
<!--=========================================
				Navigation
  =========================================-->   
<?php include 'menu.php';?>
 <!--=========================================
				Static-Head	
  =========================================-->   
    
  
   <div class="static-header">
      <div class="container">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <h1>BENGKEL LAYANAN PRIMA</h1>
          <p>Tujuan utama kami adalah terciptanya suatu “Long Term Relationship” terhadap pelanggan. Oleh sebab itu, berbagai pengembangan terhadap bengkel akan selalu kami upayakan agar tujuan tersebut dapat kami capai serta menjadi bengkel rekanan asuransi yang dapat dipercaya.</p>
          <a class="btn btn-default" href="form-claim.php">Claim Asuransi</a> </div>
        <div class="col-lg-6 col-md-6 col-sm-6"> <img src="assets/img/slider/slider4.jpg" width="500" height="500"> </div>
      </div>
      <!--container ends--> 
    </div>
    <!--static-wrapper ends--> 
<?php
if(isset($_POST['btn-check']))
{
  $no_pol = $_POST['no_pol'];
  if(extract($crud->getNoPol($no_pol)))
  {
    extract($crud->getStatus($id_status));
    $msg = "<script>swal('Status Pengerjaan: $nama_status', '', 'success');</script>";
  }
  else
  {
    $msg = "<script>swal('No.Polisi yang dimasukan salah', '', 'error');</script>";
  }
}
?>
<div class="clearfix"></div>
<style>

@media only screen and (max-width: 767px) {
  .formresponsive{
    margin-left:1%;
  }
}
@media only screen and (max-width: 756px) {
  .formresponsive{
    margin-left:1%;
  }
}
@media only screen and (max-width: 540px) {
  .formresponsive{
    margin-left:1%;
  }
}
@media only screen and (max-width: 400px) {
  .formresponsive{
    margin-left:1%;
  }
}
</style>
<section id="newsletter">
  <div class="container">
    <div class="section-header-white">Cek Status Pengerjaan</div><!--section-header-->
      <div class="section-subheader">Silahkan masukan No.Polisi Anda untuk cek status pengerjaan</div>
      <div class="formresponsive">
        <form id="newsletter-form" name="newsletter-form" method="post" class="">        
            <input name="no_pol" id="nl-name" type="text" placeholder="Masukan No.Polisi" required/>
    
            <button type="submit" name="btn-check" id="nl-go"><i class="icon-chevron-right"></i></button>         
        </form> 
        <?php
        if(isset($msg))
        {
          echo $msg;
        }
        ?>
        <div class="clearfix"></div>
      </div>
  </div>
</section> 

<div class="promotion container">
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-9">
            <h4><center>Bengkel Layanan Prima</center></h4>
            <p align="justify">
            Bengkel Layanan Prima dibuka pada tangal 11 Februari 1990 yang bergerak di bidang industri otomotif, yaitu sebagai bengkel yang menyediakan berbagai layanan yang berhubungan dengan perawatan (service) mobil dan perbaikan bodi (Body Repair) kendaraan bermotor.
            </p>
            <p align="justify">
            Bengkel Layanan Prima ini didukung oleh berbagai fasilitas modern dan SDM yang berpengalaman serta profesional di bidangnya masing-masing. Pelayanan yang bersahabat serta memuaskan merupakan salah satu wujud nyata dari moto kami yakni :
            </p>
 
            <p><b><center>"Kepuasan pelanggan adalah lambang keberhasilan kami"</center></b></p>
            <p align="justify">
            Tujuan utama kami adalah terciptanya suatu “Long Term Relationship” terhadap pelanggan. Oleh sebab itu, berbagai pengembangan terhadap bengkel akan selalu kami upayakan agar tujuan tersebut dapat kami capai serta menjadi bengkel rekanan asuransi yang dapat dipercaya.
            Harapan kami adalah agar Profil Bengkel Layanan Prima ini dapat memberikan gambaran dan manfaat bagi semua pihak.
            </p>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-3">
            <a href="form-claim.php" class="btn btn-default with-icon">
            	Claim Asuransi
            </a>
        </div>
    </div>
</div>
<section id="testimonial-flat">
  <div class="container">
      <div class="section-header">Testimonials <div class="header-line"></div></div>
    <div class="section-subheader">What our clients says about us</div> 
        <div id="testi-flex" class="flexslider">
            <ul class="slides">
                <li>
                    Ini bengkel udah lama g kenal, service antar jemput kendaraan jadi g kagak pusing. hasil pekerjaannya boleh juga sekelas sama bgkl authorized sama satu lagi, bgklnya flexible and helpful banget.
                    <a href="#">- Antonius, CEO</a>
                </li>
                <li>
                    A few brief words about your project or post. Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut laboredolore magna aliqua. Ut enim ad minim veniam
                    <a href="#">- John Doe, CEO</a>
                </li>
                <li>
                    A few brief words about your project or post. Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut laboredolore magna aliqua. Ut enim ad minim veniam
                    <a href="#">- John Doe, CEO</a>
                </li>
            </ul>
        </div>
    </div>
</section> 


<!--=================================
Clients
=================================-->
 <div class="clearfix"></div>
<section id="clients-container">
        <div class="container">
        
          <h3>Insurance</h3> 
          <div class="clients">
                 
                 <a href="#" class="client">
                 	<img src="assets/img/clients/1.jpg" alt="" />
                 </a>
                 
                 <a href="#" class="client">
                 	<img src="assets/img/clients/2.jpg" alt="" />
                 </a>
                 
                 <a href="#" class="client">
                 	<img src="assets/img/clients/3.jpeg" alt="" />
                 </a>
                 
                 <a href="#" class="client">
                 	<img src="assets/img/clients/4.jpg" alt="" />
                 </a>
                 
                 <a href="#" class="client">
                 	<img src="assets/img/clients/5.jpg" alt="" />
                 </a>
          
          </div>
          <div class="clearfix"></div>
     </div>
</section>
 <div class="clearfix"></div>
<!--=========================================================
    #
    #							Footer
    #==========================================================-->
<?php include 'footer.php' ;?>