<?php
    require("pdo.php");
    $pdo = new mypdo();
    $tabletype = isset($_GET['tabletype'])? htmlspecialchars($_GET['tabletype']):'';
    $watertype = isset($_GET['watertype'])? htmlspecialchars($_GET['watertype']):'';
    $age = isset($_GET['age'])? htmlspecialchars($_GET['age']):'';
    $table="";
    if(isset($_GET['tabletype'])&&($tabletype!="安全性")&&($tabletype!="意外事件")) // tabletype= 縣市 漁港 海岸 溪河 水庫
    {
        if($tabletype=='溪河分析')
        {
            $sql="SELECT 溪河分析.水域ID,溪河分析.名稱,縣市名稱,溪河分析.`河流長度(公里)`,溪河分析.`流域面積(平方公里)`,發源地,流向 FROM (`溪河分析` LEFT JOIN `水域景點` ON 溪河分析.水域ID =水域景點.水域ID) LEFT JOIN `地理區域` ON 水域景點.區域ID = 地理區域.區域ID;";
        }
        else{
            $sql = "SELECT DISTINCT * FROM $tabletype ";
        }
        $rows = $pdo->bindQuery($sql);
        $attributes = array_keys($rows[0]);//取的attribute的名稱 因為是rows[0]
        $table .= "<table border='1' align='center'><tr align='center'>";
        // 從查詢結果中取得Attribute 資訊
        foreach($attributes as $attribute){
            if(($attribute!="水域ID")&&($attribute!="區域ID"))
            {
                $table .= "<th>". $attribute ."</th>";
            }
        }    
        $table.="</tr>";
        foreach($rows as $row){
            $table .= "<tr>";
            foreach($row as $key => $value){
                if(($key!="水域ID")&&($key!="區域ID"))
                {
                    $table .= "<td>" . $value . "</td>";
                }
            }
            $table .= "</tr>";
        }
        $table.="</table>";

    }
    elseif(isset($_GET['watertype']))//tabletype=安全性
    {
        if($watertype=="溪河分析")
        {
            $sql="SELECT 溪河分析.名稱,縣市名稱,水域活動限制,看守人員,是否為危險水域 FROM 
            `溪河分析` LEFT JOIN `安全性`  ON 溪河分析.水域ID =安全性.水域ID 
            LEFT JOIN `水域景點` ON 溪河分析.水域ID =水域景點.水域ID 
            LEFT JOIN `地理區域` ON 地理區域.區域ID=水域景點.區域ID;";
        }
        else{
            $sql="SELECT DISTINCT $watertype.名稱,水域活動限制,看守人員,是否為危險水域 FROM `安全性`,`$watertype`WHERE 安全性.水域ID = $watertype.水域ID;";
        }
        $rows = $pdo->bindQuery($sql);
        $attributes = array_keys($rows[0]);
        $table .= "<table border='1' align='center'><tr align='center'>";
        // 從查詢結果中取得Attribute 資訊
        foreach($attributes as $attribute){
            if(($attribute!="水域ID")&&($attribute!="區域ID"))
            {
                $table .= "<th>". $attribute ."</th>";
            }
        }    
        $table.="</tr>";
        foreach($rows as $row){

            $table .= "<tr>";
            foreach($row as $key => $value){
                if(($key!="水域ID")&&($key!="區域ID"))
                {
                    $table .= "<td>" . $value . "</td>";
                }
            }
            $table .= "</tr>";
        }
        $table.="</table>";
        
    }
    elseif(isset($_GET['age']))
    {
        if($age=="全部"){
            $sql="SELECT * FROM `意外事件`;";
        }
        else{
            $sql="SELECT * FROM `意外事件` WHERE 年齡層 = '$age';";
        }
        $rows = $pdo->bindQuery($sql);
        $attributes = array_keys($rows[0]);
        $table .= "<table border='1' align='center'><tr align='center'>";
        // 從查詢結果中取得Attribute 資訊
        foreach($attributes as $attribute){
            if(($attribute!="水域ID")&&($attribute!="區域ID"))
            {
                $table .= "<th>". $attribute ."</th>";
            }
        }    
        $table.="</tr>";
        foreach($rows as $row){

            $table .= "<tr>";
            foreach($row as $key => $value){
                if(($key!="水域ID")&&($key!="區域ID"))
                {
                    $table .= "<td>" . $value . "</td>";
                }
            }
            $table .= "</tr>";
        }
        $table.="</table>";
        
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
                <h5 style="font-weight:500;color:azure;padding:20px">哈喽!管理員</h5>
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
        <div style="background-color:#E0E0E0;width:770px;height:550px;position:absolute;top:18%;left:31%;">
            <div style="margin:35px 50px;">
                <h5>
                    <?php  
                        if(isset($_GET['tabletype']))
                        {
                            echo 'Detect__'.$tabletype;
                            
                        }
                        elseif(isset($_GET['watertype']))
                        {
                            echo 'Detect__安全性__'.$watertype;
                        }
                        elseif(isset($_GET['age']))
                        {
                            echo 'Detect__意外事件__'.$age;
                        }
                        else{
                            echo "Detect";
                        }
                    ?>
                </h5>
                <h6>選擇檢視表格 :</h6>
                <form method="get" action="">
                    <select name="tabletype" class="form-control" style="width:250px ;">
                        <option value="水庫及湖分析">水庫、湖泊</option>
                        <option value="溪河分析">溪河</option>
                        <option value="海岸分析">海岸</option>
                        <option value="漁港分析">漁港</option>
                        <option value="意外事件">意外事件</option>
                        <option value="地理區域">縣市</option>
                        <option value="安全性">安全性</option>
                    </select>
                    <input style="position:absolute ;left:40%;top:18%" class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">
                </form>
                <?php
                    if($tabletype=="安全性"){
                        $watertable='
                            <h6>選擇類型 :</h6>
                            <form method="get" action="">
                                <select name="watertype" class="form-control" style="width:250px ;">
                                    <option value="水庫及湖分析">水庫、湖泊</option>
                                    <option value="溪河分析">溪河</option>
                                    <option value="海岸分析">海岸</option>
                                    <option value="漁港分析">漁港</option>
                                </select>
                                <input style="position:absolute ;left:40%;top:30%" class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">
                            </form>';

                        echo $watertable;
                    }
                    elseif($tabletype=="意外事件"){
                        $watertable='
                            <h6>選擇年齡:</h6>
                            <form method="get" action="">
                                <select name="age" class="form-control" style="width:250px ;">
                                    <option value="少兒">少兒</option>
                                    <option value="青年">青年</option>
                                    <option value="中年">中年</option>
                                    <option value="老人">老人</option>
                                    <option value="不詳">不詳</option>
                                    <option value="全部">全部</option>
                                </select>
                                <input style="position:absolute ;left:40%;top:30%" class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">
                            </form>';

                        echo $watertable;
                    }
                ?>
                <?php
                    echo $table;
                ?>
            </div>
        </div>
    </body>
</html>