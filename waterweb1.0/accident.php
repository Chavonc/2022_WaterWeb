<?php
    require("pdo.php");
    $pdo = new mypdo();
    $table = "";
    $table.= "<br /><br /><table>";
    $watertype=$_GET["type"];
    $area=$_GET["area"];
    $location=$_GET["location"];
    $locationPer=$location.'%';
    $age=$_GET["age"];
    $sql = "SELECT 事件ID,發生地點,事件發生時間,事件類型,年齡層,事件結果 
    FROM `意外事件` WHERE `發生地點` LIKE '$locationPer' AND `年齡層`='$age';";
    $rows = $pdo->bindQuery($sql);

    $table .= "<tr><th>事件編碼</th><th>發生地點</th><th>發生時間</th><th>事件類型</th><th>年齡層</th><th>事件結果</th></tr>";
    foreach($rows as $row){
        $table .="<tr>";
        foreach($row as $key => $value){
            if($key=="事件ID")
            {   
                $table .= "<td>".$value."</td>";
            }
            if($key=="發生地點")
            {   
                $table .= "<td>".$value."</td>";
            }
            if($key=="事件發生時間")
            {   
                $table .= "<td>".$value."</td>";
            }
            if($key=="事件類型")
            {   
                $table .= "<td>".$value."</td>";
            }
            if($key=="年齡層")
            {   
                $table .= "<td>".$value."</td>";
            }
            if($key=="事件結果")
            {   
                $table .= "<td>".$value."</td>";
            }
            
        }
        $table .="</tr>";
    }
    $table .= "</table>";
    if(!$rows){
        $table="<br /><br /><h4>No Data</h4>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>water</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="accident.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="search.css">
    </head>
    <body>
        <nav class="navbar navbar-light" style="background-color: #97CBFF;height: 60px">
            <form class="form-inline" style="position: absolute;right: 3%;">
                <span class="icon"><i class="fa fa-search"></i></span>
                <input class="form-control mr-sm-2"  type="search" placeholder="請輸入水域名稱" aria-label="Search" name="search-text" id="search-text"/>
            </form>        
        </nav>
        <div class="list-group" style="width:270px ;font-size:large;text-align:center;position:absolute;left:8%;top:17%">
            <li class="list-group-item list-group-item-action active" style="background-color: #46A3FF;"><?php echo $area ?></li>
            <a href="type.php?area=<?=$area?>&type=水庫湖泊" class="list-group-item list-group-item-action">水庫、湖泊</a>
            <a href="type.php?area=<?=$area?>&type=溪河" class="list-group-item list-group-item-action">溪河</a>
            <a href="type.php?area=<?=$area?>&type=海岸" class="list-group-item list-group-item-action">海岸</a>
            <a href="type.php?area=<?=$area?>&type=漁港" class="list-group-item list-group-item-action">漁港</a>
        </div>
        <div style="position:absolute;left:30%;top:17%">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color:white;">
                    <li class="breadcrumb-item"><a href="Home.php" style="color:black;font-size:large">Home</a></li>
                    <li class="breadcrumb-item"><a href="water.php?area=<?=$area?>" style="color:black;font-size:large"><?php echo $area ?></a></li>
                    <li class="breadcrumb-item"><a href="type.php?area=<?=$area?>&type=<?=$watertype?>" style="color:black;font-size:large"><?php echo $watertype?></a></li>
                    <li class="breadcrumb-item"><a href="location.php?area=<?=$area?>&type=<?=$watertype?>&location=<?=$location?>" style="color:black;font-size:large"><?php echo $location?></a></li>
                    <li class="breadcrumb-item"><a href="accident.php?area=<?=$area?>&type=<?=$watertype?>&location=<?=$location?>&age=全部" style="color:black;font-size:large">意外事件</a></li>
                </ol>
            </nav>
        </div>
        <div style="background-color:#E0E0E0;width:770px;height:auto;position:absolute;top:26%;left:31%;">
            <div style="margin:35px 50px;">
                
                <div style="position:absolute; top:20px;;left:7%">
                    年齡層:
                    <a href="accident.php?area=<?=$area?>&type=<?=$watertype?>&location=<?=$location?>&age=少兒"><button type="button" class="btn btn-outline-info">少兒</button></a>
                    <a href="accident.php?area=<?=$area?>&type=<?=$watertype?>&location=<?=$location?>&age=青年"><button type="button" class="btn btn-outline-success">青年</button></a>
                    <a href="accident.php?area=<?=$area?>&type=<?=$watertype?>&location=<?=$location?>&age=中年"><button type="button" class="btn btn-outline-info">中年</button></a>
                    <a href="accident.php?area=<?=$area?>&type=<?=$watertype?>&location=<?=$location?>&age=老人"><button type="button" class="btn btn-outline-success">老人</button></a>
                    <a href="accident.php?area=<?=$area?>&type=<?=$watertype?>&location=<?=$location?>&age=不詳"><button type="button" class="btn btn-outline-info">不詳</button></a>
                </div>
                <?php
                    echo $table
                ?>
            </div>
            <div style="background-color:#FFFFFF;"><br /><br /></div>
        </div>
    </body>
</html>