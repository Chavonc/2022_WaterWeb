<?php
    require("pdo.php");
    $pdo = new mypdo();
    $tabletype = isset($_GET['tabletype'])? htmlspecialchars($_GET['tabletype']):'';
    $area = isset($_GET['area'])?htmlspecialchars($_GET['area']):'';
    $table="";
    if((isset($_GET['tabletype']))&&(isset($_GET['area']))&&(($tabletype=="溪河分析")||($tabletype=="漁港分析")||($tabletype=="海岸分析")||($tabletype=="水庫及湖分析"))) // tabletype=漁港 海岸 水庫 溪河
    {
        if($area=="全部"){
            if($tabletype=="溪河分析"){
                $sql="SELECT 縣市名稱,溪河分析.名稱,溪河分析.水域ID FROM (`溪河分析` LEFT JOIN `水域景點` ON 溪河分析.水域ID =水域景點.水域ID) LEFT JOIN `地理區域` ON 水域景點.區域ID = 地理區域.區域ID;";
            }
            else{
                $sql="SELECT $tabletype.名稱 ,地理區域.縣市名稱,$tabletype.水域ID FROM (`$tabletype` LEFT JOIN `水域景點` ON $tabletype.水域ID =水域景點.水域ID) LEFT JOIN `地理區域` ON 水域景點.區域ID = 地理區域.區域ID ;";
            }
            

        }   
        else{
            if($tabletype=="溪河分析"){
                $sql = "SELECT 縣市名稱,溪河分析.名稱,溪河分析.水域ID FROM (`溪河分析` LEFT JOIN `水域景點` ON 溪河分析.水域ID =水域景點.水域ID) LEFT JOIN `地理區域` ON 水域景點.區域ID = 地理區域.區域ID WHERE 縣市名稱 = '$area';";
            }
            else{
                $sql = "SELECT $tabletype.名稱 ,地理區域.縣市名稱,$tabletype.水域ID FROM (`$tabletype` LEFT JOIN `水域景點` ON $tabletype.水域ID =水域景點.水域ID) LEFT JOIN `地理區域` ON 水域景點.區域ID = 地理區域.區域ID WHERE 縣市名稱 = '$area';";
            }
        }
        $rows = $pdo->bindQuery($sql);
        if(!$rows){
            //沒 data
            $table.="<h3>No data</h3>";
        }
        else{
            //有data
            if($tabletype=="溪河分析"){
                foreach($rows as $row){
                    $table.='<div style="margin:25px;">';
                    foreach($row as $key => $value){
                        $table .="<tr>";
                        if($key=="縣市名稱"){
                            $table.="<td>".$value."__";
                        }
                        if(($key=="名稱")||($key=="水域ID"))
                        {
                            if($key=="名稱"){
                                $table .= $value . "</td>";
                                $Myname=$value;
                            }
                            elseif($key=="水域ID"){
                                $table.='<td><form method="post" action="">';
                                $table .= "<input type='hidden' name='waterID' value='$value'> ";
                                $table .= "<button style='position:absolute;left: 230px;margin-top: -25px;' name='delete' value='$Myname' class='btn btn-outline-danger btn-sm 'onclick='javascript:return del();'>刪除</button>";
    
                            }
                            $table.="</tr>";
                            
                        }
                    }
                    $table .= "</form></td>";
                    $table.='</div>';
                    
                }

            }
            else{
                foreach($rows as $row){
                    $table.='<div style="margin:25px;">';
                    foreach($row as $key => $value){
                        $table .="<tr>";
                        if(($key=="名稱")||($key=="水域ID"))
                        {
                            if($key=="名稱"){
                                $table .="<td>". $value . "</td>";
                                $Myname=$value;
                            }
                            elseif($key=="水域ID"){
                                $table.='<td><form method="post" action="">';
                                $table .= "<input type='hidden' name='waterID' value='$value'> ";
                                $table .= "<button style='position:absolute;left: 270px;margin-top: -25px;'name='delete' value='$Myname' class='btn btn-outline-danger btn-sm ' onclick='javascript:return del();'>刪除</button>";
    
                            }
                            $table.="</tr>";
                            
                        }
                    }
                    $table .= "</form></td>";
                    $table.='</div>';
                    
                }
            }
            
            
        }
    }
    elseif((isset($_GET['tabletype']))&&(isset($_GET['area']))&&($tabletype=="意外事件"))//tabletype=意外事件
    {
        if($area =="全部"){
            $sql="SELECT 事件ID,發生地點,縣市名稱 FROM `意外事件` LEFT JOIN `地理區域` ON 意外事件.區域ID = 地理區域.區域ID;";
        }
        else{
            $sql="SELECT 事件ID,發生地點,縣市名稱 FROM `意外事件` LEFT JOIN `地理區域` ON 意外事件.區域ID = 地理區域.區域ID WHERE 縣市名稱='$area';";
        }
        $rows = $pdo->bindQuery($sql);
        if(!$rows){
            //沒 data
            $table.="<h3>No data</h3>";
        }
        else{
            foreach($rows as $row){
                $table.='<div style="margin:25px;">';
                foreach($row as $key => $value){
                    $table .="<tr>";
                    if(($key=="發生地點")||($key=="事件ID"))
                    {
                        if($key=="事件ID"){
                            $table .="<td>事件ID__". $value . "</td>";
                            $MyID=$value;
                        }
                        else{
                            $table .="<td>  ". $value . "</td>";
                            $location=$value;
                        }
                    }
                    else{
                        $table.='<form method="post" action="">';
                        $table .= "<input type='hidden' name='accidentevent' value='$location'> ";
                        $table .= "<button style='position:absolute;left: 330px;margin-top: -25px;' name='accidentID' value='$MyID' class='btn btn-outline-danger btn-sm 'onclick='javascript:return del();'>刪除</button>";

                    }
                    
                    $table.="</tr>";
                }
                $table .= "</form></td>";
                $table.='</div>';
                
            }
            
        }
    }
    elseif((isset($_GET['tabletype']))&&(isset($_GET['area']))&&($tabletype=="地理區域"))//tabletype=地理區域
    {
        if($area =="全部"){
            $sql="SELECT * FROM `地理區域`;";
        }
        else{
            $sql="SELECT * FROM `地理區域` WHERE 縣市名稱='$area';";
        }
        $rows = $pdo->bindQuery($sql);
        if(!$rows){
            //沒 data
            $table.="<h3>No data</h3>";
        }
        else{
            foreach($rows as $row){
                $table.='<div style="margin:25px;">';
                foreach($row as $key => $value){
                    $table .="<tr>";
                    if($key!="區域ID")
                    {
                        if($key=="縣市名稱"){
                            $table .="<td>  ". $value . "</td>";
                            $location=$value;
                        }
                    }
                    elseif($key=="區域ID"){
                        $table.='<form method="post" action="">';
                        $table .= "<input type='hidden' name='deletearea'> ";
                        $table .= "<button style='position:absolute;left: 230px;' name='areaID' value='$value' class='btn btn-outline-danger btn-sm 'onclick='javascript:return del();'>刪除</button>";

                    }
                    $table .= "</form></td>";
                    $table.="</tr>";
                }
                $table.='</div>';
                
            }
            
        }
    }
    //tabletype=smalltable
    elseif(((isset($_GET['tabletype']))&&(($tabletype=="意外事件類型")||($tabletype=="海岸型態")||($tabletype=="海岸類型")||($tabletype=="湖泊型態")||($tabletype=="湖泊類型")||($tabletype=="地區")||($tabletype=="漁港類型")||($tabletype=="意外事件年齡"))))
    {
        $sql="SELECT * FROM $tabletype;";
        $rows = $pdo->bindQuery($sql);
        if(!$rows){
            //沒 data
            $table.="<h3>No data</h3>";
        }
        else{
            foreach($rows as $row){
                $table.='<div style="margin:25px;">';
                foreach($row as $key => $value){
                    $table .="<tr>";
                    if($key!="ID")
                    {
                        $table .="<td>  ". $value . "</td>";
                       
                    }
                    elseif($key=="ID"){
                        $table.='<form method="post" action="">';
                        $table .= "<input type='hidden' name='deletesmalltable'> ";
                        $table .= "<button style='position:absolute;left: 180px;' name='smalltable' value='$value' class='btn btn-outline-danger btn-sm 'onclick='javascript:return del();'>刪除</button>";

                    }
                    $table .= "</form></td>";
                    $table.="</tr>";
                }
                $table.='</div>';
                
            }
            
        }
    }



    //delete 意外事件
    if(isset($_POST['accidentID'])){
        $accidentID = isset($_POST['accidentID'])?htmlspecialchars($_POST['accidentID']):'';
        $delete_accident="DELETE FROM 意外事件 WHERE `意外事件`.`事件ID` = '$accidentID'";
        $rows = $pdo->bindQuery($delete_accident);
        header("Refresh:0");
    }
    //delete 水域資訊
    if(isset($_POST['waterID'])){
        $waterID = isset($_POST['waterID'])?htmlspecialchars($_POST['waterID']):'';
        $sign=$waterID[0];
        if($sign=="C")
        {
            //海岸
            $delete_water="DELETE FROM 海岸分析 WHERE `海岸分析`.`水域ID` = '$waterID'";
        }
        elseif($sign=="F")
        {
            //漁港
            $delete_water="DELETE FROM 漁港分析 WHERE `漁港分析`.`水域ID` = '$waterID'";
        }
        elseif($sign=="R")
        {
            //溪河
            $delete_water="DELETE FROM 溪河分析 WHERE `溪河分析`.`水域ID` = '$waterID'";
        }
        else{
            //水庫湖
            $delete_water="DELETE FROM 水庫及湖分析 WHERE `水庫及湖分析`.`水域ID` = '$waterID'";
        }
        $rows = $pdo->bindQuery($delete_water);
        $delete_all="DELETE FROM 水域景點 WHERE `水域景點`.`水域ID` = '$waterID'";
        $rows = $pdo->bindQuery($delete_all);
        $delete_safe="DELETE FROM 安全性 WHERE `安全性`.`水域ID` = '$waterID'";
        $rows = $pdo->bindQuery($delete_safe);
        header("Refresh:0");
    }

    //delete 縣市
    if(isset($_POST['areaID'])){
        $areaID = isset($_POST['areaID'])?htmlspecialchars($_POST['areaID']):'';
        $delete_area="DELETE FROM 地理區域 WHERE `地理區域`.`區域ID` = '$areaID'";
        $rows = $pdo->bindQuery($delete_area);
        header("Refresh:0");
    }
    //delete smalltable
    if(isset($_POST['smalltable'])){
        $smalltableID = isset($_POST['smalltable'])?htmlspecialchars($_POST['smalltable']):'';
        $delete="DELETE FROM $tabletype WHERE $tabletype.ID = '$smalltableID'";
        $rows = $pdo->bindQuery($delete);
        header("Refresh:0");
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
    </head>
    <body>
        <nav class="navbar navbar-light" style="background-color: #97CBFF;height: 60px">
            <form class="form-inline" style="position: absolute;right: 8%">
                <h5 style="font-weight:500;color:azure;padding:20px">哈囉!管理員</h5>
                <a class="btn btn-primary" href="Home.php" role="button">sign out</a>
            </form>       
        </nav>
        <div class="list-group" style="width:270px ;font-size:large;text-align:center;position:absolute;left:8%;top:17%">
            <li class="list-group-item list-group-item-action active" style="background-color: #46A3FF;">功能</li>
            <a href="delete.php" class="list-group-item list-group-item-action">刪除</a>
            <a href="add.php" class="list-group-item list-group-item-action">新增</a>
            <a href="update.php" class="list-group-item list-group-item-action">修改</a>
            <a href="detect.php" class="list-group-item list-group-item-action">檢視</a>
        </div>
        <div style="background-color:#E0E0E0;width:770px;height:auto;position:absolute;top:18%;left:31%;">
            <div style="margin:35px 50px;">
                <h5>
                    <?php  
                        if(isset($_GET['tabletype']))
                        {
                            if(((isset($_GET['area']))&&(($tabletype!="意外事件類型")&&($tabletype!="海岸型態")&&($tabletype!="海岸類型")&&($tabletype!="湖泊型態")&&($tabletype!="湖泊類型")&&($tabletype!="地區")&&($tabletype!="漁港類型")&&($tabletype!="意外事件年齡")))){
                                echo 'Delete__'.$tabletype."__".$area;
                            }
                            else{
                                echo 'Delete__'.$tabletype;
                            }
                        }
                        elseif(isset($_GET['age']))
                        {
                            echo "意外事件";
                        }
                        else{
                            echo "Delete";
                        }
                    ?>
                </h5>
                <h6>選擇刪除表格 :</h6>
                <form method="get" action="">
                    <select name="tabletype" class="form-control" style="width:250px ;">
                        <option <?php 
                            if($tabletype=="水庫及湖分析"){
                                $sel="selected";
                                echo $sel;
                            }
                             ?> value="水庫及湖分析">水庫、湖泊</option>
                        <option <?php 
                            if($tabletype=="溪河分析"){
                                $sel="selected";
                                echo $sel;
                            }
                             ?> value="溪河分析">溪河</option>
                        <option <?php 
                            if($tabletype=="海岸分析"){
                                $sel="selected";
                                echo $sel;
                            }
                             ?> value="海岸分析">海岸</option>
                        <option <?php 
                            if($tabletype=="漁港分析"){
                                $sel="selected";
                                echo $sel;
                            }
                             ?> value="漁港分析">漁港</option>
                        <option <?php 
                            if($tabletype=="意外事件"){
                                $sel="selected";
                                echo $sel;
                            }
                             ?> value="意外事件">意外事件</option>
                        <option <?php 
                            if($tabletype=="地理區域"){
                                $sel="selected";
                                echo $sel;
                            }
                             ?> value="地理區域">縣市</option>
                        


                        <option <?php 
                            if($tabletype=="意外事件年齡"){
                                $sel="selected";
                                echo $sel;
                            }
                             ?> value="意外事件年齡">意外事件年齡</option>
                        <option <?php 
                            if($tabletype=="意外事件類型"){
                                $sel="selected";
                                echo $sel;
                            }
                             ?> value="意外事件類型">意外事件類型</option>
                        <option <?php 
                            if($tabletype=="海岸型態"){
                                $sel="selected";
                                echo $sel;
                            }
                             ?> value="海岸型態">海岸型態</option>
                        <option <?php 
                            if($tabletype=="海岸類型"){
                                $sel="selected";
                                echo $sel;
                            }
                             ?> value="海岸類型">海岸類型</option>
                        <option  <?php 
                            if($tabletype=="湖泊型態"){
                                $sel="selected";
                                echo $sel;
                            }
                             ?>value="湖泊型態">湖泊型態</option>
                        <option <?php 
                            if($tabletype=="湖泊類型"){
                                $sel="selected";
                                echo $sel;
                            }
                             ?> value="湖泊類型">湖泊類型</option>
                        <option <?php 
                            if($tabletype=="漁港類型"){
                                $sel="selected";
                                echo $sel;
                            }
                             ?> value="漁港類型">漁港類型</option>
                        <option <?php 
                            if($tabletype=="地區"){
                                $sel="selected";
                                echo $sel;
                            }
                             ?> value="地區">地區</option>
                    </select>
                    <?php
                        if(($tabletype=="水庫及湖分析")||($tabletype=="溪河分析")||($tabletype=="海岸分析")||($tabletype=="漁港分析")||($tabletype=="意外事件")||($tabletype=="地理區域")){
                            $watertable='
                            <div style="position:static;">
                            <h6>選擇縣市:</h6>
                            <select name="area" class="form-control" style="width:250px ;">';
                            $area_sql= "SELECT 縣市名稱 FROM `地理區域`;";
                            $rows = $pdo->bindQuery($area_sql);
                            $watertable.='<option value="全部">全部</option>';
                            foreach($rows as $row){
                                foreach($row as $key => $value){
                                    
                                    $watertable .= "<option value='$value'>". $value . "</option>";
                                    
                                }
                            }
                            $watertable.='</select></div>';
                            echo $watertable;    
                        }
                    ?>
                    <input style="position:static;" class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">
                </form>
                <?php
                    echo $table;
                ?>
            </div>
        </div>
    </body>
</html>

<script type="text/javascript">
function del(){
    var msg = "您真的確定要刪除嗎？\n請確認!";
    if(confirm(msg)==true)
        return true;
    else
        return false;
};
</script>