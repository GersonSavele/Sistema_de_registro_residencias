<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['adicionar_formulario']))
		{
			$nome_propImovel=$_POST['nome_propImovel'];
			$nr_bi_propImovel=$_POST['nr_bi_propImovel'];
			$profissao_propImovel=$_POST['profissao_propImovel'];
            $estado_civil_propImovel=$_POST['estado_civil_propImovel'];
            $profissao_propImovel_propImovel = $_POST['contacto_propImovel'];
            $nome_agreg = $_POST['nome_agreg'];
            $grau_parentesco_agreg = $_POST['grau_parentesco_agreg'];
            $profissao_agreg = $_POST['profissao_agreg'];
            $habilitacoes_agreg=$_POST['habilitacoes_agreg'];
            $data_nasc_agreg=$_POST['data_nasc_agreg'];

            
            //sql to insert captured values
			$query="INSERT INTO formulario (`nome_propImovel`, `nr_bi_propImovel`, `profissao_propImovel`, `estado_civil_propImovel`, `contacto_propImovel`, `nome_agreg`, `grau_parentesco_agreg`, `profissao_agreg`, `habilitacoes_agreg`, `data_nasc_agreg`) VALUES (?,?,?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			// $rc=$stmt->bind_param('sssss', $nome_propImovel, $nr_bi_propImovel, $profissao_propImovel,$estado_civil_propImovel,$contacto_propImovel,$nome_agreg,$grau_parentesco_agreg,$profissao_agreg, $email, $password);
			$stmt->execute();
			
			if($stmt)
			{
				$success = "Detalhes do formulario adicionados com sucesso";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Agregado Familiar</a></li>
                                            <li class="breadcrumb-item active">Preencher Dados Agregado Familiar</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Adicionar dados do agregado Familiar</h4>
                                </div>Detalhes
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Ficha agregado Familiar</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Nome do proprietário Imóvel</label>
                                                    <input type="text" required="required" name="nome_propImovel" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputPassword4" class="col-form-label">Nr BI</label>
                                                    <input required="required" type="text" name="nr_bi_propImovel" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Profissão</label>
                                                    <input type="text" required="required" name="profissao_propImovel" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Estado Civil</label>
                                                    <input type="text" required="required" name="estado_civil_propImovel" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Contacto</label>
                                                    <input type="text" required="required" name="contacto_propImovel" class="form-control" id="inputEmail4" >
                                                </div>
                                            </div>
                                            <h2>Agregado Familiar</h2>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Nome</label>
                                                    <input type="text" required="required" name="nome_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputPassword4" class="col-form-label">Grau Parentesco</label>
                                                    <input required="required" type="text" name="grau_parentesco_agreg" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Profissão</label>
                                                    <input type="text" required="required" name="profissao_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Nivel academico</label>
                                                    <input type="text" required="required" name="habilitacoes_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Data Nascimento</label>
                                                    <input type="text" required="required" name="data_nasc_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Nome</label>
                                                    <input type="text" required="required" name="nome_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputPassword4" class="col-form-label">Grau Parentesco</label>
                                                    <input required="required" type="text" name="grau_parentesco_agreg" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Profissão</label>
                                                    <input type="text" required="required" name="profissao_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Nivel academico</label>
                                                    <input type="text" required="required" name="habilitacoes_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Data Nascimento</label>
                                                    <input type="text" required="required" name="data_nasc_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Nome</label>
                                                    <input type="text" required="required" name="nome_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputPassword4" class="col-form-label">Grau Parentesco</label>
                                                    <input required="required" type="text" name="grau_parentesco_agreg" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Profissão</label>
                                                    <input type="text" required="required" name="profissao_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Nivel academico</label>
                                                    <input type="text" required="required" name="habilitacoes_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Data Nascimento</label>
                                                    <input type="text" required="required" name="data_nasc_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Nome</label>
                                                    <input type="text" required="required" name="nome_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputPassword4" class="col-form-label">Grau Parentesco</label>
                                                    <input required="required" type="text" name="grau_parentesco_agreg" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Profissão</label>
                                                    <input type="text" required="required" name="profissao_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Nivel academico</label>
                                                    <input type="text" required="required" name="habilitacoes_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Data Nascimento</label>
                                                    <input type="text" required="required" name="data_nasc_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                            </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Nome</label>
                                                    <input type="text" required="required" name="nome_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputPassword4" class="col-form-label">Grau Parentesco</label>
                                                    <input required="required" type="text" name="grau_parentesco_agreg" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Profissão</label>
                                                    <input type="text" required="required" name="profissao_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Nivel academico</label>
                                                    <input type="text" required="required" name="habilitacoes_agreg" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Data Nascimento</label>
                                                    <input type="text" required="required" name="data_nasc_agreg" class="form-control" id="inputEmail4" >
                                                </div> 
                                            </div>
                                            <button type="submit" name="adicionar_formulario" class="ladda-button btn btn-success" data-style="expand-right">Adionar</button>

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