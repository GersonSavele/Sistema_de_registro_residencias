<?php
    session_start();
    include('assets/inc/config.php');
    if(isset($_POST['doc_login']))
    {
        $doc_number = $_POST['doc_number'];
        //$doc_email = $_POST['doc_ea']
        $doc_pwd = sha1(md5($_POST['doc_pwd']));
        $stmt=$mysqli->prepare("SELECT doc_number, doc_pwd, doc_id FROM his_docs WHERE  doc_number=? AND doc_pwd=? ");//sql to log in user
        $stmt->bind_param('ss', $doc_number, $doc_pwd);
        $stmt->execute();
        $stmt -> bind_result($doc_number, $doc_pwd ,$doc_id);
        $rs=$stmt->fetch();
        $_SESSION['doc_id'] = $doc_id;
        $_SESSION['doc_number'] = $doc_number;
        if($rs)
            {
                header("location:his_doc_dashboard.php");
            }

        else
            {
            
                $err = "Acesso negado Verifique suas credenciais";
            }
    }
?>
<!--Fim Login-->
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Sistema de Registro de Residências e Agregado Familiar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!--Carregar Sweet Alert Javascript-->
        
        <script src="assets/js/swal.js"></script>
        <!--Injetar SWAL-->
        <?php if(isset($success)) {?>
                <script>
                            setTimeout(function () 
                            { 
                                swal("Sucesso","<?php echo $success;?>"," Sucesso";
                            },
                                100);
                </script>

        <?php } ?>

        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Falha","<?php echo $err;?>","Erro");
                            },
                                100);
                </script>

        <?php } ?>



    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.php">
                                        <span><img src="assets/images/logo-dark.png" alt="" height="22"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Digite seu endereço de e-mail e senha para acessar o painel Médico.</p>
                                </div>

                                <form method='post' >

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Número do médico</label>
                                        <input class="form-control" name="doc_number" type="text" id="emailaddress" required="" placeholder="Digite o número do seu médico">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Senha</label>
                                        <input class="form-control" name="doc_pwd" type="password" required="" id="password" placeholder="Coloque sua senha">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" name="doc_login" type="submit"> Log In </button>
                                    </div>

                                </form>

                                <!--
                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">Sign in with</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div> 
                                -->

                            </div> 
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="his_doc_reset_pwd.php" class="text-white-50 ml-1">Esqueceu sua senha?</a></p>
                               <p class="text-white-50">Não tem uma conta? <a href="his_admin_register.php" class="text-white ml-1"><b>Sign Up</b></a></p>
                            </div> 
                        </div>
                        <!-- end row -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <?php include ("assets/inc/footer1.php");?>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>