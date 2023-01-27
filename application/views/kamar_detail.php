<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("tamu/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("tamu/navbar.php") ?>

<div id="wrapper">

  <div id="content-wrapper">

    <div class="container-fluid">


      <!-- search box-->
        <div class="container-fluid">
          
        <h2 >Info Kamar</h2>
        <hr style="border: 1px solid">
        <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php 
                } 
                ?>

                <?php 
                  
                        if($this->session->flashdata('berhasil')){

                            echo "<div class='alert alert-success'>
                                           <span>Check In SUCCESS</span>  
                                        </div>";

                          }

                       
              ?>
      <!--end search box-->



    


<div class="row">

    <div class="col-lg-3 col-sm-4 hidden-xs">
          <div class="search-form"><h4><span class="fa fa-search"></span> Search for</h4>
                <?php echo form_open('Welcome/cari');?>
              <div class="row">
              <div class="col-lg-12">
                  <select class="form-control" name="id_kelas_kamar">
                    <option value="">Pilih Kelas Kamar</option>
                    <?php
                    foreach ($kelas_kamar->result_array() as $value) { ?>
                        <option value="<?php echo $value['id_kelas_kamar']; ?>"><?php echo $value['nama_kelas_kamar'] ?></option>
                    <?php
                    }
                    ?>
                   
                  </select>
                  </div>
              </div>
              <button class="btn btn-primary">Find Now</button>

              <?php echo form_close();?>
            </div>
      </div>

<div class="col-lg-9 col-sm-8 ">

  <?php
  foreach ($kamar->result_array() as $value) {
    $id_kamar         = $value['id_kamar'];
    $no_kamar      = $value['no_kamar'];
    $harga_kamar      = $value['harga_kamar'];
    $fasilitas_kamar  = $value['fasilitas_kamar'];
    $nama_kelas_kamar = $value['nama_kelas_kamar'];
    $status_kamar = $value['status_kamar'];
  }
  ?>

<h3>Nomor Kamar : <?php echo $no_kamar;?></h3>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
         <?php
        $no=0;
        foreach ($kamar_gambar->result_array() as $value) { ?>
           <?php
            if ($no==0) { ?>

             <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
             <?php
            }
            else { ?>

             <li data-target="#myCarousel" data-slide-to="<?php echo $no;?>" class=""></li>
             <?php
            }
            ?>
       
         <?php
        $no++;
        }
       
        ?>
      </ol>
      <div class="carousel-inner">
       
        <?php
        $no=0;
        foreach ($kamar_gambar->result_array() as $value) { ?>

            

            <?php
            if ($no==0) { ?>
              <div class="item active">
                <img src="<?php echo base_url();?>assets/images/<?php echo $value['nama_kamar_gambar'];?>" class="properties" alt="properties" />
              </div>

            <?php
            }
            else { ?>

              <div class="item">
                <img src="<?php echo base_url();?>assets/images/<?php echo $value['nama_kamar_gambar'];?>" class="properties" alt="properties" />
              </div> 
            <?php
            }
            ?>

        <?php
        $no++;
        }
       
        ?>
       
        

        
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="fa fa-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  <div class="spacer"><h4><span class="fa fa-th-list"></span> Informasi Kamar</h4>
  <p><?php echo $fasilitas_kamar;?></p> 
  </div>
  
  <div class="text-center">
    <a href="http://wa.me/088232691920" target="_blank" class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" style="width:50px;" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
    </a>
    <a href="https://instagram.com/niki_homestay" target="_blank" class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" style="width:50px;" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
    </a>
    <a href="https://goo.gl/maps/6e5rQuy9y2YkVrXAA" target="_blank" class="mr-2">
    <svg xmlns="http://www.w3.org/2000/svg" style="width:50px;" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152c22.1 0 40-17.9 40-40s-17.9-40-40-40s-40 17.9-40 40s17.9 40 40 40z"/></svg>
    </a>
  </div>
  

  </div>


  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price"><?php echo rupiah($harga_kamar);?></p>
 
  
 
</div>

    <h6><span class="fa fa-home"></span> <?php echo $nama_kelas_kamar;?></h6>
    <div class="listing-detail">
    
</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">

  <?php

  if ($status_kamar==0) { ?>

  <h6><span class="fa fa-envelope"></span> Pemesanan Kamar</h6>
  <?php echo form_open('welcome/reservasi/','role="form"'); ?>
    <input type="hidden" name="id_kamar" value="<?php echo $id_kamar;?>">
     <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
       <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                            <input class="form-control"  type="text" name="tgl_reservasi_masuk" placeholder="Tanggal Chek In" autocomplete="off">

                                            

                                                        </div>
                                                        <br>
      <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
       <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                            <input class="form-control"  type="text" name="tgl_reservasi_keluar" placeholder="Tanggal Chek Out" autocomplete="off">

                                            

                                                        </div>
                                                        <br>
                <input type="text" class="form-control" name="nama_reservasi" placeholder="Nama"/>
                <input type="number" class="form-control" name="tlp_reservasi" placeholder="Tlp"/>
                <textarea rows="6" class="form-control" name="alamat_reservasi" placeholder="Alamat"></textarea>
      <button type="submit" class="btn btn-primary" name="Submit">Booking Kamar</button>
     
      <?php echo form_close();?>

  <?php
  }
  else { ?>

  <div class='alert alert-danger'>
                                           <span>Kamar Not Avaliable</span>  
                                        </div>

  <?php
  }

  ?>
  </div>
 </div>         
</div>
  </div>
</div>

    <!-- /.iron-card -->
    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("tamu/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("tamu/scrolltop.php") ?>
<?php $this->load->view("tamu/modal.php") ?>
<?php $this->load->view("tamu/js.php") ?>
    
</body>
</html>