<?php
   session_start();
   include_once "../inc/helpers.php";
   // 會員
   if(isset($_POST['wmsLogin'])){
      $memberID = $_POST['memberID'];
      $memberPWD = $_POST['memberPWD'];
      $result = login($memberID, $memberPWD);
      
      if($result == '此會員不存在！'){
         echo "<script language='JavaScript'>alert('賬號或密碼錯誤！');</script>";
      }elseif($result == '0'){
         echo "<script language='JavaScript'>alert('賬號或密碼錯誤！');</script>";
      }elseif($result == '6'){
         // ADMIN
         $_SESSION['memberID'] = $memberID;
         $_SESSION['role'] = $result;
         echo "<script language='JavaScript'>alert('登入成功');</script>";
         $url = "../admin/home_admin.blade.php";
         $time = 0;
         header("refresh:{$time};url={$url}");
      }elseif($result == '5'){
         // 客服
         $_SESSION['memberID'] = $memberID;
         $_SESSION['role'] = $result;
         echo "<script language='JavaScript'>alert('登入成功');</script>";
         // $url = "../admin/home_admin.blade.php";
         // $time = 0;
         // header("refresh:{$time};url={$url}");
      }elseif($result == '4'){
         // 幣商
         $_SESSION['memberID'] = $memberID;
         $_SESSION['role'] = $result;
         echo "<script language='JavaScript'>alert('登入成功');</script>";
         // $url = "../admin/home_admin.blade.php";
         // $time = 0;
         // header("refresh:{$time};url={$url}");
      }elseif($result == '3'){
         // 代理
         $_SESSION['memberID'] = $memberID;
         $_SESSION['role'] = $result;
         echo "<script language='JavaScript'>alert('登入成功');</script>";
         // $url = "../admin/home_admin.blade.php";
         // $time = 0;
         // header("refresh:{$time};url={$url}");
      }elseif($result == '2'){
         // 櫃檯
         $_SESSION['memberID'] = $memberID;
         $_SESSION['role'] = $result;
         echo "<script language='JavaScript'>alert('登入成功');</script>";
         $url = "../counter/home_counter.blade.php";
         $time = 0;
         header("refresh:{$time};url={$url}");
      }
   }

   // 註冊
   if(isset($_POST['registerSubmit'])){
      $registerID = $_POST['registerID'];
      $result = newUser($registerID, $_POST['registerPWD'], $_POST['registerName'], $_POST['registerIDNum'], $_POST['registerEmail'], $_POST['registerNote']);

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
                              
                           </ul>
                           <div class="tab-content" id="pills-tabContent-1">
                              <div class="tab-pane fade show active" id="pills-home-fill" role="tabpanel"
                                 aria-labelledby="pills-home-tab-fill">
                                 <h2 class="mb-2 text-center">後台登入</h2>
                                 <form action="#" method="POST">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="form-group">
                                             <label>賬號</label>
                                             <input class="form-control" type="text" placeholder="請輸入賬號" name="memberID" style="letter-spacing: 5px;">
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
                                       <button type="submit" class="btn btn-primary" name="wmsLogin">登入</button>
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