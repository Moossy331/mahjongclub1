<?php
    session_start();
    include_once "../inc/helpers.php";
    $userID = $_SESSION['memberID'];
    $role = $_SESSION['role'];
    $clubID = showManagementClubID($userID);

    if(isset($_POST['clubsubmit'])){
        $result = addClub($_POST['clubID'], $_POST['clubName'], $_POST['type'], $_POST['alliance'], $_POST['address'], $_POST['tables'], $_POST['manager'], $_POST['phone'], $_POST['note']);
        echo "<script language='JavaScript'>alert('{$result}');</script>";
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
                                            <li class="breadcrumb-item active" aria-current="page">棋牌社列表</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div> 
                            <div class="create-workform">
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="modal-product-search d-flex">
                                        <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#createClub">
                                            新增棋牌社
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="createClub" tabindex="-1" role="dialog" aria-labelledby="createClubTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="createClubTitle">新增棋牌社</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" class="needs-validation" novalidate>
                                                            <div class="form-row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom01">棋牌社ID</label>
                                                                    <input type="text" class="form-control" id="validationCustom01" name="clubID" required>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom02">名稱</label>
                                                                    <input type="text" class="form-control" id="validationCustom02" name="clubName" required>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom03">類型</label>
                                                                    <input type="text" class="form-control" id="validationCustom03" name="type" required>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom04">聯盟</label>
                                                                    <input type="text" class="form-control" id="validationCustom04" name="alliance" required>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom05">地址</label>
                                                                    <input type="text" class="form-control" id="validationCustom05" name="address" required>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom06">桌數</label>
                                                                    <input type="number" class="form-control" id="validationCustom06" name="tables" required>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom07">聯絡人</label>
                                                                    <input type="text" class="form-control" id="validationCustom07" name="manager" required>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom08">電話</label>
                                                                    <input type="text" class="form-control" id="validationCustom08" name="phone" required>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationCustom09">備註</label>
                                                                    <input type="text" class="form-control" id="validationCustom09" name="note">
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-primary" type="submit" name="clubsubmit">新增</button>
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
                        
                        <!-- TODO：渲染所有棋牌社                 -->
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
                                                            棋牌社ID
                                                        </th>
                                                        <th scope="col">
                                                            名稱
                                                        </th>
                                                        <th scope="col">
                                                            所屬聯盟
                                                        </th>
                                                        <th scope="col">
                                                            地址
                                                        </th>
                                                        <th scope="col">
                                                            總桌數
                                                        </th>
                                                        <th scope="col">
                                                            負責人
                                                        </th>
                                                        <th scope="col">
                                                            電話
                                                        </th>
                                                        <th scope="col">
                                                            備註
                                                        </th>
                                                        <th scope="col" class="text-right"> 
                                                            操作
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        showClub();
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