<?php
require("db.php");
session_start();

$sql_name = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0004' ";
$result_name = mysqli_query($link, $sql_name);
if (mysqli_num_rows($result_name) > 0) {
    foreach ($result_name as $row_name) {
    }
}

$sql_info = "SELECT `studio_info` FROM `studio` WHERE `studio_id`='stu0004' ";
$result_info = mysqli_query($link, $sql_info);
if (mysqli_num_rows($result_info) > 0) {
    foreach ($result_info as $row_info) {
    }
}

$sql_phone = "SELECT `studio_phone` FROM `studio` WHERE `studio_id`='stu0004' ";
$result_phone = mysqli_query($link, $sql_phone);
if (mysqli_num_rows($result_phone) > 0) {
    foreach ($result_phone as $row_phone) {
    }
}

$sql_address = "SELECT `studio_address` FROM `studio` WHERE `studio_id`='stu0004' ";
$result_address = mysqli_query($link, $sql_address);
if (mysqli_num_rows($result_address) > 0) {
    foreach ($result_address as $row_address) {
    }
}

$sql_traffic = "SELECT `traffic_info` FROM `studio` WHERE `studio_id`='stu0004' ";
$result_traffic = mysqli_query($link, $sql_traffic);
if (mysqli_num_rows($result_traffic) > 0) {
    foreach ($result_traffic as $row_traffic) {
    }
}

$sql = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0001' ";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    foreach ($result as $row1) {
    }
}
$sql2 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0002' ";
$result2 = mysqli_query($link, $sql2);
if (mysqli_num_rows($result2) > 0) {
    foreach ($result2 as $row2) {
    }
}
$sql3 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0003' ";
$result3 = mysqli_query($link, $sql3);
if (mysqli_num_rows($result3) > 0) {
    foreach ($result3 as $row3) {
    }
}
$sql4 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0004' ";
$result4 = mysqli_query($link, $sql4);
if (mysqli_num_rows($result4) > 0) {
    foreach ($result4 as $row4) {
    }
}
$sql5 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0005' ";
$result5 = mysqli_query($link, $sql5);
if (mysqli_num_rows($result5) > 0) {
    foreach ($result5 as $row5) {
    }
}
$sql6 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0006' ";
$result6 = mysqli_query($link, $sql6);
if (mysqli_num_rows($result6) > 0) {
    foreach ($result6 as $row6) {
    }
}
$sql7 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0007' ";
$result7 = mysqli_query($link, $sql7);
if (mysqli_num_rows($result7) > 0) {
    foreach ($result7 as $row7) {
    }
}
$sql8 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0008' ";
$result8 = mysqli_query($link, $sql8);
if (mysqli_num_rows($result8) > 0) {
    foreach ($result8 as $row8) {
    }
}
$sql9 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0009' ";
$result9 = mysqli_query($link, $sql9);
if (mysqli_num_rows($result9) > 0) {
    foreach ($result9 as $row9) {
    }
}
$sql10 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0010' ";
$result10 = mysqli_query($link, $sql10);
if (mysqli_num_rows($result10) > 0) {
    foreach ($result10 as $row10) {
    }
}
$sql11 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0011' ";
$result11 = mysqli_query($link, $sql11);
if (mysqli_num_rows($result11) > 0) {
    foreach ($result11 as $row11) {
    }
}
$sql12 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0012' ";
$result12 = mysqli_query($link, $sql12);
if (mysqli_num_rows($result12) > 0) {
    foreach ($result12 as $row12) {
    }
}
$sql13 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0013' ";
$result13 = mysqli_query($link, $sql13);
if (mysqli_num_rows($result13) > 0) {
    foreach ($result13 as $row13) {
    }
}
$sql14 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0014' ";
$result14 = mysqli_query($link, $sql14);
if (mysqli_num_rows($result14) > 0) {
    foreach ($result14 as $row14) {
    }
}
$sql15 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0015' ";
$result15 = mysqli_query($link, $sql15);
if (mysqli_num_rows($result15) > 0) {
    foreach ($result15 as $row15) {
    }
}
$sql16 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0016' ";
$result16 = mysqli_query($link, $sql16);
if (mysqli_num_rows($result16) > 0) {
    foreach ($result16 as $row16) {
    }
}
$sql17 = "SELECT `studio_name` FROM `studio` WHERE `studio_id`='stu0017' ";
$result17 = mysqli_query($link, $sql17);
if (mysqli_num_rows($result17) > 0) {
    foreach ($result17 as $row17) {
    }
}
?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <title>會員儲值</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable = no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- CDN的方式(直接連到網路) -->
</head>

