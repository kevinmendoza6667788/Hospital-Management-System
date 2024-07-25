
<?php
	session_start();
	include('assets/inc/config.php');
        if(isset($_POST['add_equipments']))
        
        {
        
		    $eqp_code = $_POST['eqp_code'];
			$eqp_name = $_POST['eqp_name'];
            $eqp_vendor = $_POST['eqp_vendor'];
            $eqp_desc = $_POST['eqp_desc'];
            $eqp_dept = $_POST['eqp_dept'];
            $eqp_status = $_POST['eqp_status'];
            $eqp_qty = $_POST['eqp_qty'];
                
            //sql to insert captured values
			$query="INSERT INTO his_equipments (eqp_code, eqp_name, eqp_vendor, eqp_desc, eqp_dept, eqp_status, eqp_qty) VALUES (?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssss', $eqp_code, $eqp_name, $eqp_vendor, $eqp_desc, $eqp_dept, $eqp_status, $eqp_qty);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Equipo agregado";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Quirúrgico/Teatro</a></li>
                                            <li class="breadcrumb-item active">Agregar equipo</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Equipos quirúrgicos</h4>
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
                                                    <label for="inputEmail4" class="col-form-label">Nombre del equipo</label>
                                                    <input type="text" required="required" name="eqp_name" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Proveedor de equipos</label>
                                                    <input required="required" type="text" name="eqp_vendor" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Cantidad de equipos </label>
                                                    <input required="required" type="text"  name="eqp_qty" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-4" style="display:none">
                                                    <label for="inputPassword4" class="col-form-label">
                                                    Departamento de Equipos</label>
                                                    <input required="required" type="text" value="Surgical | Theatre" name="eqp_dept" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-6" style="display:none">
                                                    <label for="inputPassword4" class="col-form-label">Estado de equipo</label>
                                                    <input required="required" type="text" value="Functioning" name="eqp_status" class="form-control"  id="inputPassword4">
                                                </div>
                                                
                                            </div>

                                            <div class="form-group">
                                                    <label for="inputPassword4" class="col-form-label">Código de barras del equipo(EAN-8)</label>
                                                    <?php 
                                                        $length = 10;    
                                                        $bcode =  substr(str_shuffle('0123456789'),1,$length);
                                                    ?>
                                                    <input required="required" readonly type="text" value="<?php echo $bcode;?>" name="eqp_code" class="form-control"  id="inputPassword4">
                                            </div>

                                            <div class="form-group" style="style:display-none">
                                                <label for="inputAddress" class="col-form-label">Descripción de la categoría farmacéutica</label>
                                                <textarea required="required" type="text" class="form-control" name="eqp_desc" id="editor"></textarea>
                                            </div>

                                           <button type="submit" name="add_equipments" class="ladda-button btn btn-success" data-style="expand-right">
                                           Agregar equipo</button>

                                        </form>
                                     
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
        <!--Load CK EDITOR Javascript-->
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <script type="text/javascript">
        CKEDITOR.replace('editor')
        </script>
       
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