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
<html lang="zh-en">

<head>
    <title>操作說明</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
                                <input type="submit" value="查詢" style="position:absolute;top:8px;left:22.5%" class="btn btn-light">
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

        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6">
                <br />
                <br />
                <br />
                <br />
                <div class="shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card" style="vertical-align:middle;border-style: none;">
                        <br>
                        <div align="center">
                            <h3>會員登入</h2>
                        </div>
                        <form method="POST" action="Login_php.php">
                            <div class="card-body">

                                <div class="form-input mb-3" style="text-align:center">
                                    <span><i class="bi bi-envelope"></i></span><!-- icon -->
                                    <input type="text" name="mail" placeholder="username">
                                </div>

                                <div class="form-input mb-3" style="text-align:center">
                                    <span><i class="bi bi-lock"></i></span><!-- icon -->
                                    <input type="password" name="password" placeholder="password">
                                </div>

                                <div class="form-check" style="display:flex;justify-content: center;">
                                    <span>
                                        <input class="form-check-input" type="checkbox" value=" " id="flexCheckIndeterminate">
                                    </span>
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        Remember me
                                    </label>
                                </div>

                                <div style="display:flex;justify-content: center;">
                                    <a class="link" href="MemberService2.php">忘記密碼</a>
                                </div>

                                <div>

                                    <a href="#" style="text-align:center"></a>
                                </div>
                                <br />
                                <div class="submit" style="text-align:center">
                                    <button type="submit" name="signup" class="btn btn-outline-primary button" style="width: 100px;">註冊</button>
                                    <button type="submit" name="login" class="btn btn-outline-primary button" style="width: 100px;">登入</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>



</body>