<?php
   session_start();
   include_once "../inc/helpers.php";
   // 會員
   if(isset($_POST['memberLogin'])){
      // $memberID = $_POST['memberID'];
      // $memberPWD = $_POST['memberPWD'];
      $result = signupSeatU($_POST['seatID'], $_POST['tableCode'], $_POST['memberID'], $_POST['memberPWD']);
      $_SESSION['memberID'] = $_POST['memberID'];
      $_SESSION['tableID'] = $_POST['tableID'];
      $_SESSION['seatID'] = $_POST['seatID'];
      $_SESSION['clubID'] = $_POST['clubID'];

      echo "<script>alert('{$result}')</script>";
      $url = "../member/home.php";
      $time = 0;
      header("refresh:{$time};url={$url}");
   }

   // 一般用戶
   if(isset($_POST['notMemberLogin'])){
      // $seatID = $_POST['seatID'];
      $result = connectSeat($_POST['seatID'], $_POST['tableCode']);
      // $_SESSION['memberID'] = $_POST['memberID'];
      $_SESSION['tableID'] = $_POST['tableID'];
      $_SESSION['seatID'] = $_POST['seatID'];
      
      echo "<script>alert('{$result}')</script>";
      $url = "../notMember/home.blade.php";
      $time = 0;
      header("refresh:{$time};url={$url}");
   }

   // 註冊
   if(isset($_POST['registerSubmit'])){
      $registerID = $_POST['registerID'];
      newUser($registerID, $_POST['registerPWD'], $_POST['registerName'], $_POST['registerEmail'], $_POST['registerNote']);

      echo "<script>alert('用戶 {$registerID} 註冊成功！')</script>";
   }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>管理後台</title>

    <link rel="stylesheet" href="../static/css/backend.css" >
    <link rel="stylesheet" href="../static/css/main.css" >
    <link rel="stylesheet" href="../static/css/main1.css" >
    <link rel="stylesheet" href="../static/css/main2.css" >
    <link rel="stylesheet" href="../static/css/main3.css" >
    <link rel="stylesheet" href="../static/css/backend-plugin.min.css" >
    <link rel="stylesheet" href="../static/css/backend.css" >

    <!-- 生成QR-Code的JS -->
    <script src="../static/js/qrcode.min.js"></script>
    
</head>
<body>

