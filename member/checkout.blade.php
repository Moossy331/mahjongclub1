<?php
    session_start();
    include_once "../inc/helpers.php";
    $memberID = $_SESSION['memberID'];
    $tableID = $_SESSION['tableID'];
    $seatID = $_SESSION['seatID'];
    $clubID = $_SESSION['clubID'];
    
    // $memberID = '0911111111';
    // $tableID = 'TYN00101';


    $seatID = showSeatIDUserMobile($memberID);

    if(isset($_POST['submitCheckOut'])){
        $result = scoring($_POST['winner'], $seatID, $_POST['point']);
        echo "<script>alert('{$result}')</script>";
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

    <div class="wrapper">
        <!-- 內容開始 -->
        <div class="content-page">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <div class="d-flex align-items-center justify-content-between">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="./home.php">主頁</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">結算</li>
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
                    </div>
                    <div class="col-lg-12 mb-3 d-flex justify-content-between">
                        <!-- <h4 class="font-weight-bold0 d-flex align-items-center">結算</h4> -->
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                    </div>
                                    <form class="form-payment" method="POST">
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationDefault02">贏家：</label>
                                                <select class="form-control" id="validationDefault04" required
                                                    name="winner">
                                                    <option selected disabled value="">請選擇贏家</option>
                                                    <?php
                                                        showSeatID($tableID);
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationDefault01">輸家：</label>
                                                <input type="text" class="form-control" id="validationDefault01"
                                                    readonly value="<?php echo $seatID ?>" name="loser">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationDefault01">分數：</label>
                                                <input type="number" class="form-control" id="validationDefault01"
                                                    required name="point" min="0">
                                            </div>
                                            <div class="form-group col-4">
                                                <button class="btn btn-primary" type="submit" name="submitCheckOut">結算</button>
                                            </div>
                                        </div>
                                    </form>
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