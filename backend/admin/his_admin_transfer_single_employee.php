<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['trans_dept']))
		{
            $doc_dept=$_POST['doc_dept'];
            $doc_number = $_GET['doc_number'];

            //sql to insert captured values
			$query="UPDATE his_docs SET doc_dept=? WHERE doc_number = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ss', $doc_dept, $doc_number);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Empleado transferido";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Empleado</a></li>
                                            <li class="breadcrumb-item active">Tranferir empleado</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Transferir empleado de un departamento a otror</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <?php
                            $doc_number=$_GET['doc_number'];
                            $ret="SELECT  * FROM his_docs WHERE doc_number=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$doc_number);
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
                                        <h4 class="header-title">Llenar todos los campos</h4>
                                        <!--Add Patient Form-->
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Nombre</label>
                                                    <input type="text" required="required" readonly value="<?php echo $row->doc_fname;?>" name="doc_fname" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Apellido</label>
                                                    <input required="required" type="text" readonly value="<?php echo $row->doc_lname;?>" name="doc_lname" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Correo</label>
                                                <input required="required" type="email" readonly value="<?php echo $row->doc_email;?>" class="form-control" name="doc_email" id="inputAddress">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Número de empleado</label>
                                                <input required="required" type="email" readonly value="<?php echo $row->doc_number;?>" class="form-control" name="doc_email" id="inputAddress">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Departamento de trabajo actual del empleado </label>
                                                <input required="required" type="email" readonly value="<?php echo $row->doc_dept;?>" class="form-control" name="doc_email" id="inputAddress">
                                            </div>
                                            
                                            <div class="form-group">
                                                    <label for="inputState" class="col-form-label">Departamento de Transferencia</label>
                                                    <select id="inputState" required="required" name="doc_dept" class="form-control">
                                                        <option>Elegir</option>
                                                        <option>Patient Registration</option>
                                                        <option>
                                                        Registro de pacientes</option>
                                                        <option>Farmacia</option>
                                                        <option>Contabilidad</option>
                                                        <option>Cirugía | Quirófano</option>
                                                    </select>
                                            </div>                                         

                                            <button type="submit" name="trans_dept" class="ladda-button btn btn-success" data-style="expand-right">Transferir empleado</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        <?php }?>

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