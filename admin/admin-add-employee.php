 <!--Server side code to handle passenger sign up-->
 <?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['Create_Profile']))
		{
			$emp_fname=$_POST['emp_fname'];
			#$mname=$_POST['mname'];
			$emp_lname=$_POST['emp_lname'];
			$emp_nat_idno=$_POST['emp_nat_idno'];
      $emp_phone=$_POST['emp_phone'];
      $emp_addr = $_POST['emp_addr'];
			$emp_uname=$_POST['emp_uname'];
      $emp_email=$_POST['emp_email'];
      $emp_dept=$_POST['emp_dept'];
			$emp_pwd=sha1(md5($_POST['emp_pwd']));
      //sql to insert captured values
			$query="insert into orrs_employee (emp_fname, emp_lname, emp_phone, emp_addr, emp_nat_idno, emp_uname, emp_email, emp_dept, emp_pwd) values(?,?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssssss',$emp_fname, $emp_lname, $emp_phone, $emp_addr, $emp_nat_idno, $emp_uname, $emp_email, $emp_dept, $emp_pwd);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Tạo tài khoản nhân viên thành công!";
			}
			else {
				$err = "Có lỗi. Vui lòng thử lại";
			}
			
			
		}
?>
<!--End Server Side-->

<!DOCTYPE html>
<html lang="en">
<!--Head-->
<?php include('assets/inc/head.php');?>
<!--End Head-->
  <body>
    <div class="be-wrapper be-fixed-sidebar ">
    <!--Navigation Bar-->
	<!--Log on to codeastro.com for more projects!-->
      <?php include('assets/inc/navbar.php');?>
      <!--End Navigation Bar-->

      <!--Sidebar-->
      <?php include('assets/inc/sidebar.php');?>
      <!--End Sidebar-->
      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Thêm nhân viên</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="#">Nhân viên</a></li>
              <li class="breadcrumb-item active">Thêm</li>
            </ol>
          </nav>
        </div>
            <?php if(isset($success)) {?>
                                <!--This code for injecting an alert-->
            <script>
              setTimeout(function () 
              { 
                  swal("Success!","<?php echo $success;?>!","success");
              },
                  100);
            </script>

        <?php } ?>
        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
        <script>
          setTimeout(function () 
          { 
              swal("Failed!","<?php echo $err;?>!","Failed");
          },
              100);
        </script>

        <?php } ?>
        <div class="main-content container-fluid">
       
          <div class="row">
            <div class="col-md-12">
			<!--Log on to codeastro.com for more projects!-->
              <div class="card card-border-color card-border-color-success">
                <div class="card-header card-header-divider">Tạo tài khoản nhân viên<span class="card-subtitle">Hãy điền đầy đủ thông tin</span></div>
                <div class="card-body">
                  <form method ="POST">
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Họ</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="emp_fname"  id="inputText3" type="text" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Tên</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="emp_lname"  id="inputText3" type="text" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Quốc tịch</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="emp_nat_idno"  id="inputText3" type="text" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Số điện thoại</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="emp_phone"  id="inputText3" type="text" required>
                      </div>
                    </div>
					<!--Log on to codeastro.com for more projects!-->
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Địa chỉ</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="emp_addr"  id="inputText3" type="text" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Chức vụ</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="emp_dept"  id="inputText3" type="text" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Email</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="emp_email"  id="inputText3" type="email" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Tên đăng nhập</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="emp_uname"  id="inputText3" type="text" required>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Mật khẩu</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="emp_pwd"  id="inputText3" type="password" required>
                      </div>
                    </div>
					<!--Log on to codeastro.com for more projects!-->
                    <div class="col-sm-6">
                        <p class="text-right">
                          <input class="btn btn-space btn-success" value ="Thêm mới " name = "Create_Profile" type="submit">
                          <button class="btn btn-space btn-danger">Hủy</button>
                        </p>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
       
        
        
        </div>
        <!--footer-->
        <?php include('assets/inc/footer.php');?>
        <!--EndFooter-->
      </div>
	  <!--Log on to codeastro.com for more projects!-->

    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
    <script src="assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
    <script src="assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap-slider/bootstrap-slider.min.js" type="text/javascript"></script>
    <script src="assets/lib/bs-custom-file-input/bs-custom-file-input.js" type="text/javascript"></script>
    <script src="assets/js/swal.js" type="text/javascript"></script>

    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.formElements();
      });
    </script>
  </body>

</html>