<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
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
                $id=$_GET['id'];
                $ret="SELECT  * FROM proprietario_imovel WHERE id=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$id);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
            {
                $mysqlDateTime = $row->pat_date_joined;
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Proprietários</a></li>
                                            <li class="breadcrumb-item active">Ver proprietários</li>
                                        </ol>
                                    </div>
                                     
                                    <h4 class="page-title"><?php echo $row->primeironome;?> <?php echo $row->primeironome;?>Perfil</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div class="card-box text-center">
                                    <img src="assets/images/users/" class="rounded-circle avatar-lg img-thumbnail"
                                        alt="profile-image">

                                    
                                    <div class="text-left mt-3">
                                        
                                        <p class="text-muted mb-2 font-13"><strong>Nome Completo :</strong> <span class="ml-2"><?php echo $row->primeironome;?> <?php echo $row->apelido;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Contacto :</strong><span class="ml-2"><?php echo $row->contacto;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2"><?php echo $row->email;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Numero da Casa :</strong> <span class="ml-2"><?php echo $row->num_casa;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Numero do quarteirão  :</strong> <span class="ml-2"><?php echo $row->num_quarteirao;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Numero do Bloco :</strong> <span class="ml-2"><?php echo $row->num_bloco;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Bairro :</strong> <span class="ml-2"><?php echo $row->bairro;?></span></p>
                                        <hr>
                                        <p class="text-muted mb-2 font-13"><strong>Data Registro:</strong> <span class="ml-2"><?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime));?></span></p>
                                        <hr>




                                    </div>

                                </div> <!-- end card-box -->

                            </div> <!-- end col-->
                            
                            <?php }?>
                            <div class="col-lg-6 col-xl-6">
                                <div class="card-box">
                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                        <li class="nav-item">
                                            <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                            Imposto
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                Estado
                                            </a>
                                        </li>
                                    </ul>
                                    <!--Medical History-->
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="aboutme">
                                             <ul class="list-unstyled timeline-sm">
                                                <?php
                                                    $pres_pat_number =$_GET['pat_number'];
                                                    $ret="SELECT  * FROM his_prescriptions WHERE pres_pat_number ='$pres_pat_number'";
                                                    $stmt= $mysqli->prepare($ret) ;
                                                    // $stmt->bind_param('i',$pres_pat_number );
                                                    $stmt->execute() ;//ok
                                                    $res=$stmt->get_result();
                                                    //$cnt=1;
                                                    
                                                    while($row=$res->fetch_object())
                                                        {
                                                    $mysqlDateTime = $row->pres_date; //trim timestamp to date

                                                ?>
                                                    <li class="timeline-sm-item">
                                                        <span class="timeline-sm-date"><?php echo date("Y-m-d", strtotime($mysqlDateTime));?></span>
                                                        <h5 class="mt-0 mb-1"><?php echo $row->pres_pat_ailment;?></h5>
                                                        <p class="text-muted mt-2">
                                                            <?php echo $row->pres_ins;?>
                                                        </p>

                                                    </li>
                                                <?php }?>
                                            </ul>
                                           
                                        </div> 
                                     

                                    </div> <!-- end tab-content -->
                                </div> <!-- end card-box-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('assets/inc/footer.php');?>
                <!-- end Footer -->

            </div>
            

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