<!-- loader Start -->
    <!-- loader END -->

      <div class="wrapper">
         <section class="login-content">
            <div class="container h-100">
               <div class="row align-items-center justify-content-center h-100">
                  <div class="col-md-5">
                     <div class="card">
                        <div class="card-body">
                           <div class="auth-logo">
                              <!-- <img src="static/picture/logo.png" class="img-fluid rounded-normal" alt="logo"> -->
                           </div>
                           <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
                              <li class="nav-item">
                                 <a class="nav-link active" id="pills-home-tab-fill" data-toggle="pill"
                                    href="#pills-home-fill" role="tab" aria-controls="pills-home"
                                    aria-selected="true">會員登入</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="pills-profile-tab-fill" data-toggle="pill"
                                    href="#pills-profile-fill" role="tab" aria-controls="pills-profile"
                                    aria-selected="false">一般用戶</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="pills-contact-tab-fill" data-toggle="pill"
                                    href="#pills-contact-fill" role="tab" aria-controls="pills-contact"
                                    aria-selected="false">註冊會員</a>
                              </li>
                           </ul>
                           <div class="tab-content" id="pills-tabContent-1">
                              <div class="tab-pane fade show active" id="pills-home-fill" role="tabpanel"
                                 aria-labelledby="pills-home-tab-fill">
                                 <h2 class="mb-2 text-center">會員登入</h2>
                                 <form action="#" method="POST">
                                    <div class="row">
                                       <input type="hidden" name="seatID" value="<?php echo $_GET['seatID'] ?>">
                                       <input type="hidden" name="tableID" value="<?php echo $_GET['tableID'] ?>">
                                       <input type="hidden" name="clubID" value="<?php echo $_GET['clubID'] ?>">
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label>推薦碼</label>
                                             <input class="form-control" type="text" placeholder="請輸入桌長手機號後四位" name="tableCode" style="letter-spacing: 5px;">
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label>手機號</label>
                                             <input class="form-control" type="text" placeholder="請輸入手機號" name="memberID" style="letter-spacing: 5px;">
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label>密碼</label>
                                             <input class="form-control" type="password" placeholder="請輸入密碼" name="memberPWD" style="letter-spacing: 5px;">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                       <span></span>
                                       <button type="submit" class="btn btn-primary" name="memberLogin">登入</button>
                                    </div>
                                 </form>
                              </div>
                              <div class="tab-pane fade" id="pills-profile-fill" role="tabpanel"
                                 aria-labelledby="pills-profile-tab-fill">
                                 <h2 class="mb-2 text-center">用戶登入</h2>
                                 <form method="POST">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <!-- <label>座位</label> -->
                                             <input class="form-control" type="hidden" placeholder="請設置登入密碼" style="letter-spacing: 5px;" name="seatID" value="<?php echo $_GET['seatID'] ?>">
                                             <input type="hidden" name="tableID" value="<?php echo $_GET['tableID'] ?>">
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label>推薦碼</label>
                                             <input class="form-control" type="text" placeholder="請輸入桌長手機號後四位(英文或數字,最長16位)" name="tableCode" style="letter-spacing: 5px;" onkeyup="value=value.replace(/[^\w]|_/ig,'')" maxlength="16">
                                          </div>
                                       </div>
                                       <!-- <div class="col-lg-12">
                                          <div class="form-group">
                                             <label>設置密碼</label>
                                             <input class="form-control" type="password" placeholder="請設置密碼(英文或數字,最長16位)" name="password" style="letter-spacing: 5px;" onkeyup="value=value.replace(/[^\w]|_/ig,'')" maxlength="16">
                                          </div>
                                       </div> -->
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                       <span></span>
                                       <button type="submit" class="btn btn-primary" name="notMemberLogin">登入</button>
                                    </div>
                                 </form>
         
                              </div>
                              <div class="tab-pane fade" id="pills-contact-fill" role="tabpanel"
                                 aria-labelledby="pills-contact-tab-fill">
                                 <h2 class="mb-2 text-center">會員註冊</h2>
                                 <form method="POST">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label>手機號碼</label>
                                             <input class="form-control" type="text" placeholder="請輸入手機號碼" name="registerID" style="letter-spacing: 5px;" required>
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label>密碼</label>
                                             <input class="form-control" type="text" placeholder="請設置密碼(英文或數字,最長16位)" name="registerPWD" style="letter-spacing: 5px;"  onkeyup="value=value.replace(/[^\w]|_/ig,'')" maxlength="16" required>
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label>名稱</label>
                                             <input class="form-control" type="text" placeholder="請輸入名稱" name="registerName" style="letter-spacing: 5px;">
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label>電子郵箱</label>
                                             <input class="form-control" type="text" placeholder="請輸入電子郵箱" name="registerEmail" style="letter-spacing: 5px;">
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label>備註</label>
                                             <input class="form-control" type="text" placeholder="請輸入備註" name="registerNote" style="letter-spacing: 5px;">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                       <span></span>
                                       <button type="submit" class="btn btn-primary" name="registerSubmit">註冊</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
   <!-- footer開始 -->
   <footer class="iq-footer">
   </footer> 
   <!-- footer結束 -->

      <!-- Backend Bundle JavaScript -->
      <script src="../static/js/backend-bundle.min.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="../static/js/customizer.js"></script>

      <script src="../static/js/sidebar.js"></script>

      <!-- Flextree Javascript-->
      <script src="../static/js/flex-tree.min.js"></script>
      <script src="../static/js/tree.js"></script>

      <!-- Table Treeview JavaScript -->
      <script src="../static/js/table-treeview.js"></script>

      <!-- SweetAlert JavaScript -->
      <script src="../static/js/sweetalert.js"></script>

      <!-- Vectoe Map JavaScript -->
      <script src="../static/js/vector-map-custom.js"></script>

      <!-- Chart Custom JavaScript -->
      <script src="../static/js/chart-custom.js"></script>
      <script src="../static/js/01.js"></script>
      <script src="../static/js/02.js"></script>

      <!-- slider JavaScript -->
      <script src="../static/js/slider.js"></script>

      <!-- Emoji picker -->
      <script src="../static/js/index.js" type="module"></script>


      <!-- app JavaScript -->
      <script src="../static/js/app.js"></script>
   </body>
</html>