<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['add_vendor']))
		{
			$v_name=$_POST['v_name'];
			$v_adr=$_POST['v_adr'];
			$v_number=$_POST['v_number'];
            $v_email=$_POST['v_email'];
            $v_phone = $_POST['v_phone'];
            $v_desc = $_POST['v_desc'];
            //$doc_pwd=sha1(md5($_POST['doc_pwd']));
            
            //sql to insert captured values
			$query="INSERT INTO his_vendor (v_name, v_adr, v_number, v_email, v_phone, v_desc) values(?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssss', $v_name, $v_adr, $v_number, $v_email, $v_phone, $v_desc);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Detalles del proveedor agregadosd";
			}
			else {
				$err = "Inténtelo de nuevo o inténtelo más tarde";
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
                                            <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Panel</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">proveedor</a></li>
                                            <li class="breadcrumb-item active">Agregar proveedor</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Agregar detalles de proveedor</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Llenar todos los campos</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Nombre del proveedor</label>
                                                    <input type="text" required="required" name="v_name" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Número de telefono del proveedor</label>
                                                    <input required="required" type="text" name="v_phone" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Direeción de proveedor</label>
                                                    <input required="required" type="text" name="v_adr" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-2" style="display:none">
                                                    <?php 
                                                        $length = 5;    
                                                        $vendor_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Número de proveedor</label>
                                                    <input type="text" name="v_number" value="<?php echo $vendor_number;?>" class="form-control" id="inputZip">
                                                </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Correo de proveedor</label>
                                                <input required="required" type="email" class="form-control" name="v_email" id="inputAddress">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Detalles de proveedor</label>
                                                <textarea  type="text" class="form-control" name="v_desc" id="editor"></textarea>
                                            </div>

                                            <button type="submit" name="add_vendor" class="ladda-button btn btn-success" data-style="expand-right">Agregar proveedor</button>

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
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <script type="text/javascript">
        CKEDITOR.replace('editor')
        </script>

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