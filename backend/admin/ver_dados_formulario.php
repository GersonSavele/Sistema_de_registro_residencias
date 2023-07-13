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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Formulário</a></li>
                                            <li class="breadcrumb-item active"> Ver Formulário</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Detalhes do Formulário</h4>
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
                                                        <option value="">Ver Todos</option>
                                                    </select>
                                                </div>
                                                <a class="ladda-button btn btn-primary" href="pdfgerator.php" style="font-size: large;">Gerar PDF</a>
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="4">
                                            <thead>
                                            <tr>
    
                                                <th data-hide="phone">ID proprietário</th>
                                                <th data-hide="phone">Nome proprietário</th>
                                                <th data-hide="phone">Nome do Agregado</th>
                                                <th data-hide="phone">Grau parentesco</th>
                                                <th data-hide="phone">Profissão Agregado</th>
                                                <th data-hide="phone">habilitações literarias</th>
                                                <th data-hide="phone">Data nascimento</th>
                                              
                                            </thead>
                                            <?php
                                           
                                                $ret="SELECT * FROM  formulario ORDER BY id_propImovel "; 
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object())
                                                {
                                            ?> 

                                                <tbody>
                                                <tr>
                                                    <td><?php echo $row->id_propImovel;?></td>
                                                    <td><?php echo $row->nome_propImovel;?></td>
                                                    <td><?php echo $row->nome_agreg?></td>
                                                    <td><?php echo $row->grau_parentesco_agreg;?></td>
                                                    <td><?php echo $row->profissao_agreg;?></td>
                                                    <td><?php echo $row->habilitacoes_agreg;?></td>
                                                    <td><?php echo $row->data_nasc_agreg;?> </td>
                                                    
                                                    
                                                    <td><a href="ver_dados_agregado.php?id=<?php echo $row->id_propImovel;?>&&id=<?php echo $row->id;?>" class="badge badge-success"><i class="mdi mdi-eye"></i> Ver</a></td>
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