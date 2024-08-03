<?php
    require("pdo.php");
    $pdo = new mypdo();
    $watertype=$_GET["type"];
    if($watertype=="水庫湖泊")
    {
        $watertype="水庫及湖";
    }
    $area=$_GET["area"];
    $location=$_GET["location"];
    if($watertype=="漁港")
    {
        $sql ="SELECT 名稱,`漁港類型`.`漁港類型`,`泊地面積(公頃)`, `港域深度(公尺)`,開放時間
        FROM ((`漁港分析` LEFT JOIN `水域景點` ON 漁港分析.水域ID = 水域景點.水域ID) 
        LEFT JOIN `地理區域` ON 水域景點.區域ID = 地理區域.區域ID) 
        LEFT JOIN `地區` ON `地區`.`ID`=`地理區域`.`地區` 
        LEFT JOIN `漁港類型` ON 漁港分析.漁港類型=漁港類型.ID 
        WHERE `名稱`='$location' AND 地理區域.縣市名稱='$area';";
    }
    elseif($watertype=="海岸")
    {
        $sql ="SELECT 名稱,`海岸類型`.`海岸類型`,`海岸型態`.`海岸型態`,特色,開放時間
        FROM ((`海岸分析` LEFT JOIN `水域景點` ON 海岸分析.水域ID = 水域景點.水域ID) 
        LEFT JOIN `地理區域` ON 水域景點.區域ID = 地理區域.區域ID) 
        LEFT JOIN `地區` ON `地區`.`ID`=`地理區域`.`地區` 
        LEFT JOIN `海岸類型` ON `海岸分析`.`海岸類型`=`海岸類型`.`ID`
        LEFT JOIN `海岸型態` ON `海岸分析`.`型態`=`海岸型態`.`ID`
        WHERE `名稱`='$location' AND 地理區域.縣市名稱='$area';";

    }
    elseif($watertype=="水庫及湖")
    {
        $sql ="SELECT 名稱,`湖泊類型`.`湖泊類型`,`湖泊型態`.`湖泊型態`,`海拔(公尺)`,`面積(公頃)`,水源,用途
        FROM ((`水庫及湖分析` LEFT JOIN `水域景點` ON 水庫及湖分析.水域ID = 水域景點.水域ID) 
        LEFT JOIN `地理區域` ON 水域景點.區域ID = 地理區域.區域ID) 
        LEFT JOIN `地區` ON `地區`.`ID`=`地理區域`.`地區` 
        LEFT JOIN `湖泊類型` ON 水庫及湖分析.湖泊類型=湖泊類型.ID 
        LEFT JOIN `湖泊型態` ON `水庫及湖分析`.`型態`=`湖泊型態`.`ID`
        WHERE `名稱`='$location' AND 地理區域.縣市名稱='$area';";

    }
    elseif($watertype=="溪河")
    {
        $sql="SELECT * FROM ((`溪河分析` LEFT JOIN `水域景點` ON 溪河分析.水域ID = 水域景點.水域ID) 
        LEFT JOIN `地理區域` ON 水域景點.區域ID = 地理區域.區域ID) 
        WHERE `名稱`='$location' AND 地理區域.縣市名稱='$area';"; 
    }
    $rows = $pdo->bindQuery($sql);
    $infoTable = "<h4>".$location."分析</h4><table>";
    $safeTable = "<h4>安全性分析</h4><table>";

    foreach($rows as $row)
    {
        foreach($row as $key => $value)
        {
            if($key!="水域ID" && $key!="區域ID" && $key!="縣市名稱" && $key!="地區" && $key!="ID")
            {   
                if(!$value)
                {
                    $infoTable .= "<tr>";
                    $infoTable .= "<th>".$key."</th>"."<td>No Data</td>";
                    $infoTable .= "</tr>";

                }
                else
                {
                    $infoTable .= "<tr>";
                    $infoTable .= "<th>".$key."</th>"."<td>".$value."</td>";
                    $infoTable .= "</tr>";
                }
                
            }
        }
    }
    $infoTable .= "</table>";
    $ssql = "SELECT 安全性.水域ID,安全性.水域活動限制,安全性.看守人員,安全性.是否為危險水域 
    FROM (((`".$watertype."分析` LEFT JOIN `水域景點` ON ".$watertype."分析.水域ID = 水域景點.水域ID) 
    LEFT JOIN `地理區域` ON 水域景點.區域ID = 地理區域.區域ID) 
    LEFT JOIN `安全性` ON ".$watertype."分析.水域ID =安全性.水域ID) 
    WHERE ".$watertype."分析.名稱='$location' AND 地理區域.縣市名稱='$area';";
    $srows = $pdo->bindQuery($ssql);
    foreach($srows as $srow){
        foreach($srow as $key => $value){
            if($key!="水域ID")
            {   
                $safeTable .= "<tr>";
                $safeTable .= "<th>".$key."</th>"."<td>".$value."</td>";
                $safeTable .= "</tr>";
            }
        }
    }
    $safeTable .= "</table>";

    if($watertype=="水庫及湖"){
        $watertype="水庫湖泊";
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
        <link rel="stylesheet" href="location.css"> 
        <link rel="stylesheet" href="search.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="search.css">
    </head>
    <body>
        <nav class="navbar navbar-light" style="background-color: #97CBFF;height: 60px">
            <div class="search-bar">
	    <form class="form-inline" onsubmit="return false" style="position: absolute;right: 3%;">
               <span class="icon"><i class="fa fa-search"></i></span>
               <input class="form-control mr-sm-2"  type="search" placeholder="請輸入水域名稱" aria-label="Search" name="search-text" id="search-text"/>
            </form>
            <div class="search">
                <ul id="search-result"></ul>
            </div>
            <script src="search.js"></script>
	    </div>      
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
                </ol>
            </nav>
        </div>
        <div style="background-color:#E0E0E0;width:770px;height:auto;position:absolute;top:26%;left:31%;">
            <div style="margin:35px 50px;">
                <?php
                    echo $infoTable
                ?>  
                <br />  
                <?php
                    echo $safeTable
                ?>
                <br />
                <div>
                    <h4>
                        <form method="post" action="accident.php?area=<?=$area?>&type=<?=$watertype?>&location=<?=$location?>">
                            <input type="submit" name="agebutton" id="agebutton" value="詳細意外事件內容" class="btn btn-outline-info">
                        </form>
                    </h4>
                </div>
            </div>
            <div style="background-color:#FFFFFF;"><br /><br /></div>
        </div>
    </body>
</html>