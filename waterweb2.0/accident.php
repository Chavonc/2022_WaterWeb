<?php
    require("pdo.php");
    $pdo = new mypdo();
    $table = "";
    $table.= "<br /><br /><br /><table>";
    $watertype=$_GET["type"];//地區
    $area=$_GET["area"];//巿
    $location=$_GET["location"];//水域名稱
    $locationPer=$location.'%';

    $ssql="SELECT * FROM `意外事件年齡`";
    $rowss=$pdo->bindQuery($ssql);
    $changeagebutton=
    '<form method="post" action="">
        <select name="agelist" class="form-control" style="width:200px;">';
    $changeagebutton.='<option value="全部">全部</option>';
    foreach($rowss as $srow)
    {
        foreach($srow as $key=>$value)
        {
            if($key=="ID")
            {
                $ID=$value;
            }
            elseif($key=="意外事件年齡")
            {
                $changeagebutton.="<option value='$ID'>".$value."</option>";
            }
        }
    }

    $changeagebutton.=
    '</select><input type="submit" value="submit" class="btn btn-outline-secondary" style="position:absolute ;left:100%;top:45%"">
    </form>';
    if(isset($_POST["agelist"]))//isset=>是否存在,有按button
    {
        $agelist=@$_POST["agelist"];//年齡層
        if($agelist!="全部")
        {
            $sql = "SELECT `事件ID`,`發生地點`,`事件發生時間`,`意外事件類型`,`意外事件年齡`,`事件結果`
            FROM (`意外事件` LEFT JOIN `意外事件年齡` ON `意外事件`.`年齡層`=`意外事件年齡`.`ID`) 
            LEFT JOIN `意外事件類型` ON `意外事件`.`事件類型`=`意外事件類型`.`ID` 
            WHERE `發生地點` LIKE '$locationPer' AND `年齡層`='$agelist';";
        }
        else
        {
            $sql = "SELECT `事件ID`,`發生地點`,`事件發生時間`,`意外事件類型`,`意外事件年齡`,`事件結果`
            FROM (`意外事件` LEFT JOIN `意外事件年齡` ON `意外事件`.`年齡層`=`意外事件年齡`.`ID`) 
            LEFT JOIN `意外事件類型` ON `意外事件`.`事件類型`=`意外事件類型`.`ID` 
            WHERE `發生地點` LIKE '$locationPer';";
        }
        $rows = $pdo->bindQuery($sql);
        if(!$rows)
        {
            $table="<br /><br /><br /><h4>No Data</h4>";
        }
        else
        {
            $table.="<tr>";
            $attributes=array_keys($rows[0]);
            foreach($attributes as $attribute)
            {
                $table.="<th>".$attribute."</th>";
            }
            $table.="</tr>";
            foreach($rows as $row)
            {
                $table .="<tr>";
                foreach($row as $key => $value)
                {
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
                    if($key=="意外事件類型")
                    {   
                        $table .= "<td>".$value."</td>";
                    }           
                    if($key=="意外事件年齡")
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
        }
    }
    else//不存在button submit的情況->print全部data
    {
        $sql = "SELECT `事件ID`,`發生地點`,`事件發生時間`,`意外事件類型`,`意外事件年齡`,`事件結果`
        FROM (`意外事件` LEFT JOIN `意外事件年齡` ON `意外事件`.`年齡層`=`意外事件年齡`.`ID`) 
        LEFT JOIN `意外事件類型` ON `意外事件`.`事件類型`=`意外事件類型`.`ID` 
        WHERE `發生地點` LIKE '$locationPer';";
        $rows = $pdo->bindQuery($sql);
        if(!$rows)//empty
        {
            $table="<br /><br /><br /><h4>No Data</h4>";
        }
        else
        {
            $table.="<tr>";
            $attributes=array_keys($rows[0]);//attribute's name
            
            foreach($attributes as $attribute)//show attributes
            {
                $table.="<th>".$attribute."</th>";
            }
            $table.="</tr>";
            foreach($rows as $row)
            {
                $table .="<tr>";
                foreach($row as $key => $value)
                {
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
                    if($key=="意外事件類型")
                    {   
                        $table .= "<td>".$value."</td>";
                    }           
                    if($key=="意外事件年齡")
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
        <link rel="stylesheet" href="accident.css">
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
                    <li class="breadcrumb-item"><a href="accident.php?area=<?=$area?>&type=<?=$watertype?>&location=<?=$location?>&age=全部" style="color:black;font-size:large">意外事件</a></li>
                </ol>
            </nav>
        </div>
        <div style="background-color:#E0E0E0;width:770px;height:auto;position:absolute;top:26%;left:31%;">
            <div style="margin:35px 18px;">
                <div style="position:absolute; top:20px;;left:7%">
                    <h5 style="font-family:DFKai-sb;">請選擇所查看的年齡層:</h5>
                    <?php
                        echo $changeagebutton;
                    ?>
                </div>
                <?php
                    echo $table
                ?>
            </div>
            <div style="background-color:#FFFFFF;"><br /><br /></div>
        </div>
    </body>
</html>