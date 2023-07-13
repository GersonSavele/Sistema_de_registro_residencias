<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['id'];
?>

<!DOCTYPE html>
    <html lang="en">

    <?php include('assets/inc/head.php');?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
             <?php include("assets/inc/nav.php");?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
                <?php include("assets/inc/sidebar.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <!--Get Details Of A Single User And Display Them Here-->
            <?php
                // $id=$_GET['id'];
                $ret="SELECT  * FROM talao_imposto WHERE primeiro_nome='Marcelo' ";
                $stmt= $mysqli->prepare($ret) ;
                // $stmt->bind_param('i',$id);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
            {
            ?>
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Painel</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Taloes de imposto</a></li>
                                            <li class="breadcrumb-item active">Ver </li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?php echo $row->primeiro_nome;?> <?php echo $row->apelido;?></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-9 col-xl-9">
                                <div class="card-box text-center">
                                    <img src="../doc/assets/images/users/<?php echo $row->doc_dpic;?>" class="rounded-circle avatar-lg img-thumbnail"
                                        alt="profile-image">

                                    <div class="text-centre mt-12">
                                        
                                        <p class="text-muted mb-2 font-20"><strong>Nome Completo :</strong> <span class="ml-2"><?php echo $row->primeiro_nome;?> <?php echo $row->apelido;?></span></p>
                                       <p class="text-muted mb-2 font-20"><strong>Email :</strong> <span class="ml-2"><?php echo $row->email;?></span></p>
                                        <div class="text-muted mb-2 font-20"><strong>Foto :</strong> <span class="ml-2"><?php echo $row->foto;?></span></div>
                                    </div>
                                    <button type="submit" name="add_proximo" class="ladda-button btn btn-primary" data-style="expand-right">Proximo</button>
                                </div> <!-- end card-box -->

                            </div> <!-- end col-->
                            <!--Vitals-->
                            
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('assets/inc/footer.php');?>
                <!-- end Footer -->

            </div>
            <?php }?>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>


</html>