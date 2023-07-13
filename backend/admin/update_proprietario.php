<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_proprietario']))
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
			$query="UPDATE  proprietario_imovel  SET primeironome=?, apelido=?, contacto=?, sector_trabalho=?, bairro=?, num_casa=?, num_quarteirao=?, num_bloco=?, data_nasc=?, data_registro=?, status_proprietario=?, email=? WHERE id = ?";
			$stmt = $mysqli->prepare($query);
			// $rc=$stmt->bind_param('sssssssssi', $primeironome, $apelido, $contacto, $sector_trabalho, $bairro, $num_casa, $num_quarteirao, $num_bloco, $data_nasc, $id);
			$stmt->execute();
		
			if($stmt)
			{
				$success = "Proprietarios actualizado com sucesso";
			}
			else {
				$err = "Erro tente novamente";
			}
			
			
		}
?>
<!--End Server Side-->
<!--End Patient Registration-->
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
                                            <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Painel</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Proprietário</a></li>
                                            <li class="breadcrumb-item active">Gerir Proprietários</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Actualizar dados proprietários</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <!--LETS GET DETAILS OF SINGLE PATIENT GIVEN THEIR ID-->
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
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Preencha todos campos</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Primeiro Nome</label>
                                                    <input type="text" required="required" value="<?php echo $row->primeironome;?>" name="primeironome" class="form-control" id="inputEmail4" placeholder="Primeiro nome">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Apelido</label>
                                                    <input required="required" type="text" value="<?php echo $row->apelido;?>" name="apelido" class="form-control"  id="inputPassword4" placeholder="Apelido">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Sector de trabalho</label><select id="inputState" required="required" name="sector_trabalho" class="form-control">
                                                        <option>Estado</option>
                                                        <option>Privado</option>
                                                        <option>Indepente</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Contacto</label>
                                                    <input required="required" type="text" value="<?php echo $row->contacto;?>" name="contacto" class="form-control"  id="inputPassword4" placeholder="contacto">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress" class="col-form-label">Numero do bloco</label>
                                                <input required="required" type="text" value="<?php echo $row->num_bloco;?>" class="form-control" name="num_bloco" id="inputAddress" placeholder="numero do bloco">
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Data de nascimento</label>
                                                    <input required="required" type="text" value="<?php echo $row->data_nasc;?>" name="data_nasc" class="form-control" id="DD/MM/YYYY">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                <label for="inputCity" class="col-form-label">Numero da casa</label>
                                                <input type="text" required="required" value="<?php echo $row->num_casa;?>" name="num_casa" class="form-control" id="inputEmail4" placeholder="numero da casa">
                                                    
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputZip" class="col-form-label">Bairro</label>
                                                    <input type="text" name="bairro" value="<?php echo $bairro;?>" class="form-control" id="inputZip">
                                                </div>
                                            </div>

                                            <button type="submit" name="update_proprietario" class="ladda-button btn btn-success" data-style="expand-right">Add Proprietário</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <?php  }?>
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