<?php
    session_start();
    include_once "../inc/helpers.php";
    $memberID = $_SESSION['memberID'];
    $tableID = $_SESSION['tableID'];
    $seatID = $_SESSION['seatID'];
    $clubID = $_SESSION['clubID'];
    // $memberID = '0911111111';
    // $tableID = 'TYN00101';

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
                                        <li class="breadcrumb-item active" aria-current="page">遊戲報表</li>
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
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-block card-stretch">
                                    <div class="card-body p-0">
                                        <div class="d-flex justify-content-between align-items-center p-3">
                                            <form class="col">
                                            <!-- <div class="form-group mb-0">
                                                </div> -->
                                                <input name="reportTime" type="date" class="form-control col" id="exampleInputdate" value="">
                                                <button type="submit" class="mt-2 btn btn-primary btn-with-icon col" name="submitDate">確認日期</button>
                                        </form>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table data-table mb-0">
                                                <thead class="table-color-heading">
                                                    <tr class="text-light">
                                                        <th scope="col">
                                                            <label class="text-muted mb-0">場次</label>
                                                        </th>
                                                        <th scope="col">
                                                            <label class="text-muted mb-0">東</label>
                                                        </th>
                                                        <th scope="col">
                                                            <label class="text-muted mb-0">南</label>
                                                        </th>
                                                        <th scope="col">
                                                            <label class="text-muted mb-0">西</label>
                                                        </th>
                                                        <th scope="col">
                                                            <label class="text-muted mb-0">北</label>
                                                        </th>
                                                        <!-- <th scope="col">
                                                            <span class="text-muted">操作</span>
                                                        </th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        showGameScore($tableID);
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
        <!-- 內容結束 -->
        </div>
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