<?php
    session_start();
    include_once "../inc/helpers.php";
    $userID = $_SESSION['memberID'];
    $role = $_SESSION['role'];
    $clubID = showManagementClubID($userID);

    if(isset($_POST['newGameSubmit'])){
        $fee = (float)$_POST['fee'];
        $result = newGame($_POST['tableID'], $_POST['tablerMobile'],$_POST['rounds'], $_POST['score'], $fee, $_POST['note']);
        echo "<script>alert('{$result}');</script>";
    }

    if(isset($_POST['newGameTSubmit'])){
        $result = newGameT($_POST['newGameTtableID'], $_POST['newGameTtablerMobile'], $_POST['newGameTrounds'], $_POST['newGameTscore'], $_POST['newGameTdiposet'], $_POST['newGameTrate'], $_POST['newGameTnote']);
        echo "<script>alert('{$result}');</script>";
    }

    // $clubID = 'TYN001';
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
                                            <li class="breadcrumb-item"><a href="home_counter">主頁</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">棋牌桌管理</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div> 
                            <div class="create-workform">
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="modal-product-search d-flex">
                                        <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#createTable">
                                            開台
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="createTable" tabindex="-1" role="dialog" aria-labelledby="createTableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="createTableTitle">開台</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="pills-home-tab-fill" data-toggle="pill" href="#pills-home-fill" role="tab" aria-controls="pills-home" aria-selected="true">一般開台</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="pills-profile-tab-fill" data-toggle="pill" href="#pills-profile-fill" role="tab" aria-controls="pills-profile" aria-selected="false">計時開台</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="pills-tabContent-1">
                                                        <div class="tab-pane fade show active" id="pills-home-fill" role="tabpanel" aria-labelledby="pills-home-tab-fill">
                                                            <div class="modal-body">
                                                                <form method="POST" class="needs-validation" novalidate>
                                                                    <div class="form-row">
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="validationCustom01">桌號</label>
                                                                            <div class="form-group">
                                                                                <select class="form-control form-control-sm mb-3" name="tableID">
                                                                                    <option selected="">請選擇桌號</option>
                                                                                    <?php
                                                                                        newGameShowTables('TYN001');
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="validationCustom02">桌長賬號</label>
                                                                            <input type="text" class="form-control" id="validationCustom02" name="tablerMobile" required>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="validationCustom03">場數</label>
                                                                            <input type="text" class="form-control" id="validationCustom03" name="rounds" required>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="validationCustom04">基礎分數</label>
                                                                            <input type="number" class="form-control" id="validationCustom04" name="score" required>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="validationCustom05">服務費</label>
                                                                            <input type="text" class="form-control" id="validationCustom05" name="fee">
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="validationCustom06">備註</label>
                                                                            <input type="text" class="form-control" id="validationCustom06" name="note">
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-primary" type="submit" name="newGameSubmit">新增</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-profile-fill" role="tabpanel" aria-labelledby="pills-profile-tab-fill">
                                                            <div class="modal-body">
                                                                <form method="POST" class="needs-validation" novalidate>
                                                                    <div class="form-row">
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="validationCustom01">桌號</label>
                                                                            <div class="form-group">
                                                                                <select class="form-control form-control-sm mb-3" name="newGameTtableID">
                                                                                    <option selected="">請選擇桌號</option>
                                                                                    <?php
                                                                                        newGameShowTables('TYN001');
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="validationCustom02">桌長賬號</label>
                                                                            <input type="text" class="form-control" id="validationCustom02" name="newGameTtablerMobile" required>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="validationCustom03">場數</label>
                                                                            <input type="text" class="form-control" id="validationCustom03" name="newGameTrounds" required>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="validationCustom04">基礎分數</label>
                                                                            <input type="number" class="form-control" id="validationCustom04" name="newGameTscore" min='0' required>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="validationCustom05">押金</label>
                                                                            <input type="number" class="form-control" id="validationCustom05" min='0' name="newGameTdiposet">
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-12 mb-3">
                                                                            <label>計價（分鐘）</label>
                                                                            <select class="form-control form-control-sm mb-3" name="newGameTrate">
                                                                                <option selected="">選擇一個價格</option>
                                                                                <option value="100">1元</option>
                                                                                <option value="110">1.1元</option>
                                                                                <option value="120">1.2元</option>
                                                                                <option value="130">1.3元</option>
                                                                                <option value="140">1.4元</option>
                                                                                <option value="150">1.5元</option>
                                                                                <option value="160">1.6元</option>
                                                                                <option value="170">1.7元</option>
                                                                                <option value="180">1.8元</option>
                                                                                <option value="190">1.9元</option>
                                                                                <option value="200">2元</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="validationCustom06">備註</label>
                                                                            <input type="text" class="form-control" id="validationCustom06" name="newGameTnote">
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-primary" type="submit" name="newGameTSubmit">新增</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <a href="friends_add" class="btn btn-primary position-relative d-flex align-items-center justify-content-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            添加好友
                                        </a> -->
                                    </div>                            
                                </div>
                            </div>                    
                        </div>

                        <!-- TODO：渲染所有桌子狀態 -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-block card-stretch">
                                    <div class="card-body p-0">
                                        <div class="d-flex justify-content-between align-items-center p-3">
                                            <div class="custom-control custom-switch custom-switch-text custom-control-inline">
                                                <div class="custom-switch-inner">
                                                    
                                                </div>
                                                </div>
                                                <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                                                <div class="custom-switch-inner">

                                                </div>
                                                </div>
                                                <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                                                <div class="custom-switch-inner">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table data-table mb-0">
                                                <thead class="table-color-heading">
                                                    <tr class="">
                                                        <th scope="col">
                                                            桌號
                                                        </th>
                                                        <th scope="col">
                                                            狀態
                                                        </th>
                                                        <th scope="col" class="text-right"> 
                                                            操作
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if(isset($_GET['closetableID'])){
                                                            $result = closeGame($_GET['closetableID']);
                                                            echo "<script>alert('{$result}')</script>";
                                                        }
                                                        showAllTables($clubID);
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