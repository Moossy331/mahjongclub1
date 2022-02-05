<?php
    session_start();
    include_once "../inc/helpers.php";
    $userID = $_SESSION['memberID'];
    $role = $_SESSION['role'];
    $clubID = showManagementClubID($userID);

    // $_SESSION['userMobile'] = '0955555555';
    // $userMobile = $_SESSION['userMobile'];

    // $clubID = showManagementClubID('0955555555');
    if(isset($_POST['depositSubmit'])){
        $result = deposit($_POST['userMobile'], $clubID, $_POST['coin'], $_POST['note']);
        echo "<script>alert('{$result}')</script>";
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
        include_once "./layouts/frame_counter.php";
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
                                            <li class="breadcrumb-item"><a href="./home_counter.blade.php">主頁</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">會員儲值</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div> 
                            <div class="create-workform">
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="modal-product-search d-flex">
                                        <a href="./home_counter.blade.php" class="btn btn-primary position-relative d-flex align-items-center justify-content-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            返回主頁
                                        </a>
                                    </div>                            
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
                <!-- TODO：渲染所有桌子狀態 -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom02">會員手機號</label>
                                            <input type="text" class="form-control" id="validationCustom02" name="userMobile" onkeyup="value=value.replace(/\D/g,'')" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom03">棋牌社ID</label>
                                            <input type="text" class="form-control" id="validationCustom03" value="<?php echo $clubID ?>" name="clubID" readonly required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom04">儲值金幣</label>
                                            <input type="number" class="form-control" id="validationCustom04" name="coin" min="0">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom05">備註</label>
                                            <input type="text" class="form-control" id="validationCustom05" name="note">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit" name="depositSubmit">儲值</button>
                                </form>
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