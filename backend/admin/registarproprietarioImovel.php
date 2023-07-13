<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['add_proprietario']))
		{
            $id=$_POST['id'];
			$primeironome=$_POST['primeironome'];
			$apelido=$_POST['apelido'];
			$contacto=$_POST['contacto'];
            $foto=$_POST['foto'];
            $sector_trabalho=$_POST['sector_trabalho'];
            $bairro=$_POST['bairro'];
            $num_casa = $_POST['num_casa'];
            $num_quarteirao = $_POST['num_quarteirao'];
            $num_bloco = $_POST['num_bloco'];
            $data_nasc = $_POST['data_nasc'];
            $data_registro=$_POST['data_registro'];
            $status_proprietario=$_POST['status_proprietario'];
            $email = $_POST['email'];
            //sql to insert captured values
            $query="INSERT INTO proprietario_imovel VALUES (`id`, `primeironome`, `apelido`, `data_nasc`, `num_casa`, `num_quarteirao`, `num_bloco`, `contacto`, `foto`, `bairro`, `sector_trabalho`, `data_registro`, `email`, `status_proprietario`)";
			// $query="INSERT INTO proprietario_imovel ('primeironome', 'email', 'apelido', 'num_casa','num_quarteirao','num_bloco', 'data_nasc', 'contacto', 'foto', 'sector_trabalho', 'bairro','data_registro','status_proprietario') VALUES () ";
			$stmt = $mysqli->prepare($query);
			// $rc=$stmt->bind_param($primeironome, $email, $apelido, $num_casa,$num_quarteirao ,$num_bloco, $data_nasc, $contacto, $foto, $sector_trabalho, $bairro,$data_registro,$status_proprietario);
			$stmt->execute();
			if($stmt)
			{
				$success = "Detalhes adicionados com sucesso";

			}
			else {
				$err = "Por favor, tente novamente ou tente mais tarde";
			}
			
			
		}
?>
<!--End Server Side-->
<!DOCTYPE html>
<html lang="en">
    
    <!--Head-->
    <?php include('assets/inc/head.php');?>
    <body>

        <!-- Inicio page -->
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
                                            <li class="breadcrumb-item"><a href="pagina_principal.php" style="font-size: 16px; color: cadetblue;">Painel</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"style="font-size: 16px; color: cadetblue;">Proprietários</a></li>
                                            <li class="breadcrumb-item active"style="font-size: 16px; color: cadetblue;">Adcionar Proprietário Imóvel</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title" style="font-size: 22px;">Adcionar dados do proprietário do Imóvel </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Preencha todos os campos</h4>
                                        <form method="post" action="registarproprietarioImovel.php">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Primeiro Nome</label>
                                                    <input type="text" name="primeironome" class="form-control" placeholder="Primeiro nome">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Apelido</label>
                                                    <input required="required" type="text" name="apelido" class="form-control"  id="inputPassword4" placeholder="Apelido">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4" class="col-form-label">Data de nascimento</label>
                                                    <input type="text" required="required" name="data_nasc" class="form-control" placeholder="DD/MM/YYYY">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputPassword4" class="col-form-label">Número da casa </label>
                                                    <input required="required" type="text" name="num_casa" class="form-control"  id="inputPassword4" placeholder="Numero da casa">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputPassword4" class="col-form-label">Número do quarteirão </label>
                                                    <input required="required" type="text" name="num_quarteirao" class="form-control"  id="inputPassword4" placeholder="Numero do quarteirão">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputPassword4" class="col-form-label">Número do Bloco </label>
                                                    <input required="required" type="text" name="num_bloco" class="form-control"  id="inputPassword4" placeholder="Numero do bloco">
                                                </div>
                                                
                                            </div>

                                            <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress" class="col-form-label">Bairro</label>
                                                <input required="required" type="text" class="form-control" name="bairro" id="inputAddress" placeholder="bairro">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress" class="col-form-label">Data Registro</label>
                                                <input required="required" type="text" class="form-control" name="data_registro" id="inputAddress" placeholder="<?php $hoje = date('d/m/Y'); echo $hoje;?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress" class="col-form-label">Estatus</label>
                                                <select id="inputState" required="required" name="status_proprietario" class="form-control">
                                                        <option>Activo</option>
                                                        <option>Desativo</option>
                                                    </select>
                                            </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Contacto</label>
                                                    <input required="required" type="text" name="contacto" class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Email</label>
                                                    <input required="required" type="text" name="email" class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Sector Trabalho</label>
                                                    <select id="inputState" required="required" name="sector_trabalho" class="form-control">
                                                        <option>Estado</option>
                                                        <option>Privado</option>
                                                        <option>Independente</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
            
                                                <label for="useremail">Foto</label>
                                                    <input type="file" name="foto" class="form-control btn btn-success" id="useremail" placeholder="<?php echo $row->$foto;?>">
                                                </div>
                                            </div>

                                            <button type="submit" name="add_proprietario" class="ladda-button btn btn-primary" data-style="expand-right">Registar</button>
                                            <button type="submit"555 data-style="expand-right"><a class="nav-link" href="formulario_agregado.php">Continuar Registro</a></button>

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