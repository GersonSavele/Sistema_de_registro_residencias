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
                <?php include('assets/inc/nav.php');?>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Painel</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Funcionários</a></li>
                                            <li class="breadcrumb-item active">Ver funcionários</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Dados do funcionário</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title"></h4>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline" >
                                                <div class="form-group mr-2" style="display:none">
                                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                        <option value="">Mostrar todos</option>
                                                        <option>Secretario do bairro</option>
                                                        <option>Chefe do Bloco</option>
                                                        <option>Chefe do Quarteirão</option>
                                                        <option>Outro</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
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
                                            <tr>
                                                <th>#</th>
                                                <th data-toggle="true">Nome</th>
                                                <th data-hide="phone">Contacto</th>
                                                <th data-hide="phone">Email</th>
                                                <th data-toggle="true">Bairro</th>
                                                <th data-hide="phone">Numero da casa</th>
                                                <th data-hide="phone"> Numero do quarteirão</th>
                                                <th data-hide="phone">Funcao</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret="SELECT * FROM  funcionario ORDER BY RAND() "; 
                                                //sql code to get to ten docs  randomly
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object())
                                                {
                                            ?>

                                                <tbody>
                                                <tr>
                                                    <td><?php echo $cnt;?></td>
                                                    <td><?php echo $row->primeironome;?> <?php echo $row->apelido;?></td>
                                                    <td><?php echo $row->contacto;?></td>
                                                    <td><?php echo $row->email;?></td> 
                                                    <td><?php echo $row->bairro;?></td>
                                                    <td><?php echo $row->num_casa;?></td>  
                                                    <td><?php echo $row->num_quarteirao;?></td>
                                                    <td><?php echo $row->funcao;?></td>                                                   
                                                    <td><a href="ver_dados_funcionario.php?id=<?php echo $row->id;?>&&doc_number=<?php echo $row->doc_number;?>" class="badge badge-success"><i class="mdi mdi-eye"></i> Ver</a></td>
                                                </tr>
                                                </tbody>
                                            <?php  $cnt = $cnt +1 ; }?>
                                            <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div> <!-- end .table-responsive-->
                                </div> <!-- end card-box -->
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

        <!-- Footable js -->
        <script src="assets/libs/footable/footable.all.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/foo-tables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>