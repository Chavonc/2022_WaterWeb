<?php
    require("pdo.php");
    $pdo = new mypdo();
    $table = "";
    $table.= "<table>";
    $watertype=$_GET["type"];
    $area=$_GET["area"];
    $page="location.php?area=".$area."&type=".$watertype."&location=";
    
    if($watertype=="水庫湖泊")
    {
        $sql = "SELECT 水庫及湖分析.名稱 ,地理區域.縣市名稱,水庫及湖分析.水域ID 
        FROM (`水庫及湖分析` LEFT JOIN 水域景點 ON 水庫及湖分析.水域ID =水域景點.水域ID) 
        LEFT JOIN 地理區域 ON 水域景點.區域ID = 地理區域.區域ID WHERE 地理區域.縣市名稱='".$area."'";
        $rows = $pdo->bindQuery($sql);
        foreach($rows as $row)
        {
            $table .= "<ul>";
            foreach($row as $key => $value)
            {
                if($key=="名稱")
                {   
                    $table .= "<li>"."<a href={$page}{$value} style='color:black;font-size:large;' >".$value."</a> "."</li>";
                }
            }
            $table .= "</ul>";
        }
        $table.= "</table>";
        if(!$rows)
        {
            $table ="<h4 style='font-family: serif;'>No Data</h4>";
        }

    }
    elseif($watertype=="溪河")
    {
        $sql = "SELECT 溪河分析.名稱 ,地理區域.縣市名稱,溪河分析.水域ID FROM (`溪河分析` LEFT JOIN 水域景點 ON 溪河分析.水域ID =水域景點.水域ID) LEFT JOIN 地理區域 ON 水域景點.區域ID = 地理區域.區域ID WHERE 地理區域.縣市名稱='".$area."'";
        $rows = $pdo->bindQuery($sql);
        foreach($rows as $row){
            $table .= "<ul>";
            foreach($row as $key => $value){
                if($key=="名稱")
                {   
                    $table .= "<li>"."<a href={$page}{$value} style='color:black;font-size:large;' >".$value."</a> "."</li>";
                }
            }
            $table .= "</ul>";
        }
        $table.= "</table>";
        if(!$rows){
            $table ="<h4 style='font-family: serif;'>No Data</h4>";
        }
    }
    elseif($watertype=="海岸")
    {
        $sql = "SELECT 海岸分析.名稱 ,地理區域.縣市名稱,海岸分析.水域ID FROM (`海岸分析` LEFT JOIN 水域景點 ON 海岸分析.水域ID =水域景點.水域ID) LEFT JOIN 地理區域 ON 水域景點.區域ID = 地理區域.區域ID WHERE 地理區域.縣市名稱='".$area."'";
        $rows = $pdo->bindQuery($sql);
        foreach($rows as $row){
            $table .= "<ul>";
            foreach($row as $key => $value){
                if($key=="名稱")
                {   
                    $table .= "<li>"."<a href={$page}{$value} style='color:black;font-size:large;' >".$value."</a> "."</li>";
                }
            }
            $table .= "</ul>";
        }
        $table.= "</table>";
        if(!$rows){
            $table ="<h4 style='font-family: serif;'>No Data</h4>";
        }
    }
    elseif($watertype=="漁港")
    {
        $sql = "SELECT 漁港分析.名稱 ,地理區域.縣市名稱,漁港分析.水域ID FROM (`漁港分析` LEFT JOIN 水域景點 ON 漁港分析.水域ID =水域景點.水域ID) LEFT JOIN 地理區域 ON 水域景點.區域ID = 地理區域.區域ID WHERE 地理區域.縣市名稱='".$area."'";
        $rows = $pdo->bindQuery($sql);
        foreach($rows as $row){
            $table .= "<ul>";
            foreach($row as $key => $value){
                if($key=="名稱")
                {   
                    $table .= "<li>"."<a href={$page}{$value} style='color:black;font-size:large;' >".$value."</a> "."</li>";
                }
            }
            $table .= "</ul>";
        }
        $table.= "</table>";
        if(!$rows){
            $table ="<h4 style='font-family: serif;'>No Data</h4>";
        }
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                </ol>
            </nav>
        </div>
        <div style="background-color:#E0E0E0;width:770px;height:auto;position:absolute;top:26%;left:31%;">
            <div style="margin:35px 50px;">
                <?php
                    echo $table
                ?>
            </div>
            <div style="background-color:#FFFFFF;"><br /><br /></div>
        </div>
    </body>
</html>