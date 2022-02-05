<?php
    session_start();
    include_once "../inc/helpers.php";
    $userID = $_SESSION['memberID'];
    $role = $_SESSION['role'];
    $clubID = showManagementClubID($userID);

    if(isset($_POST['userSubmit'])){
        $userMobile = $_POST['userMobile'];
        $result = newUserAdmin($userMobile, $_POST['password'], $_POST['name'], $_POST['email'], $_POST['role'], $_POST['manage'], $_POST['note']);
        echo "<script language='JavaScript'>alert('成功新增賬號：{$userMobile}');</script>";            
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
        include_once "./layouts/frame_admin.php";
    ?>
    <!-- Wrapper Start -->
    <div class="wrapper">

        <!-- 內容開始 -->
        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="d-flex flex-wrap align-items-center justify-content-between my-schedule mb-4">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <div class="d-flex align-items-center justify-content-between">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb p-0 mb-0">
                                            <li class="breadcrumb-item"><a href="./home_admin.blade.php">主頁</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">會員管理</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div> 
                            <div class="create-workform">
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="modal-product-search d-flex">
                                    </div>                            
                                </div>
                            </div>                    
                        </div>
                        
                        <!-- TODO：渲染賬號                 -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-block card-stretch">
                                    <div class="card-body p-0">
                                        <div class="d-flex justify-content-between align-items-center p-3">
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table data-table mb-0">
                                                <thead class="table-color-heading">
                                                    <tr class="">
                                                        <th scope="col">
                                                            賬號
                                                        </th>
                                                        <th scope="col">
                                                            名稱
                                                        </th>
                                                        <th scope="col">
                                                            電子郵箱
                                                        </th>
                                                        <th scope="col">
                                                            權限
                                                        </th>
                                                        <th scope="col">
                                                            管理者
                                                        </th>
                                                        <th scope="col" class="text-right"> 
                                                            操作
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        showAllMember();
                                                    ?>
                                                </tbody>
                                            </table>
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
    </body>
</html>