<body>

    <div class="row">
        <nav class="navbar navbar-expand-sm bg-primary navbar-dark" id="DeepBlueBar">
            <font size="2px">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="Home.php">VIESHOW</a></li>
                    <?php
                        if ((!isset($_SESSION['mail_login']) && !isset($_SESSION['password_login']))) 
                        {
                            echo "<li class='nav-item' style=' cursor:pointer;'><a class='nav-link' href='Login.php'>會員登入</a></li>";
                        }
                        else if ($_SESSION['mail_login'] == '' && $_SESSION['password_login'] == '') 
                        {
                            echo "<li class='nav-item'><a class='nav-link' href='Login.php'>會員登入</a></li>";
                        } 
                        else 
                        {
                            echo "<li class='nav-item'><a class='nav-link' href='Logout_php.php'>會員登出</a></li>";
                            echo "<li class='nav-item'><a class='nav-link' href='TicketRecord.php'>訂票記錄</a></li>";
                            echo "<li class='nav-item'><a class='nav-link' href='StoredValue.php'>會員儲值</a></li>";
                            echo "<li class='nav-item'><a class='nav-link' href='Logging.php'>兌換點數</a></li>";
                        }
                        //echo $_SESSION['mail_login'];//debug
                    ?>
                    <li class="nav-item"><a class="nav-link" href="MemberService1.php">會員服務</a></li>
                </ul>
            </font>
        </nav>
        <nav class="navbar navbar-expand-sm bg-secondary navbar-dark" id="LightBlueBar" width="100%">
            <font size="2px">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <li class="nav-item">
                        <form method="GET" action="ShowAllMovie.php">
                            <select name="cinema" class="form-select" id="cinemal">
                                <option selected>請選擇影城</option>
                                <?php
                                $query = "SELECT studio_id,studio_name FROM studio";
                                $result = mysqli_query($link, $query);
                                $table = "";
                                foreach ($result as $row) {
                                    foreach ($row as $key => $value) {
                                        if ($key == "studio_id") {
                                            $table .= '<option value=' . $value . '>';
                                        } else {
                                            $table .= $value . '</option>';
                                        }
                                    }
                                }
                                echo $table;
                                ?>
                            </select>
                            <input type="submit" value="查詢" style="position:absolute;top:8px;left:22%" class="btn btn-light">
                        </form>
                    </li>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item" color="black"><a class="nav-link" href="Cinema.php">影城資訊</a></li>
                    <li class="nav-item"><a class="nav-link" href="ClassExplain.php">級數說明</a></li>
                    <li class="nav-item"><a class="nav-link" href="TicketExplain.php">票種說明</a></li>
                </ul>
            </font>
        </nav>
    </div>
    <br>
    <?php
    $mail = $_SESSION['mail_login'];
    $password = $_SESSION['password_login'];

    $query = "SELECT * FROM member WHERE member_mail = '$mail' AND member_password = '$password'";
    $data = mysqli_query($link, $query);
    for ($i = 1; $i <= mysqli_num_rows($data); $i++) {
        $rs = mysqli_fetch_row($data);
    }

    ?>

    <form method="POST" action="StoredValue_php.php">
        <div class="row">
            <!-- <div align="center"><h4>會員儲值</h4></div> -->

            <div class="shadow-sm p-3 mb-5 bg-body rounded">

                <div class="card" style="vertical-align:middle;border-style: none;">
                    <br>

                    <div class="card-body">

                        <div class="row row-cols-default">
                            <div class="col-1">

                            </div>
                            <div class="col-10">
                                <lable>
                                    <h5>儲值資訊</h5>
                                </lable>
                                <hr>
                            </div>
                            <div class="col-1">

                            </div>

                        </div>

                        <div class="row row-cols-default">
                            <div class="col-1">

                            </div>
                            <div class="col-2">
                                <span class="card-text">目前餘額</span>
                            </div>
                            <div class="col-9">
                                <span>
                                    <p>
                                        <?php 
                                            echo $rs[3];
                                            echo '元'; 
                                        ?>
                                    </p>
                                </span>
                            </div>
                        </div>

                        <div class="row row-cols-default">
                            <div class="col-1">

                            </div>
                            <div class="col-2">
                                <span class="card-text">儲值金額</span>
                            </div>
                            <div class="col-2">
                                <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="StoredMoney">
                                    <option selected>請選擇儲值金額</option>
                                    <option value="1000">儲值 NT$1000</option>
                                    <option value="2000">儲值 NT$2000</option>
                                    <option value="3000">儲值 NT$3000</option>
                                    <option value="4000">儲值 NT$4000</option>
                                    <option value="5000">儲值 NT$5000</option>

                                </select>

                            </div>
                        </div>
                        <br>
                        <div class="row row-cols-default">
                            <div class="col-1">

                            </div>
                            <div class="col-10">
                                <lable>
                                    <h5>付款人資訊</h5>
                                </lable>
                                <hr>
                            </div>
                            <div class="col-1">
                            </div>
                        </div>

                        <div class="row row-cols-default">
                            <div class="col-1">

                            </div>
                            <div class="col-2">
                                <span class="card-text">信箱</span>
                            </div>
                            <div class="col-9">
                                <span>
                                    <p><?php echo $rs[1] ?></p>
                                </span>
                            </div>
                        </div>

                        <div class="row row-cols-default">
                            <div class="col-1">

                            </div>
                            <div class="col-2">
                                <span class="card-text">電話</span>
                            </div>
                            <div class="col-9">
                                <span>
                                    <p><?php echo $rs[6] ?></p>
                                </span>
                            </div>
                        </div>
                        <br>
                        <div class="row row-cols-default">
                            <div class="col-1">

                            </div>
                            <div class="col-10">
                                <lable>
                                    <h5>信用卡資訊</h5>
                                </lable>
                                <hr>
                            </div>
                            <div class="col-1">

                            </div>
                        </div>

                        <div class="row row-cols-default">
                            <div class="col-1">

                            </div>
                            <div class="col-2">
                                <span class="card-text">信用卡卡號</span>
                            </div>
                            <div class="col-9">
                                <div class="form-input mb-4">
                                    <input type="text" name="ID" maxlength="16" id="card" placeholder="請輸入卡號" pattern="[0-9]*">
                                </div>
                            </div>
                        </div>

                        <div class="row row-cols-default">
                            <div class="col-1">

                            </div>
                            <div class="col-2">
                                <span class="card-text">卡片安全碼</span>
                            </div>
                            <div class="col-9">
                                <div class="form-input mb-4">
                                    <input type="text" name="ID" maxlength="3" id="card" placeholder="請輸入安全碼" pattern="[0-9]*">
                                </div>
                            </div>
                        </div>

                        <div class="row row-cols-default">
                            <div class="col-1">

                            </div>
                            <div class="col-2">
                                <span class="card-text">卡片到期日</span>
                            </div>
                            <div class="col-1">
                                <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                                    <option selected>月份</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>

                                </select>
                            </div>
                            <div class="col-1">
                                <span>
                                    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                                        <option selected>年份</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="32">32</option>
                                        <option value="33">33</option>
                                        <option value="34">34</option>
                                    </select></span>
                            </div>
                        </div>
                        <br>
                        <div class="submit" style="text-align:center">
                            <input type="submit" value="確認" class="btn btn-outline-primary button" style="width: 100px;">
                        </div>

                    </div>
                </div>
            </div>
    </form>
</body>

</html>