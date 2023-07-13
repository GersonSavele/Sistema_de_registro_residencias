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
                $id=$_GET['id'];
                $ret="SELECT  * FROM funcionario WHERE id=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$id);
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Funcionários</a></li>
                                            <li class="breadcrumb-item active">Ver </li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?>Perfil</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-9 col-xl-9">
                                <div class="card-box text-center">
                                    <img src="../doc/assets/images/users/<?php echo $row->doc_dpic;?>" class="rounded-circle avatar-lg img-thumbnail"
                                        alt="profile-image">

                                    <!-- $primeironome=$_POST['primeironome'];
                                            $apelido=$_POST['apelido'];
                                            $contacto=$_POST['contacto'];
                                            $bairro=$_POST['bairro'];
                                            $num_casa = $_POST['num_casa'];
                                            $num_quarteirao = $_POST['num_quarteirao'];
                                            $num_bloco = $_POST['num_bloco'];
                                            $funcao = $_POST['funcao'];
                                            $email=$_POST['email'];
                                            $password=sha1(md5($_POST['password'])); -->
                                    <div class="text-centre mt-12">
                                        
                                        <p class="text-muted mb-2 font-20"><strong>Nome Completo :</strong> <span class="ml-2"><?php echo $row->primeironome;?> <?php echo $row->apelido;?></span></p>
                                       <p class="text-muted mb-2 font-20"><strong>Contacto :</strong> <span class="ml-2"><?php echo $row->contacto;?></span></p>
                                        <p class="text-muted mb-2 font-20"><strong>Bairro :</strong> <span class="ml-2"><?php echo $row->bairro;?></span></p>
                                        <p class="text-muted mb-2 font-20"><strong>Funcao :</strong> <span class="ml-2"><?php echo $row->funcao;?></span></p>


                                    </div>

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