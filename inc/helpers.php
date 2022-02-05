<?php
    define('DBhost','localhost');
    define('DBuser','root');
    define('DBpassword','900331');
    define('DBname','mahjongClub');
    define('DBport',3306);


    
    function connect($host=DBhost,$user=DBuser,$password=DBpassword,$database=DBname,$port=DBport){
        $link = mysqli_connect($host,$user,$password,$database,$port);
        if(mysqli_connect_errno()){
            exit(mysqli_connect_error());
        }
        mysqli_set_charset($link,'utf8');
        return $link;
    }

// 登入端
    // 登入驗證用戶
    function login($userID, $userPWD){
        $link = connect();
        mysqli_query($link, 'set @role = "";');
        mysqli_query($link, "call sp_login('$userID', '$userPWD', @role);");
        $sql = mysqli_query($link, 'select @role;');
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

// 管理端
    // 新增賬號
    function newUserAdmin($userMobile, $password, $name, $email, $role, $manage, $note){
        $link = connect();
        $sqlcount = mysqli_query($link, "select count(*) from `tb_user` where userMobile = '$userMobile';");
        $datacount = mysqli_fetch_row($sqlcount);
        if($datacount[0] == 0){
            $sql = mysqli_query($link, "call sp_newUser('$userMobile', '$password', '$name', '$email', $role, '$manage', '', '$note');");
            $data = mysqli_fetch_row($sql);
            return $data[0];
        }else{
            return "已有重複賬號！";
        }
        
    }

    // 新增棋牌社
    function addClub($clubID, $clubName, $clubType, $alliance, $address, $tables, $manager, $phone, $note){
        $link = connect();
        $sql = mysqli_query($link, "call sp_newClub('$clubID', '$clubName', '$clubType', '$alliance', '$address', $tables, '$manager', '$phone', '$note');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

    // 渲染所有棋牌社
    // TODO：需要procedure
    function showClub(){
        $link = connect();
        $sql = mysqli_query($link, "SELECT * FROM tb_club;");
        while($data = mysqli_fetch_assoc($sql)){
            echo '<tr class="white-space-no-wrap">';
            echo "<td >{$data['clubID']}</td>";
            echo "<td class='text-center'>{$data['name']}</td>";
            echo "<td class='text-center'>{$data['alliance']}</td>";
            echo "<td class='text-center'>{$data['address']}</td>";
            echo "<td class='text-center'>{$data['tables']}</td>";
            echo "<td class='text-center'>{$data['manager']}</td>";
            echo "<td class='text-center'>{$data['phone']}</td>";
            echo "<td class='text-center'>{$data['note']}</td>";
            echo "<td><div class='d-flex justify-content-end align-items-center'><a data-placement='top' data-original-title='View' href='../admin/show_club.blade.php?clubID={$data['clubID']}'>&nbsp&nbsp&nbsp操作&nbsp&nbsp</a></div></td>";
            echo '</tr>';
        }
    }

    // 渲染所有管理賬號
    // TODO：
    function showAllUser(){
        $link = connect();
        $sql = mysqli_query($link, "select * from `tb_user` where role > 1 and role < 6;");
        while($data = mysqli_fetch_assoc($sql)){
            echo '<tr class="white-space-no-wrap">';
            echo "<td >{$data['userMobile']}</td>";
            echo "<td class='text-center'>{$data['name']}</td>";
            echo "<td class='text-center'>{$data['email']}</td>";
            if($data['role'] == 2){
                echo "<td class='text-center'>櫃檯</td>";
            }elseif($data['role'] == 3){
                echo "<td class='text-center'>代理</td>";
            }elseif($data['role'] == 4){
                echo "<td class='text-center'>幣商</td>";
            }else{
                echo "<td class='text-center'>客服</td>";
            }
            echo "<td class='text-center'>{$data['management']}</td>";
            echo "<td><div class='d-flex justify-content-end align-items-center'><a data-placement='top' data-original-title='View' href='../admin/passwordRevise.php?userID={$data['userMobile']}'>&nbsp&nbsp&nbsp重置密碼&nbsp&nbsp</a></div></td>";
            echo '</tr>';
        }
    }

    // 渲染所有會員賬號
    // TODO：
    function showAllMember(){
        $link = connect();
        $sql = mysqli_query($link, "select * from `tb_user` where role = 1;");
        while($data = mysqli_fetch_assoc($sql)){
            echo '<tr class="white-space-no-wrap">';
            echo "<td >{$data['userMobile']}</td>";
            echo "<td class='text-center'>{$data['name']}</td>";
            echo "<td class='text-center'>{$data['email']}</td>";
            if($data['role'] == 1){
                echo "<td class='text-center'>會員</td>";
            }
            echo "<td class='text-center'>{$data['management']}</td>";
            echo "<td><div class='d-flex justify-content-end align-items-center'><a data-placement='top' data-original-title='View' href='../admin/passwordRevise.php?userID={$data['userMobile']}'>&nbsp&nbsp&nbsp重置密碼&nbsp&nbsp</a></div></td>";
            echo '</tr>';
        }
    }

// 櫃檯
    // 開台
    function newGame($tableID, $tablerMobile,$rounds, $score, $fee, $note){
        $link = connect();
        $sql = mysqli_query($link, "call sp_newGame('$tableID', '$tablerMobile', $rounds, $score, $fee, '$note');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

    // 計時開台
    function newGameT($tableID, $tablerMobile, $rounds, $score, $diposet, $rate, $note){
        $link = connect();
        $sql = mysqli_query($link, "call sp_newGameT('$tableID', '$tablerMobile', $rounds, $score, $diposet, $rate, '$note');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

    // 開台渲染可用桌子
    // TODO：顯示的桌號要更改
    function newGameShowTables($clubID){
        // fliter若為'a'則為顯示可用，沒輸入則全部顯示
        $link = connect();
        $sql = mysqli_query($link, "call sp_showTables('$clubID', 'a');");
        while($data = mysqli_fetch_assoc($sql)){
            echo "<option value='{$data['tableID']}'>{$data['tableID']}</option>";
        }
    }

    // 可用桌數
    function showTables($clubID){
        // fliter若為'a'則為顯示可用，沒輸入則全部顯示
        $link = connect();
        $sql = mysqli_query($link, "call sp_showTables('$clubID', 'a');");
        $count = mysqli_num_rows($sql);

        return $count;
    }

    // 渲染所有桌子
    function showAllTables($clubID){
        // fliter若為'a'則為顯示可用，沒輸入則全部顯示
        $link = connect();
        $sql = mysqli_query($link, "call sp_showTables('$clubID', '');");
        while($data = mysqli_fetch_assoc($sql)){
                echo "<tr class='white-space-no-wrap'>";
                echo "<td class='text-left'>{$data['tableID']}</td>";
                if($data['name'] == '使用中'){
                    echo "<td class='text-center text-danger'>{$data['name']}</td>";
                }else{
                    echo "<td class='text-center text-success'>{$data['name']}</td>";
                }
                echo "<td><div class='d-flex justify-content-end align-items-center'><a class='' data-placement='top' title='' data-original-title='View' href='../counter/gameTable.blade.php?closetableID={$data['tableID']}'>&nbsp&nbsp&nbsp關台&nbsp&nbsp</a><a class='' data-placement='top' title='' data-original-title='View' href='../counter/tableQRCode.php?tableID={$data['tableID']}'>&nbsp&nbsp&nbsp操作&nbsp&nbsp</a></div></td>";
                echo "</tr>";
        }
    }

    // 渲染座位QRCode
    function showTablesQRCode($tableID){
        $link = connect();
        $sql = mysqli_query($link, "select * from tb_seat where tableID = '$tableID';");
        while($data = mysqli_fetch_assoc($sql)){
                echo "<tr class='white-space-no-wrap'>";
                echo "<td class='text-left'>{$data['seatID']}</td>";
                echo "<td><div class='d-flex justify-content-end align-items-center'><a class='' data-placement='top' title='' data-original-title='View' href='../counter/tableQRCode.php?disconnectID={$data['seatID']}&tableID={$data['tableID']}'>&nbsp&nbsp&nbsp解綁&nbsp&nbsp</a><a class='' data-placement='top' title='' data-original-title='View' href='../counter/seatQRCode.php?seatID={$data['seatID']}&tableID={$data['tableID']}' target='_blank'>&nbsp&nbsp&nbsp顯示QRCode&nbsp&nbsp</a></div></td>";
                echo "</tr>";
        }
    }

    // 儲值
    function deposit($userMobile, $clubID, $coin, $note){
        $link = connect();
        $sql = mysqli_query($link, "call sp_deposit('$clubID', '$userMobile', $coin, '$note');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

    // 解綁座位
    function disconnectSeat($seatID){
        $link = connect();
        $sql = mysqli_query($link, "call sp_disconnectSeat('$seatID');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

// 一般用戶
    // 掃碼綁定座位
    function connectSeat($seatID, $tableCode){
        $link = connect();
        $sql = mysqli_query($link, "call sp_connectSeat('$seatID', '$tableCode');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

// 會員端
    // 掃碼綁定座位
    function connectSeatU($seatID, $tableCode, $userMobile, $password){
        $link = connect();
        $sql = mysqli_query($link, "call sp_connectSeatU('$seatID', '$tableCode', '$userMobile', '$password');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

    // 修改資料
    function updateUser($userMobile, $name, $email, $note){
        $link = connect();
        $sql = mysqli_query($link, "call sp_updateUser('$userMobile', '$name', '$email', 1, '', ' ', '$note');");
        $data = mysqli_fetch_row($sql);
        
        return $data[0];
    }

    // 修改密碼
    function resetPassword($userMobile, $password){
        $link = connect();
        $sql = mysqli_query($link, "call sp_resetPassword('$userMobile', '$password', '');");
        $data = mysqli_fetch_row($sql);
        if($data[0] == '此會員不存在！'){
            return $data[0];
        }else{
            return '修改成功！';
        }
    }

    // 驗證是否為桌長
    // TODO：需要等級驗證
    function tablerMobile(){

    }

    // 顯示賬戶餘額
    function showBalance($userMobile, $clubID){
        // fliter輸入a值顯示可用，不輸入則顯示全部
        $link = connect();
        $sql = mysqli_query($link, "call sp_showBalance('$userMobile', '$clubID', 'a');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

// 桌長功能
    // 直接下一場
    function nextRound($tableID){
        $link = connect();
        $sql = mysqli_query($link, "call sp_nextRound('$tableID');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

// 用戶註冊
    // 註冊
    function newUser($userMobile, $password, $name, $email, $note){
        $link = connect();
        $sql = mysqli_query($link, "call sp_newUser('$userMobile', '$password', '$name', '$email', 1, '', '', '$note');");
    }


// 遊戲部分
    // 確認座位綁定
    function readyGame($tableID){
        $link = connect();
        $sql = mysqli_query($link, "call sp_readyGame('$tableID');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

    // 每輪遊戲分數結算
    function scoring($winSeatID, $loseSeatID, $point){
        $link = connect();
        $sql = mysqli_query($link, "call sp_scoring('$winSeatID', '$loseSeatID', $point);");
        $data = mysqli_fetch_row($sql);
        if($data[0] == '此桌號不存在！'){
            return $data[0];
        }elseif($data[0] == '此桌尚未啟用！'){
            return $data[0];
        }elseif($data[0] == '此座位不存在！'){
            return $data[0];
        }elseif($data[0] == '兩座位不同桌！'){
            return $data[0];
        }elseif($data[0] == '分數不可為負分！'){
            return $data[0];
        }

    }

    // 顯示遊戲歷程
    function showGameLog($tableID){
        $link = connect();
        $sql = mysqli_query($link, "call sp_showGamelog('$tableID');");
        $data = mysqli_fetch_row($sql);
        while($data = mysqli_fetch_row($sql)){
            if($data[0] == '此桌號尚未啟用'){
                return $data[0];
            }else{

            }
        }

    }

    // 顯示遊戲目前分數
    function showScore($tableID, $seatID){
        $link = connect();
        $sql = mysqli_query($link, "call sp_showScore('$tableID');");
        while($data = mysqli_fetch_row($sql)){
            if($data[0] == '此桌號尚未啟用！'){
                return '0';
            }else{
                if(substr($seatID, -1) == "A"){
                    return $data[2];
                }elseif(substr($seatID, -1) == "B"){
                    return $data[3];
                }elseif(substr($seatID, -1) == "C"){
                    return $data[4];
                }else{
                    return $data[5];
                }
                // echo "<tr class='white-space-no-wrap'>";
                // echo "<td class='text-left font-weight-bold'>{$data[1]}</td>";
                // echo "<td>{$data[2]}</td>";
                // echo "<td>{$data[3]}</td>";
                // echo "<td>{$data[4]}</td>";
                // echo "</tr>";
            }
        }
    }

    // 渲染遊戲報表
    function showGameScore($tableID){
        $link = connect();
        $sql = mysqli_query($link, "call sp_showScore('$tableID');");
        while($data = mysqli_fetch_row($sql)){
            if($data[0] == '此桌號尚未啟用！'){
                return '0';
            }else{
                
                echo "<tr class='white-space-no-wrap'>";
                echo "<td class='text-left font-weight-bold'>{$data[1]}</td>";
                echo "<td>{$data[2]}</td>";
                echo "<td>{$data[3]}</td>";
                echo "<td>{$data[4]}</td>";
                echo "</tr>";
            }
        }
    }

    // 關閉遊戲
    function closeGame($tableID){
        $link = connect();
        $sql = mysqli_query($link, "call sp_closeGame('$tableID');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

// 通用
    // 渲染座位
    function showSeat($tableID){
        $link = connect();
        $sql = mysqli_query($link, "select * from tb_seat where tableID = '$tableID';");
        while($data = mysqli_fetch_assoc($sql)){
            echo "<option value='{$data['seatID']}'>{$data['seatID']}</option>";
        }
    }

    // 渲染座位選擇贏家
    function showSeatID($tableID){
        $link = connect();
        $sql = mysqli_query($link, "select seatID from tb_seat where tableID = '$tableID';");
        $arr = array('東','南','西','北');
        while($data = mysqli_fetch_assoc($sql)){
            if(substr($data['seatID'],-1) == 'A'){
                echo "<option value='{$data['seatID']}'>東</option>";
            }elseif(substr($data['seatID'],-1) == 'B'){
                echo "<option value='{$data['seatID']}'>南</option>";
            }elseif(substr($data['seatID'],-1) == 'C'){
                echo "<option value='{$data['seatID']}'>西</option>";
            }else{
                echo "<option value='{$data['seatID']}'>北</option>";
            }
        }
    }

    // 號碼查詢座位
    function showSeatIDUserMobile($userMobile){
        $link = connect();
        mysqli_query($link, "set @seatID = '';");
        mysqli_query($link, "call sp_showSeatIDUserMobile('$userMobile', @seatID);");
        $sql = mysqli_query($link, "select @seatID;");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

    // 座位查詢號碼
    function showUserMobileSeatID($seatID){
        $link = connect();
        mysqli_query($link, "set @userMobile = '';");
        mysqli_query($link, "call sp_showUserMobileSeatID('$seatID', @userMobile);");
        $sql = mysqli_query($link, "select @userMobile;");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

    // 查詢桌長
    function showTabler($tableID){
        $link = connect();
        $sql = mysqli_query($link, "call sp_showTabler('$tableID');");
        $data = mysqli_fetch_row($sql);

        return $data[0];
    }

    // 查詢clubID
    function showManagementClubID($userMobile){
        $link = connect();
        $sql = mysqli_query($link, "call sp_showManagement('$userMobile');");
        $data = mysqli_fetch_assoc($sql);

        return $data['management'];
    }
?>

