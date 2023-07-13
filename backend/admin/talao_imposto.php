<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['add_foto']))
		{
			$primeiro_nome=$_POST['primeiro_nome'];
			$apelido=$_POST['apelido'];
            $email=$_POST['email'];
            $foto=$_FILES["foto"];
            //sql to insert captured values
			$query="INSERT INTO talao_imposto VALUES ('primeiro_nome', 'apelido', 'email', 'foto') ";
			$stmt = $mysqli->prepare($query);
			$stmt->execute();
			if($stmt)
			{
				$success = "Talao registado com sucesso";
			}
			else {
				$err = "Tente novamente ";
			}
			
			
        }
    
?>
<!DOCTYPE html>
    <html lang="en">
        <?php include('assets/inc/head.php');?>
    <body>

        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include('assets/inc/nav.php');?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
                <?php include('assets/inc/sidebar.php');?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php
                $ret="select * from talao_imposto";
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
                                                <li class="breadcrumb-item active">Perfil</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title"><?php echo $row->primeiro_nome;?> <?php echo $row->apelido;?>Talão Imposto</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->

                            <div class="row">
                                <div class="col-lg-4 col-xl-4">
                                    <div class="card-box text-center">
                                        <img src="assets/images/imposto.jpeg>" class="img-thumbnail"
                                            alt="profile-image">
                                        <h4 class="mb-0">Foto de talão de imposto</h4>
                                        <div class="text-left mt-3">
                                            <p class="text-muted mb-2 font-13"><strong>Nome Completo :</strong> <span class="ml-2"><?php echo $row->primeiro_nome;?> <?php echo $row->apelido;?></span></p>
                                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 "><?php echo $row->email;?></span></p>
                                        </div>

                                    </div> <!-- end card-box -->
                                   
                                </div> <!-- end col-->

                                <div class="col-lg-8 col-xl-8">
                                    <div class="card-box">
                                        <ul class="nav nav-pills navtab-bg nav-justified">
                                            <li class="nav-item">
                                                <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Impostos
                                                </a>
                                            </li>

                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="aboutme">

                                            <form method="post" enctype="multipart/form-data">
                                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Adcionar Informacao pessoal e Foto de talao de Imposto</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="firstname">Primeiro nome</label>
                                                                <input type="text" name="primeiro_nome"  class="form-control" id="firstname" placeholder="<?php echo $row->primeiro_nome;?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="lastname">Apelido</label>
                                                                <input type="text" name="apelido" class="form-control" id="lastname" placeholder="<?php echo $row->apelido;?>">
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="useremail">Email</label>
                                                                <input type="email" name="email" class="form-control" id="useremail" placeholder="<?php echo $row->email;?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="useremail">Foto</label>
                                                                <input type="file" name="foto" class="form-control btn btn-success" id="useremail" placeholder="<?php echo $row->email;?>">
                                                            </div>
                                                        </div>
                                                        
                                                    </div> <!-- end row -->

                                                    
                                                    <div class="text-right">
                                                        <button type="submit" name="add_foto" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                    </div>
                                                </form>


                                            </div> 
                                        </div> <!-- end tab-content -->
                                    </div> <!-- end card-box-->

                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->

                        </div> <!-- container -->

                    </div> <!-- content -->

                    <!-- Footer Start -->
                    <?php include("assets/inc/footer.php");?>
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