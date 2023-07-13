<!--Server side code to handle  sign up-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['admin_sup']))
		{
			$ad_fname=$_POST['ad_fname'];
			$ad_lname=$_POST['ad_lname'];
			$ad_email=$_POST['ad_email'];
			$ad_pwd=sha1(md5($_POST['ad_pwd']));//double encrypt to increase security
            //sql to insert captured values
			$query="insert into his_admin (ad_fname, ad_lname, ad_email, ad_pwd) values(?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssss', $ad_fname, $ad_lname, $ad_email, $ad_pwd);
			$stmt->execute();
			
			if($stmt)
			{
				$success = "Conta criada com sucesso";
			}
			else {
				$err = "Algum erro, tente novamente";
			}
			
			
		}
?>
<!--End Server Side-->
<!--End Login-->
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Sistema de Registro de Residências e Agregado Familiar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!--Load Sweet Alert Javascript-->
        <script src="assets/js/swal.js"></script>
        <!--Inject SWAL-->
        <?php if(isset($success)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success","<?php echo $success;?>","success");
                            },
                                100);
                </script>

        <?php } ?>

        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Failed","<?php echo $err;?>","Failed");
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
                                    <a href="his_admin_register.php">
                                        <span><img src="assets/images/logo-dark.png" alt="" height="22"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Crie uma conta de modo a ter acesso ao sistema</p>
                                </div>

                                <form  method='post'>

                                    <div class="form-group">
                                        <label for="fullname">Primeiro nome</label>
                                        <input class="form-control" type="text"  name = "ad_fname" id="fullname" placeholder="Informe o seu nome" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fullname">Apelido</label>
                                        <input class="form-control" type="text" name="ad_lname" id="fullname" placeholder="Informe o seu apelido" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="emailaddress">Email </label>
                                        <input class="form-control" name="ad_email" type="email" id="emailaddress" required placeholder="Informe o seu email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" name="ad_pwd" type="password" required id="password" placeholder="Informe o seu password">
                                    </div>
                                    
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" name="admin_sup" type="submit"> Sign Up </button>
                                    </div>

                                </form>
                                
                        
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p style="font-size: 18px; color:red">Tem uma conta?  <a href="index.php" style="font-size: 22px; color:black"><b>Logar a minha conta</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!--Footer-->
            <?php include("assets/inc/footer1.php");?>
        <!-- End Footer-->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>