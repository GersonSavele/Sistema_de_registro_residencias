<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['adicionar_funcionario']))
		{
			
			$id=$_POST['id'];
            $primeironome=$_POST['primeironome'];
			$apelido=$_POST['apelido'];
			$contacto=$_POST['contacto'];
            $bairro=$_POST['bairro'];
            $num_casa = $_POST['num_casa'];
            $num_quarteirao = $_POST['num_quarteirao'];
            $num_bloco = $_POST['num_bloco'];
            $funcao = $_POST['funcao'];
            $email=$_POST['email'];
            $password=sha1(md5($_POST['password']));
            
            //sql to insert captured values
			$query="INSERT INTO funcionario VALUES (`id`, `primeironome`, `apelido`, `contacto`, `bairro`, `num_casa`, `num_quarteirao`, `num_bloco`, `funcao`, `email`, `password`)";
			$stmt = $mysqli->prepare($query);
			// $rc=$stmt->bind_param('sssss', $primeironome, $apelido, $contacto,$bairro,$num_casa,$num_quarteirao,$num_bloco,$funcao, $email, $password);
			$stmt->execute();
			
			if($stmt)
			{
				$success = "Detalhes do funcionario adicionados com sucesso";
			}
			else {
				$err = "Ocorreu algum erro, tente novamente!";
			}
			
			
		}
?>
<!--End Server Side-->

<!DOCTYPE html>
<html lang="en">
    
    <!--Head-->
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
                                            <li class="breadcrumb-item"><a href="pagina_principal.php">Painel</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Funcionários</a></li>
                                            <li class="breadcrumb-item active">Adicionar funcionário</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Adicionar dados do funcionário</h4>
                                </div>Detalhes
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Preencha todos campos</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Primeiro nome</label>
                                                    <input type="text" required="required" name="primeironome" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Apelido</label>
                                                    <input required="required" type="text" name="apelido" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>

                                          
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Bairro</label>
                                                    <input type="text" required="required" name="bairro" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Numero da casa</label>
                                                    <input type="text" required="required" name="num_casa" class="form-control" id="inputEmail4" >
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Numero do quarteirão</label>
                                                    <input type="text" required="required" name="num_quarteirao" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Numero do Bloco</label>
                                                    <input type="text" required="required" name="num_bloco" class="form-control" id="inputEmail4" >
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Função</label>
                                                    <select id="inputState" required="required" name="sector_trabalho" class="form-control">
                                                        <option>Secretário do bairro</option>
                                                        <option>Chefe do Bloco</option>
                                                        <option>Chefe do Quarteirão</option>
                                                        <option>Outro</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6" >
                                                   
                                                   <label for="inputZip" class="col-form-label-6">Contacto</label>
                                                   <input type="text" required="required" name="contacto" class="form-control" id="inputEmail4" >
                                               </div>
                                            
                                                </div>

                                            <div class="form-row">
                                            <div class="form-group col-md-6 ">
                                                <label for="inputAddress" class="col-form-label">Email</label>
                                                <input required="required" type="email" class="form-control" name="email" id="inputAddress">
                                            </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Password</label>
                                                    <input required="required" type="password" name="password" class="form-control" id="inputCity">
                                                </div>
                                                
                                            </div>

                                            <button type="submit" name="adicionar_funcionario" class="ladda-button btn btn-success" data-style="expand-right">Adionar</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

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

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>

        <!-- Loading buttons js -->
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>

        <!-- Buttons init js-->
        <script src="assets/js/pages/loading-btn.init.js"></script>
        
    </body>

</html>