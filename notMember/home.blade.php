<?php
    session_start();
    include_once "../inc/helpers.php";
    $tableID = $_SESSION['tableID'];
    $seatID = $_SESSION['seatID'];
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
        include_once "./layouts/frame_Nmember.php";
    ?>

    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- 內容開始 -->
        <div class="content-page">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12 mb-4 mt-1">

                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-6 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <p class="mb-2 font-weight-bold">賬戶金幣</p>
                                                <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                    <h5 class="mb-0 text-danger font-weight-bold">$95,595</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <p class="mb-2 font-weight-bold">棋牌桌號</p>
                                                <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                    <h5 class="mb-0 text-danger font-weight-bold">$12,789</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <p class="mb-2 font-weight-bold">遊戲場次</p>
                                                <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                    <h5 class="mb-0 text-danger font-weight-bold">13,984</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <p class="mb-2 font-weight-bold">遊戲座位</p>
                                                <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                    <h5 class="mb-0 text-danger font-weight-bold">13,984</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <p class="mb-2 font-weight-bold">遊戲分數</p>
                                                <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                    <h5 class="mb-0 text-danger font-weight-bold">13,984</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <p class="mb-2 font-weight-bold">勝負分數</p>
                                                <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                    <h5 class="mb-0 text-danger font-weight-bold">13,984</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="cart">
                                    <div class="card-body">
                                        <div class="align-items-center">
                                            <div class="d-flex align-items-center">
                                                <button type="button" class="btn btn-primary btn-block" onclick="location.href='./checkout.blade.php'">遊戲點數結算</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page end  -->
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