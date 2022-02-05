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
                                            <li class="breadcrumb-item active" aria-current="page">賬號列表</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div> 
                            <div class="create-workform">
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="modal-product-search d-flex">
                                        <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#createClub">
                                            新增賬號
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="createClub" tabindex="-1" role="dialog" aria-labelledby="createClubTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="createClubTitle">新增賬號</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" class="needs-validation" novalidate>
                                                            <div class="form-row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom01">賬號</label>
                                                                    <input type="text" class="form-control" id="validationCustom01" name="userMobile" required>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom02">密碼</label>
                                                                    <input type="text" class="form-control" id="validationCustom02" name="password" required>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom03">名稱</label>
                                                                    <input type="text" class="form-control" id="validationCustom03" name="name" required>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom04">電子郵箱</label>
                                                                    <input type="email" class="form-control" id="validationCustom04" name="email" required>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom05">賬號類型</label>
                                                                    <select class="form-control form-control-sm mb-3" id="validationCustom05" name="role">
                                                                        <option selected="">請選擇一個類型</option>
                                                                        <option value="5">客服</option>
                                                                        <option value="4">幣商</option>
                                                                        <option value="3">代理</option>
                                                                        <option value="2">櫃檯</option>
                                                                    </select>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom06">負責人賬號</label>
                                                                    <input type="text" class="form-control" id="validationCustom06" name="manage">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom07">備註</label>
                                                                    <input type="text" class="form-control" id="validationCustom07" name="note">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-primary" type="submit" name="userSubmit">新增</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                                            負責人賬號
                                                        </th>
                                                        <th scope="col" class="text-right"> 
                                                            操作
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        showAllUser();
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