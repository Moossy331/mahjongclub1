<?php
    session_start();
    include_once "../inc/helpers.php";
    $memberID = $_SESSION['memberID'];
    $tableID = $_SESSION['tableID'];
    $seatID = $_SESSION['seatID'];
    $clubID = $_SESSION['clubID'];

    // $memberID = $_SESSION['memberID'];
    // $tableID = 'TYN00101';

    // $memberID = '0911111111';

    if(isset($_POST['submitInfo'])){
        $userMobile = $_SESSION['memberID'];
        $result = updateUser($userMobile, $_POST['name'], $_POST['email'], $_POST['note']);
        if($result == "此會員不存在！"){
            echo "<script>alert('{$result}')</script>";
        }else{
            echo "<script>alert('更新成功！')</script>";
        }
    }

    if(isset($_POST['submitNewPWD'])){
        if($_POST['newPWD'] == $_POST['againNewPWD']){
            $userMobile = $_SESSION['memberID'];
            $result = resetPassword($userMobile, $_POST['newPWD']);
            if($result == "此會員不存在！"){
                echo "<script>alert('{$result}')</script>";
            }else{
                echo "<script>alert('更新密碼成功！')</script>";
            }
        }else{
            echo "<script>alert('新密碼兩次不相同！')</script>";
        }
        
    }

    $tabler = showTabler($tableID);
    $result = 0;
    if($tabler == $memberID){
        $result = 1;
    }else{
        $result = 0;
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
    <?php
        include_once "./layouts/frame_member.php";
    ?>

    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- 內容開始 -->
        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex flex-wrap align-items-center justify-content-between my-schedule mb-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="./home.php">主頁</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">個人信息</li>
                                    </ol>
                                </nav>
                            </div>
                            <a href="./home.php"
                                class="btn btn-primary btn-sm d-flex align-items-center justify-content-between">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" viewbox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-2">返回主頁</span>
                            </a>
                        </div>

                        <div class="card">
                            <div class="card-body p-0">
                                <div class="iq-edit-list usr-edit">
                                    <ul class="iq-edit-profile d-flex nav nav-pills">
                                        <li class="col-md-6 p-0">
                                            <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                                個人信息
                                            </a>
                                        </li>
                                        <li class="col-md-6 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                                更改密碼
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="iq-edit-list-data">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="header-title">
                                                <h4 class="card-title">個人信息</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="profile-img-edit">
                                                            <div class="crm-profile-img-edit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" row align-items-center">
                                                    
                                                    <div class="form-group col-sm-6">
                                                        <label for="lname">姓名：</label>
                                                        <input type="text" class="form-control" id="lname" name="name">
                                                    </div>
                                                    
                                                    <div class="form-group col-sm-6">
                                                        <label for="cname">電子郵箱：</label>
                                                        <input type="text" class="form-control" id="cname" name="email"
                                                        placeholder="example@abc.com">
                                                    </div>
                                                    
                                                    <div class="form-group col-sm-6">
                                                        <label>備註：</label>
                                                        <textarea class="form-control" name="note" rows="5"
                                                            style="line-height: 22px;"></textarea>
                                                    </div>
                                                </div>
                                                <button type="reset"
                                                    class="btn btn-outline-primary mr-2">重置</button>
                                                <button type="submit" class="btn btn-primary" name="submitInfo">確認更改</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="header-title">
                                                <h4 class="card-title">更改密碼</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST">
                                                <div class="form-group">
                                                    <label for="cpass">新密碼：</label>
                                                    <input type="Password" class="form-control" id="cpass" value="" name="newPWD">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vpass">驗證新密碼：</label>
                                                    <input type="Password" class="form-control" id="vpass" value="" name="againNewPWD">
                                                </div>
                                                <button type="reset"
                                                    class="btn btn-outline-primary mr-2">重置</button>
                                                <button type="submit" class="btn btn-primary" name="submitNewPWD">確認更改</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 內容結束 -->
    </div>
    <!-- Wrapper End-->
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
      <script>
        var a = <?php echo $result ?>;
        if(a == 0){
            $('#nextRoundButton').attr('type','hidden');
            $('#helpCheck').prop('hidden','hidden');
        }else{
            $('#nextRoundButton').attr('type','button');
            $('#helpCheck').removeAttr('hidden');
        }
    </script>
   </body>
</html>