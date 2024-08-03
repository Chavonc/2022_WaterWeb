<?php
    require("pdo.php");
    $pdo = new mypdo();
    $tabletype = isset($_GET['tabletype'])? htmlspecialchars($_GET['tabletype']):'';
    $area = isset($_POST['area'])? htmlspecialchars($_POST['area']):'';
    $water_area = isset($_POST['water_area'])? htmlspecialchars($_POST['water_area']):'';
    $water_ID = isset($_POST['water_ID'])? htmlspecialchars($_POST['water_ID']):'';
    $accident_area = isset($_POST['accident_area'])? htmlspecialchars($_POST['accident_area']):'';
    $accident_ID = isset($_POST['accident_ID'])? htmlspecialchars($_POST['accident_ID']):'';
    $change_accident_ID = isset($_POST['change_accident_ID'])? htmlspecialchars($_POST['change_accident_ID']):'';
    $samll_table_ID = isset($_POST['samll_table_ID'])? htmlspecialchars($_POST['samll_table_ID']):'';
    

    $table="";
    //修改縣市
    if((isset($_POST['change_name']))&&(isset($_POST['changeArea']))&&(isset($_POST['區域ID']))){
        $change_name = isset($_POST['change_name'])? htmlspecialchars($_POST['change_name']):'';
        $change_area = isset($_POST['changeArea'])? htmlspecialchars($_POST['changeArea']):'';
        $area_ID = isset($_POST['區域ID'])? htmlspecialchars($_POST['區域ID']):'';
        $update_sql="UPDATE `地理區域` SET `縣市名稱` = '$change_name', `地區` = '$change_area' WHERE `地理區域`.`區域ID` = '$area_ID';";
        $row_area=$pdo->bindQuery($update_sql); 
        $table="<h5>修改成功</h5>";
    }
    //修改四種不同的水域
    if((isset($_GET['tabletype']))&&$tabletype!="地理區域"&&$tabletype!="意外事件"){
        if(($tabletype=="水庫及湖分析")&&(isset($_POST['change_water_ID']))){
            
            $change_water_ID= isset($_POST['change_water_ID'])? htmlspecialchars($_POST['change_water_ID']):'';
            $info_change_name= isset($_POST['info_change_name'])? htmlspecialchars($_POST['info_change_name']):'';
            $info_change_space_int= isset($_POST['info_change_space_int'])? htmlspecialchars($_POST['info_change_space_int']):'';
            $info_change_space_float= isset($_POST['info_change_space_float'])? htmlspecialchars($_POST['info_change_space_float']):'';
            $info_change_type= isset($_POST['info_change_type'])? htmlspecialchars($_POST['info_change_type']):'';
            $info_change_status= isset($_POST['info_change_status'])? htmlspecialchars($_POST['info_change_status']):'';
            $info_change_use= isset($_POST['info_change_use'])? htmlspecialchars($_POST['info_change_use']):'';
            $info_change_sea= isset($_POST['info_change_sea'])? htmlspecialchars($_POST['info_change_sea']):'';
            $info_change_orignal= isset($_POST['info_change_orignal'])? htmlspecialchars($_POST['info_change_orignal']):'';
            $info_change_area= isset($_POST['info_area'])? htmlspecialchars($_POST['info_area']):'';
            $total=$info_change_space_int.".".$info_change_space_float;
            //更改水域資訊
            $sql="UPDATE `水庫及湖分析` SET `名稱` = '$info_change_name',
            `湖泊類型` = '$info_change_type',
            `水源` = '$info_change_orignal', 
            `型態` = '$info_change_status', 
            `用途` = '$info_change_use',
            `海拔(公尺)` = '$info_change_sea', 
            `面積(公頃)` = '$total'
            WHERE `水庫及湖分析`.`水域ID` = '$change_water_ID';";
            $change_lake=$pdo->bindQuery($sql); 
            //更改水域景點
            $sql_area = "UPDATE `水域景點` SET `區域ID` = '$info_change_area' WHERE `水域景點`.`水域ID` =  '$change_water_ID';"; 
            $change_lake=$pdo->bindQuery($sql_area);
            //更改水域安全性
            $info_safe_act= isset($_POST['info_safe_act'])? htmlspecialchars($_POST['info_safe_act']):'';
            $info_safe_people= isset($_POST['info_safe_people'])? htmlspecialchars($_POST['info_safe_people']):'';
            $info_safe_danger= isset($_POST['info_safe_danger'])? htmlspecialchars($_POST['info_safe_danger']):'';
            $sql_safe="UPDATE `安全性` SET `水域活動限制` = '$info_safe_act', `看守人員` = '$info_safe_people', `是否為危險水域` = '$info_safe_danger' WHERE `安全性`.`水域ID` = '$change_water_ID';";
            $change_lake=$pdo->bindQuery($sql_safe);
            $table="<h5>修改成功</h5>";
            
        }
        elseif(($tabletype=="海岸分析")&&(isset($_POST['change_water_ID']))){
            $info_change_area= isset($_POST['info_area'])? htmlspecialchars($_POST['info_area']):'';
            $change_water_ID= isset($_POST['change_water_ID'])? htmlspecialchars($_POST['change_water_ID']):'';
            $info_change_type= isset($_POST['info_change_type'])? htmlspecialchars($_POST['info_change_type']):'';
            $info_change_status= isset($_POST['info_change_status'])? htmlspecialchars($_POST['info_change_status']):'';
            $info_change_name= isset($_POST['info_change_name'])? htmlspecialchars($_POST['info_change_name']):'';
            $info_change_use= isset($_POST['info_change_use'])? htmlspecialchars($_POST['info_change_use']):'';
            $info_change_time= isset($_POST['info_change_time'])? htmlspecialchars($_POST['info_change_time']):'';
            //更改水域資訊
            $sql="UPDATE `海岸分析` SET `名稱` = '$info_change_name',
             `海岸類型` = '$info_change_type', 
             `型態` = '$info_change_status', 
             `特色` = '$info_change_use', 
             `開放時間` = '$info_change_time' WHERE `海岸分析`.`水域ID` = '$change_water_ID';";
            $change_lake=$pdo->bindQuery($sql); 
            //更改水域景點
            $sql_area = "UPDATE `水域景點` SET `區域ID` = '$info_change_area' WHERE `水域景點`.`水域ID` =  '$change_water_ID';"; 
            $change_lake=$pdo->bindQuery($sql_area);
            //更改水域安全性
            $info_safe_act= isset($_POST['info_safe_act'])? htmlspecialchars($_POST['info_safe_act']):'';
            $info_safe_people= isset($_POST['info_safe_people'])? htmlspecialchars($_POST['info_safe_people']):'';
            $info_safe_danger= isset($_POST['info_safe_danger'])? htmlspecialchars($_POST['info_safe_danger']):'';
            $sql_safe="UPDATE `安全性` SET `水域活動限制` = '$info_safe_act', `看守人員` = '$info_safe_people', `是否為危險水域` = '$info_safe_danger' WHERE `安全性`.`水域ID` = '$change_water_ID';";
            $change_lake=$pdo->bindQuery($sql_safe);
            $table="<h5>修改成功</h5>";
        }
        elseif(($tabletype=="漁港分析")&&(isset($_POST['change_water_ID']))){
            $info_change_name= isset($_POST['info_change_name'])? htmlspecialchars($_POST['info_change_name']):'';
            $info_change_area= isset($_POST['info_area'])? htmlspecialchars($_POST['info_area']):'';
            $change_water_ID= isset($_POST['change_water_ID'])? htmlspecialchars($_POST['change_water_ID']):'';
            $info_change_status= isset($_POST['info_change_status'])? htmlspecialchars($_POST['info_change_status']):'';
            $info_change_space_int= isset($_POST['info_change_space_int'])? htmlspecialchars($_POST['info_change_space_int']):'';
            $info_change_space_float= isset($_POST['info_change_space_float'])? htmlspecialchars($_POST['info_change_space_float']):'';
            $info_change_long_int= isset($_POST['info_change_long_int'])? htmlspecialchars($_POST['info_change_long_int']):'';
            $info_change_long_float= isset($_POST['info_change_long_float'])? htmlspecialchars($_POST['info_change_long_float']):'';
            $info_change_time= isset($_POST['info_change_time'])? htmlspecialchars($_POST['info_change_time']):'';
            $total_space=$info_change_space_int.".".$info_change_space_float;
            $total_long=$info_change_long_int.".".$info_change_long_float;

            //更改水域資訊
            $sql="UPDATE `漁港分析` SET `名稱` = '$info_change_name',
             `漁港類型` = '$info_change_status', 
             `泊地面積(公頃)` = '$total_space', 
             `港域深度(公尺)` = '$total_long', 
             `開放時間` = '$info_change_time' WHERE `漁港分析`.`水域ID` = '$change_water_ID';";
            $change_lake=$pdo->bindQuery($sql);
            //更改水域景點
            $sql_area = "UPDATE `水域景點` SET `區域ID` = '$info_change_area' WHERE `水域景點`.`水域ID` =  '$change_water_ID';"; 
            $change_lake=$pdo->bindQuery($sql_area);
            //更改水域安全性
            $info_safe_act= isset($_POST['info_safe_act'])? htmlspecialchars($_POST['info_safe_act']):'';
            $info_safe_people= isset($_POST['info_safe_people'])? htmlspecialchars($_POST['info_safe_people']):'';
            $info_safe_danger= isset($_POST['info_safe_danger'])? htmlspecialchars($_POST['info_safe_danger']):'';
            $sql_safe="UPDATE `安全性` SET `水域活動限制` = '$info_safe_act', `看守人員` = '$info_safe_people', `是否為危險水域` = '$info_safe_danger' WHERE `安全性`.`水域ID` = '$change_water_ID';";
            $change_lake=$pdo->bindQuery($sql_safe);
            $table="<h5>修改成功</h5>";
        }
        elseif(($tabletype=="溪河分析")&&(isset($_POST['change_water_ID']))){
            $info_change_name= isset($_POST['info_change_name'])? htmlspecialchars($_POST['info_change_name']):'';
            $original= isset($_POST['original'])? htmlspecialchars($_POST['original']):'';
            $info_change_area= isset($_POST['info_area'])? htmlspecialchars($_POST['info_area']):'';
            $info_change_space_int= isset($_POST['info_change_space_int'])? htmlspecialchars($_POST['info_change_space_int']):'';
            $info_change_space_float= isset($_POST['info_change_space_float'])? htmlspecialchars($_POST['info_change_space_float']):'';
            $info_change_long_int= isset($_POST['info_change_long_int'])? htmlspecialchars($_POST['info_change_long_int']):'';
            $info_change_long_float= isset($_POST['info_change_long_float'])? htmlspecialchars($_POST['info_change_long_float']):'';
            $info_change_original=isset($_POST['info_change_original'])? htmlspecialchars($_POST['info_change_original']):'';
            $info_change_direction=isset($_POST['info_change_direction'])? htmlspecialchars($_POST['info_change_direction']):'';
            $total_space=$info_change_space_int.".".$info_change_space_float;
            $total_long=$info_change_long_int.".".$info_change_long_float;
            $change_water_ID= isset($_POST['change_water_ID'])? htmlspecialchars($_POST['change_water_ID']):'';
           
            //更改水域資訊 同河不同縣 水域資訊一起改
            $sql="UPDATE `溪河分析` SET `名稱` = '$info_change_name',
            `河流長度(公里)` = '$total_long',
            `流域面積(平方公里)` = '$total_space',
            `發源地` = '$info_change_original', 
            `流向` = '$info_change_direction' 
             WHERE `溪河分析`.`名稱` = '$original';";
            $change_lake=$pdo->bindQuery($sql);
            //更改水域景點 更改資訊是依照水域ID改 不是水域名稱
            $sql_area = "UPDATE `水域景點` SET `區域ID` = '$info_change_area' WHERE `水域景點`.`水域ID` =  '$change_water_ID';"; 
            $change_lake=$pdo->bindQuery($sql_area);
            //更改水域安全性 更改資訊是依照水域ID改 不是水域名稱
            $info_safe_act= isset($_POST['info_safe_act'])? htmlspecialchars($_POST['info_safe_act']):'';
            $info_safe_people= isset($_POST['info_safe_people'])? htmlspecialchars($_POST['info_safe_people']):'';
            $info_safe_danger= isset($_POST['info_safe_danger'])? htmlspecialchars($_POST['info_safe_danger']):'';
            $sql_safe="UPDATE `安全性` SET `水域活動限制` = '$info_safe_act', `看守人員` = '$info_safe_people', `是否為危險水域` = '$info_safe_danger' WHERE `安全性`.`水域ID` = '$change_water_ID';";
            $change_lake=$pdo->bindQuery($sql_safe);
            $table="<h5>修改成功</h5>";

        }
    }
    //修改意外事件
    if((isset($_GET['tabletype']))&&(isset($_POST['change_accident_ID']))){
        $change_accident_ID = isset($_POST['change_accident_ID'])? htmlspecialchars($_POST['change_accident_ID']):'';
        $accident_change_area = isset($_POST['accident_change_area'])? htmlspecialchars($_POST['accident_change_area']):'';
        $accident_change_water = isset($_POST['accident_change_water'])? htmlspecialchars($_POST['accident_change_water']):'';
        $accident_change_name = isset($_POST['accident_change_name'])? htmlspecialchars($_POST['accident_change_name']):'';
        $accident_change_time = isset($_POST['accident_change_time'])? htmlspecialchars($_POST['accident_change_time']):'';
        $accident_change_type = isset($_POST['accident_change_type'])? htmlspecialchars($_POST['accident_change_type']):'';
        $accident_change_age = isset($_POST['accident_change_age'])? htmlspecialchars($_POST['accident_change_age']):'';
        $accident_change_result = isset($_POST['accident_change_result'])? htmlspecialchars($_POST['accident_change_result']):'';
        
       /* echo $change_accident_ID;
        echo $accident_change_area;
        echo $accident_change_water;
        echo $accident_change_name;
        echo $accident_change_time;
        echo $accident_change_type;
        echo $accident_change_age;
        echo $accident_change_result;*/
        $accident="UPDATE `意外事件` SET `水域ID` = '$accident_change_water',
         `區域ID` = '$accident_change_area', 
         `發生地點` = '$accident_change_name',
         `事件發生時間` = '$accident_change_time',
         `事件類型` = '$accident_change_type', 
         `年齡層` = '$accident_change_age',
         `事件結果` = '$accident_change_result' WHERE `意外事件`.`事件ID` = '$change_accident_ID';";
        $row_accident=$pdo->bindQuery($accident); 
        $table="<h5>修改成功</h5>";
    }

    //修改 smalltable
    if(isset($_POST['small_ID'])&&isset($_POST['change_small_name'])){
        $change_small_name = isset($_POST['change_small_name'])? htmlspecialchars($_POST['change_small_name']):'';
        $small_ID = isset($_POST['small_ID'])? htmlspecialchars($_POST['small_ID']):'';
        $update_sql="UPDATE `$tabletype` SET `$tabletype` = '$change_small_name' WHERE `$tabletype`.`ID` = '$small_ID';";
        $row=$pdo->bindQuery($update_sql); 
        $table="<h5>修改成功</h5>";
    }
    




    //地區表格修改呈現
    //area 是縣市ID
    if(isset($_POST['area'])){
        $table.='<form method="post" action="">';
        $sql_area="SELECT 區域ID,縣市名稱,ID,地區.地區 FROM `地理區域` LEFT JOIN 地區 ON 地理區域.地區=地區.ID where 區域ID='$area' ;";
        $row_area=$pdo->bindQuery($sql_area); 
        foreach($row_area as $row){
            foreach($row as $key => $value){
                //change_name
                if($key=="縣市名稱"){
                    $table.="<h5>".$key." : ".$value."</h5>";
                    $table.='<div class="input-group mb-3" style="width:300px">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">修改縣市名稱</span>
                    </div>
                    <input type="text" value="'.$value.'" name="change_name" maxlength="4" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                  </div>';
                }
                //changeArea
                elseif($key=="地區"){
                    $table.="<h5>".$key." : ".$value."</h5>";
                    $table.='<div class="input-group mb-3" style="width:300px" >
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">修改地區</label>
                    </div>
                    <select name="changeArea" class="custom-select" id="inputGroupSelect01">';
                    $area_all_area='SELECT * FROM `地區`;';
                    $all_area=$pdo->bindQuery($area_all_area);
                    foreach($all_area as $row){
                        foreach($row as $key => $area_value){
                            if($key=="ID"){
                                $ID=$area_value;
                            }
                            elseif($value==$area_value){
                                $table .= "<option selected value='$ID'>". $area_value . "</option>";
                            }
                            else{
                                $table .= "<option value='$ID'>". $area_value . "</option>";
                            }
                        }
                    }
                    $table.='</select></div>';
                }
                elseif($key=="區域ID"){
                    $table.="<input type='hidden' name='區域ID' value='$value'>";
                }
            }
        }
        $table.='<input style="position:static " class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">';
        $table.='</form>';

    }

    //水域類型&安全性_修改表格呈現
    if(isset($_POST['water_ID'])){
        $table.="<h4>修改水域資訊</h4>";


        //修改縣市
        //info_area 紀錄要更改的區域ID
        $sql_water_area="SELECT 地理區域.縣市名稱 FROM (`$tabletype` LEFT JOIN `水域景點` ON $tabletype.水域ID =水域景點.水域ID) LEFT JOIN `地理區域` ON 水域景點.區域ID = 地理區域.區域ID WHERE $tabletype.水域ID='$water_ID';";
        $arearow=$pdo->bindQuery($sql_water_area);
        foreach($arearow as $row)
        {
            foreach($row as $key => $value){
                $table.='<form method="post" action="">';
                $area_all_area='SELECT 區域ID,縣市名稱 FROM `地理區域`;';
                $all_area=$pdo->bindQuery($area_all_area);
                $table.="<h5>".$key." : ".$value."</h5>";
                //下拉式選單
                $table.='<div class="input-group mb-3" style="width:300px" >
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">修改地區</label>
                    </div>
                    <select name="info_area" class="custom-select" id="inputGroupSelect01">';
                foreach($all_area as $row){
                    foreach($row as $key => $area_value){
                        if($key=="區域ID"){
                            $area_ID=$area_value;
                        }
                        else{
                            if($value==$area_value){
                                $table .= "<option selected value='$area_ID'>". $area_value . "</option>";
                            }
                            else{
                                $table .= "<option value='$area_ID'>". $area_value . "</option>";
                            }
                        }
                        
                    }
                }
                $table.='</select></div>';
            }
        }
        

        // 水庫及湖
        if($tabletype=="水庫及湖分析"){
            $sql="SELECT 水域ID,名稱,`面積(公頃)`,`海拔(公尺)`, 湖泊類型.湖泊類型,水源,湖泊型態 AS 型態,用途 FROM `水庫及湖分析` LEFT JOIN 湖泊類型 ON 湖泊類型.ID=水庫及湖分析.湖泊類型 LEFT JOIN 湖泊型態 ON 湖泊型態.ID=水庫及湖分析.型態 WHERE 水域ID ='$water_ID';";
            $waterinfo=$pdo->bindQuery($sql);
            foreach($waterinfo as $row)
            {
                foreach($row as $key => $value){
                    //info_change_name 更改名稱
                    if($key=="名稱"){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">修改水域名稱</span>
                            </div>
                            <input type="text" value="'.$value.'" name="info_change_name" maxlength="10" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                            <input type="hidden" value="'.$water_ID.'" name="change_water_ID" />
                        </div>';
                    }
                    //info_change_space_int 
                    //info_change_space_float
                    elseif($key=="面積(公頃)"){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:600px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">水域面積(int)</span>
                            </div>
                            <input type="text" value="'.intval((float)$value).'" name="info_change_space_int" maxlength="7" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">水域面積(float)</span>
                            </div>
                            <input type="text" value="'. mb_substr($value,-3).'" name="info_change_space_float" maxlength="3" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';
                    }
                    // info_change_sea
                    elseif($key=="海拔(公尺)"){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">修改'.$key.'</span>
                            </div>
                            <input type="text" value="'.$value.'" name="info_change_sea" maxlength="5" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';

                    }
                    //info_change_type 湖泊類型
                    elseif($key=='湖泊類型'){

                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px" >
                            <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">修改'.$key.'</label>
                            </div>
                            <select name="info_change_type"class="custom-select" id="inputGroupSelect01">';
                        $lake_sql="SELECT * FROM `湖泊類型`; ";
                        $lake=$pdo->bindQuery($lake_sql);
                        foreach($lake as $row){
                            foreach($row as $key => $valuerows){
                                if($key=="ID"){
                                    $ID=$valuerows;
                                }
                                elseif($value==$valuerows){
                                    $table .= "<option selected value='$ID'>". $value . "</option>";
                                }
                                else{
                                    $table .= "<option value='$ID'>". $valuerows . "</option>";
                                }
                                
                            }
                        }
                        $table.='</select></div>';
                        
                    }
                    //info_change_orignal
                    elseif($key=="水源"){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">修改'.$key.'</span>
                            </div>
                            <input type="text" value="'.$value.'" name="info_change_orignal" maxlength="5" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';

                    }
                    elseif($key=='型態'){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px" >
                            <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">修改'.$key.'</label>
                            </div>
                            <select name="info_change_status"class="custom-select" id="inputGroupSelect01">
                            <option selected value="其他">其他</option>';
                        $lake_sql="SELECT * FROM `湖泊型態`; ";
                        $lake=$pdo->bindQuery($lake_sql);
                        foreach($lake as $row){
                            foreach($row as $key =>$valuerows){
                                if($key=="ID"){
                                    $ID=$valuerows;
                                }
                                elseif($value==$valuerows){
                                    $table .= "<option selected value='$ID'>". $value . "</option>";
                                }
                                else{
                                    $table .= "<option value='$ID'>". $valuerows . "</option>";
                                }
                            }
                        }
                        $table.='</select></div>';
                        
                    }
                    //info_change_use 用途
                    elseif($key=='用途'){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">修改'.$key.'</span>
                            </div>
                            <input type="text" value="'.$value.'" name="info_change_use" maxlength="5" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';
                    }


                }
            }

        }

        //海岸
        if($tabletype=="海岸分析"){
            $sql="SELECT 水域ID,名稱,海岸類型.海岸類型,海岸型態 AS 型態,特色,開放時間 FROM `海岸分析` LEFT JOIN 海岸型態 ON 海岸型態.ID=海岸分析.型態 LEFT JOIN 海岸類型 ON 海岸類型.ID=海岸分析.海岸類型 WHERE 水域ID ='$water_ID';";
            $waterinfo=$pdo->bindQuery($sql);
            foreach($waterinfo as $row)
            {
                foreach($row as $key => $value){
                    //info_change_name 更改名稱
                    if($key=="名稱"){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">修改水域名稱</span>
                            </div>
                            <input type="text" value="'.$value.'" name="info_change_name" maxlength="10" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                            <input type="hidden" value="'.$water_ID.'" name="change_water_ID" />
                        </div>';
                    }
                    //info_change_type 海岸類型
                    elseif($key=='海岸類型'){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px" >
                            <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">修改'.$key.'</label>
                            </div>
                            <select name="info_change_type"class="custom-select" id="inputGroupSelect01">';
                        $lake_sql="SELECT * FROM `海岸類型`";
                        $lake=$pdo->bindQuery($lake_sql);
                        foreach($lake as $row){
                            foreach($row as $key => $valuerows){
                                if($key=="ID"){
                                    $ID=$valuerows;
                                }
                                elseif($value==$valuerows){
                                    $table .= "<option selected value='$ID'>". $value . "</option>";
                                }
                                else{
                                    $table .= "<option value='$ID'>". $valuerows . "</option>";
                                }
                                
                            }
                        }
                        $table.='</select></div>';
                        
                    }
                    //info_change_status 型態
                    elseif($key=='型態'){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px" >
                            <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">修改'.$key.'</label>
                            </div>
                            <select name="info_change_status"class="custom-select" id="inputGroupSelect01">
                            <option selected value="其他">其他</option>';
                        $lake_sql="SELECT * FROM `海岸型態` ";
                        $lake=$pdo->bindQuery($lake_sql);
                        foreach($lake as $row){
                            foreach($row as $key =>$valuerows){
                                if($key=="ID"){
                                    $ID=$valuerows;
                                }
                                elseif($value==$valuerows){
                                    $table .= "<option selected value='$ID'>". $value . "</option>";
                                }
                                else{
                                    $table .= "<option value='$ID'>". $valuerows . "</option>";
                                }
                            }
                        }
                        $table.='</select></div>';
                        
                    }
                    //info_change_use 特色
                    elseif($key=='特色'){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">修改'.$key.'</span>
                            </div>
                            <input type="text" value="'.$value.'" name="info_change_use" maxlength="20" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';
                    }
                    //info_change_time 開放時間
                    elseif($key=='開放時間'){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">修改'.$key.'</span>
                            </div>
                            <input type="text" value="'.$value.'" name="info_change_time" maxlength="20" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';
                    }

                }
            }

        }

        //溪河
        if($tabletype=="溪河分析"){
            $sql="SELECT * FROM 溪河分析 WHERE 水域ID ='$water_ID';";
            $waterinfo=$pdo->bindQuery($sql);
            foreach($waterinfo as $row)
            {
                foreach($row as $key => $value){
                    //info_change_name 更改名稱
                    if($key=="名稱"){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">修改水域名稱</span>
                            </div>
                            <input type="text" value="'.$value.'" name="info_change_name" maxlength="5" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                            <input type="hidden" value="'.$water_ID.'" name="change_water_ID" />
                            <input type="hidden" value="'.$value.'" name="original" />
                        </div>';
                    }
                    //info_change_long_int 
                    //info_change_long_float
                    elseif($key=="河流長度(公里)"){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:600px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">河流長度(int)</span>
                            </div>
                            <input type="text" value="'.intval((float)$value).'" name="info_change_long_int" maxlength="4" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">河流長度(float)</span>
                            </div>
                            <input type="text" value="'.mb_substr($value,-2).'" name="info_change_long_float" maxlength="2" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';
                    }
                    //info_change_space_int 
                    //info_change_space_float
                    elseif($key=="流域面積(平方公里)"){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:600px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">流域面積(int)</span>
                            </div>
                            <input type="text" value="'.intval((float)$value).'" name="info_change_space_int" maxlength="4" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">流域面積(float)</span>
                            </div>
                            <input type="text" value="'. mb_substr($value,-2).'" name="info_change_space_float" maxlength="2" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';
                    }
                     
                    //info_change_original 發源地
                    elseif($key=='發源地'){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">修改'.$key.'</span>
                            </div>
                            <input type="text" value="'.$value.'" name="info_change_original" maxlength="20" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';
                    }
                    //info_change_direction 流向
                    elseif($key=='流向'){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">修改'.$key.'</span>
                            </div>
                            <input type="text" value="'.$value.'" name="info_change_direction" maxlength="20" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';
                    }
                }
            }

        }

        //漁港
        if($tabletype=="漁港分析"){
            $sql="SELECT 水域ID,名稱,漁港類型.漁港類型,`泊地面積(公頃)` ,`港域深度(公尺)` , 開放時間 FROM `漁港分析` LEFT JOIN 漁港類型 ON 漁港類型.ID=漁港分析.漁港類型  WHERE 水域ID ='$water_ID';";
            $waterinfo=$pdo->bindQuery($sql);
            foreach($waterinfo as $row)
            {
                foreach($row as $key => $value){
                    //info_change_name 更改名稱
                    if($key=="名稱"){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">修改水域名稱</span>
                            </div>
                            <input type="text" value="'.$value.'" name="info_change_name" maxlength="20" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                            <input type="hidden" value="'.$water_ID.'" name="change_water_ID" />
                        </div>';
                    }
                     //info_change_status 類型
                     elseif($key=='漁港類型'){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px" >
                            <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">修改'.$key.'</label>
                            </div>
                            <select name="info_change_status"class="custom-select" id="inputGroupSelect01">
                            <option selected value="其他">其他</option>';
                        $lake_sql="SELECT * FROM `漁港類型` ";
                        $lake=$pdo->bindQuery($lake_sql);
                        foreach($lake as $row){
                            foreach($row as $key =>$valuerows){
                                if($key=="ID"){
                                    $ID = $valuerows;
                                }
                                elseif($value==$valuerows){
                                    $table .= "<option selected value='$ID'>". $value . "</option>";
                                }
                                else{
                                    $table .= "<option value='$ID'>". $valuerows . "</option>";
                                }
                            }
                        }
                        $table.='</select></div>';
                        
                    }
                    //info_change_space_int 
                    //info_change_space_float
                    elseif($key=="泊地面積(公頃)"){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:600px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">泊地面積(int)</span>
                            </div>
                            <input type="text" value="'.intval((float)$value).'" name="info_change_space_int" maxlength="7" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">泊地面積(float)</span>
                            </div>
                            <input type="text" value="'. mb_substr($value,-3).'" name="info_change_space_float" maxlength="3" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';
                    }
                    //info_change_long_int 
                    //info_change_long_float
                    elseif($key=="港域深度(公尺)"){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:600px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">港域深度(int)</span>
                            </div>
                            <input type="text" value="'.intval((float)$value).'" name="info_change_long_int" maxlength="3" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">港域深度(float)</span>
                            </div>
                            <input type="text" value="'. mb_substr($value,-2).'" name="info_change_long_float" maxlength="2" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';
                    }

                    //info_change_time 開放時間
                    elseif($key=='開放時間'){
                        $table.="<h5>".$key." : ".$value."</h5>";
                        $table.='<div class="input-group mb-3" style="width:300px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">修改'.$key.'</span>
                            </div>
                            <input type="text" value="'.$value.'" name="info_change_time" maxlength="20" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';
                    }

                }
            }
        }


        //修改水域安全性
        $sql_location_safe="SELECT * FROM `安全性` WHERE 水域ID ='$water_ID';";
        $watersafe=$pdo->bindQuery($sql_location_safe);
        foreach($watersafe as $row)
        {
            foreach($row as $key => $value){
                if($key!='水域ID'){
                    $table.="<h6>".$key." : ".$value."</h6>";
                    //info_safe_act
                    if($key=="水域活動限制"){
                        $table.='<div class="input-group mb-3" style="width:˙700px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">修改'.$key.'</span>
                            </div>
                            <input type="text" value="'.$value.'" name="info_safe_act" maxlength="30" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';
                    }
                    //info_safe_people
                    elseif($key=="看守人員"){
                        $table.='<div class="input-group mb-3" style="width:˙700px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">修改'.$key.'</span>
                            </div>
                            <input type="text" value="'.$value.'" name="info_safe_people" maxlength="30" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';

                    }
                    //info_safe_danger
                    elseif($key=="是否為危險水域"){
                        $table.='<div class="input-group mb-3" style="width:˙700px">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">修改'.$key.'</span>
                            </div>
                            <input type="text" value="'.$value.'" name="info_safe_danger" maxlength="150" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                        </div>';

                    }

                   
                }
            }
        }
        $table.='<input style="position:static " class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">';
        $table.='</form>';
        
    }

    
    //意外事件修改表格程現
    if(isset($_POST['accident_ID'])){
       $sql="SELECT 事件ID,縣市名稱,水域ID,發生地點,事件發生時間,意外事件類型 AS 事件類型 ,意外事件年齡 AS 年齡層,事件結果 FROM `意外事件` LEFT JOIN `地理區域` ON 地理區域.區域ID=意外事件.區域ID LEFT JOIN 意外事件類型 ON 意外事件類型.ID=意外事件.事件類型 LEFT JOIN 意外事件年齡 ON 意外事件年齡.ID=意外事件.年齡層 WHERE 事件ID=$accident_ID;";
       $rows=$pdo->bindQuery($sql);
       foreach($rows as $row){
        foreach($row as $key => $value){
                $table.='<form method="post" action="">';
                //change_accident_ID 事件ID
                if($key=="事件ID"){
                    $table .= "<h4>事件編號__". $value."</h4>" ;
                    $table.="<input type='hidden' name='change_accident_ID' value='$value'> ";
                }
                //accident_change_area 縣市ID 
                elseif($key=="縣市名稱"){
                    $table.="<h5>".$key.":".$value."</h5>";
                    $area_accident='SELECT 區域ID,縣市名稱 FROM `地理區域`;';
                    $all_area=$pdo->bindQuery($area_accident);
                    $table.='<div class="input-group mb-3" style="width:300px" >
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">修改地區</label>
                    </div>
                    <select name="accident_change_area" class="custom-select" id="inputGroupSelect01">';
                    foreach($all_area as $row){
                        foreach($row as $key => $area_value){
                            if($key=="區域ID"){
                                $area_ID=$area_value;
                            }
                            else{
                                if($value==$area_value){
                                    $table .= "<option selected value='$area_ID'>". $area_value . "</option>";
                                }
                                else{
                                    $table .= "<option value='$area_ID'>". $area_value . "</option>";
                                }
                            }
                            
                        }
                    }
                    $table.='</select></div>';
                }
                //accident_change_water 改變水域位置
                elseif($key=="水域ID"){
                    $sign=$value[0];
                    if($sign=="C"){
                        $sql="SELECT 名稱 FROM `海岸分析` WHERE 水域ID='$value';";
                    }
                    elseif($sign=="R"){
                        $sql="SELECT 名稱 FROM `溪河分析` WHERE 水域ID='$value';";
                    }
                    elseif($sign=="F"){
                        $sql="SELECT 名稱 FROM `漁港分析` WHERE 水域ID='$value';";
                    }
                    else{
                        $sql="SELECT 名稱 FROM `水庫及湖分析` WHERE 水域ID='$value';";
                    }
                    $rows=$pdo->bindQuery($sql);
                    foreach($rows as $row){
                        foreach($row as $key => $water){
                            $table.="<h5>發生水域:".$water."</h5>";
                        }
                    }
                    if($sign=="C"){
                        $all_water="SELECT 海岸分析.水域ID,縣市名稱,名稱 FROM `海岸分析` LEFT JOIN `水域景點`ON 海岸分析.水域ID=水域景點.水域ID LEFT JOIN `地理區域`ON 水域景點.區域ID=地理區域.區域ID;";
                    }
                    elseif($sign=="R"){
                        $all_water="SELECT 溪河分析.水域ID,縣市名稱,名稱 FROM `溪河分析` LEFT JOIN `水域景點`ON 溪河分析.水域ID=水域景點.水域ID LEFT JOIN `地理區域`ON 水域景點.區域ID=地理區域.區域ID;";
                    }
                    elseif($sign=="F"){
                        $all_water="SELECT 漁港分析.水域ID,縣市名稱,名稱 FROM `漁港分析` LEFT JOIN `水域景點`ON 漁港分析.水域ID=水域景點.水域ID LEFT JOIN `地理區域`ON 水域景點.區域ID=地理區域.區域ID;";
                    }
                    else{
                        $all_water="SELECT 水庫及湖分析.水域ID,縣市名稱,名稱 FROM `水庫及湖分析` LEFT JOIN `水域景點`ON 水庫及湖分析.水域ID=水域景點.水域ID LEFT JOIN `地理區域`ON 水域景點.區域ID=地理區域.區域ID;";
                    }
                    $water_rows=$pdo->bindQuery($all_water);
                    $table.='<div class="input-group mb-3" style="width:300px" >
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">修改水域</label>
                    </div>
                    <select name="accident_change_water" class="custom-select" id="inputGroupSelect01">';
                    foreach($water_rows as $row){
                        foreach($row as $key => $watervalue){
                            if($key=="水域ID"){
                                $all_water_id=$watervalue;
                            }
                            elseif($key=="縣市名稱"){
                                if($all_water_id==$value){
                                    $table.="<option selected value='$all_water_id'>".$watervalue."__";
                                }
                                else{
                                    $table.="<option value='$all_water_id'>".$watervalue."__";
                                }
                            }
                            elseif($key=="名稱"){
                                $table.=$watervalue."</option>";
                            }
                            
                        }
                    }
                    $table.='</select></div>';

                    
                }

                //accident_change_name
                elseif($key=="發生地點"){
                    $table.="<h5>".$key." : ".$value."</h5>";
                    $table.='<div class="input-group mb-3" style="width:350px">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">修改發生地點</span>
                        </div>
                        <input type="text" value="'.$value.'" name="accident_change_name" maxlength="20" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                    </div>';

                }
                //accident_change_time
                elseif($key=="事件發生時間"){
                    $table.="<h5>".$key." : ".$value."</h5>";
                    $table.='<div class="input-group mb-3" style="width:300px">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">修改發生時間</span>
                    </div>
                    <input type="date" value="'.$value.'" name="accident_change_time"  class="form-control" aria-label="Change" aria-describedby="basic-addon1"></div>';
                }
                //accident_change_type
                elseif($key=="事件類型"){
                    $table.="<h5>".$key.":".$value."</h5>";
                    $sql="SELECT * FROM `意外事件類型`;";
                    $type=$pdo->bindQuery($sql);
                    $table.='<div class="input-group mb-3" style="width:300px" >
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">事件類型</label>
                    </div>
                    <select name="accident_change_type" class="custom-select" id="inputGroupSelect01">';
                    foreach($type as $row){
                        foreach($row as $key => $status){
                            if($key=="ID"){
                                $ID=$status;
                            }
                            elseif($value==$status){
                                $table .= "<option selected value='$ID'>". $status ."</option>" ;
                            }
                            else{
                                $table .= "<option value='$ID'>". $status ."</option>";
                            }
                        }
                    }
                    $table.='</select></div>';
                }
                //accident_change_age
                elseif($key=="年齡層"){
                    $table.="<h5>".$key.":".$value."</h5>";
                    $sql="SELECT * FROM `意外事件年齡`;";
                    $type=$pdo->bindQuery($sql);
                    $table.='<div class="input-group mb-3" style="width:300px" >
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">事件年齡</label>
                    </div>
                    <select name="accident_change_age" class="custom-select" id="inputGroupSelect01">';
                    foreach($type as $row){
                        foreach($row as $key => $status){
                            if($key=="ID"){
                                $ID=$status;
                            }
                            elseif($value==$status){
                                $table .= "<option selected value='$ID'>". $status ."</option>" ;
                            }
                            else{
                                $table .= "<option value='$ID'>". $status ."</option>";
                            }
                        }
                    }
                    $table.='</select></div>';

                }
                //accident_change_result 
                elseif($key=="事件結果"){
                    $table.="<h5>".$key." : ".$value."</h5>";
                    $table.='<div class="input-group mb-3" style="width:300px">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">修改事件結果</span>
                        </div>
                        <input type="text" value="'.$value.'" name="accident_change_result" maxlength="5" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                    </div>';
                }
                
                
            }
        }
        $table.='<input style="position:static " class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">';
        $table.='</form>';
        
        
    }

    //smalltable 呈現
    if(((isset($_POST['samll_table_ID']))&&(($tabletype=="意外事件類型")||($tabletype=="海岸型態")||($tabletype=="海岸類型")||($tabletype=="湖泊型態")||($tabletype=="湖泊類型")||($tabletype=="地區")||($tabletype=="漁港類型")||($tabletype=="意外事件年齡")))){
        //長度限制
        if($tabletype=="意外事件年齡"){
            $max=15;
        }
        elseif($tabletype=="海岸型態"){
            $max=2;
        }
        elseif($tabletype=="湖泊類型"){
            $max=6;
        }
        else{
            $max=4;
        }
       
        $table.='<form method="post" action="">';
        $sql="SELECT * FROM $tabletype where `ID` ='$samll_table_ID' ";
        $rows=$pdo->bindQuery($sql);
        foreach($rows as $row){
            foreach($row as $key => $value){
                if($key=="ID"){
                    $ID=$value;
                }
                //change_small_name
                //small_ID
                elseif($key!="ID"){
                    $table.="<h5>".$key." : ".$value."</h5>";
                    $table.='<div class="input-group mb-3" style="width:300px">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">修改名稱</span>
                    </div>
                    <input type="hidden" name="small_ID" value="'.$ID.'">
                    <input type="text" value="'.$value.'" name="change_small_name" maxlength="'.$max.'" class="form-control" placeholder="Change" aria-label="Change" aria-describedby="basic-addon1">
                  </div>';
                }
            }
        }
        $table.='<input style="position:static " class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">';
        $table.='</form>';


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
                            if(isset($_POST['water_area'])){

                                echo 'Update__'.$tabletype.'__'.$water_area;
                            }
                            elseif(isset($_POST['water_ID'])){
                                $sql="SELECT 名稱 FROM $tabletype WHERE 水域ID ='$water_ID';";
                                $rows = $pdo->bindQuery($sql);
                                foreach($rows as $row){
                                    foreach($row as $key => $value){

                                        //顯示location
                                        echo 'Update__'.$tabletype.'__'.$value;
                                    }
                                }


                            }
                            elseif(isset($_POST['area'])){
                                //顯示縣市
                                echo 'Update__'.$tabletype.'__'.$area;
                            }
                            elseif(isset($_POST['accident_area'])){
                                //顯示意外事件縣市
                                echo 'Update__'.$tabletype.'__'.$accident_area;
                            }
                            elseif(isset($_POST['accident_ID'])){
                                echo 'Update__'.$tabletype.'__編號'.$accident_ID;
                            }
                            else{
                                echo 'Update__'.$tabletype;
                            }
                            
                            
                        }
                        else{
                            echo "Update";
                        }
                    ?>
                </h5>
                <h6>選擇修改表格 :</h6>
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
                    <input style="position:static" class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">
                </form>
                <?php
                    //area
                    if($tabletype=="地理區域"){
                        $sql="SELECT * FROM $tabletype;";
                        $rows = $pdo->bindQuery($sql);
                        $watertable='<h6>選擇修改內容 :</h6>
                        <form method="post" action="">
                            <select name="area" class="form-control" style="width:250px ;">';
                        foreach($rows as $row){
                            foreach($row as $key => $value){
                                if($key=='區域ID'){
                                    $area_ID=$value;
                                }
                                elseif($key=='縣市名稱'){
                                    $watertable .= "<option value='$area_ID'>". $value . "</option>";
                                }
                            }
                        }
                        $watertable.='</select>
                        <input style="position:static" class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">
                                </form>';
                        echo $watertable;         

                    }
                    elseif($tabletype=='意外事件'){
                        $sql="SELECT DISTINCT 縣市名稱 FROM `意外事件` LEFT JOIN `地理區域` ON 意外事件.區域ID=地理區域.區域ID WHERE 縣市名稱 IS NOT null;";
                        $rows = $pdo->bindQuery($sql);
                        $watertable='
                            <h6>選擇縣市 :</h6>
                            <form method="post" action="">
                                <select name="accident_area" class="form-control" style="width:250px ;">
                                <option value="全部">全部</option>';
                        foreach($rows as $row){
                            foreach($row as $key => $value){
                                $watertable .= "<option value='$value'>". $value . "</option>";
                            }
                        }          
                        $watertable.='</select>
                        <input style="position:static" class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">
                            </form>';

                        echo $watertable;
                    }
                    // tabletype 溪河 水庫湖 海岸 漁港
                    elseif(($tabletype=='溪河分析')||($tabletype=='漁港分析')||($tabletype=='海岸分析')||($tabletype=='水庫及湖分析')){
                        $sql="SELECT * FROM `地理區域`;";
                        $rows = $pdo->bindQuery($sql);
                        $watertable='<h6>選擇縣市 :</h6>
                        <form method="post" action="">
                            <select name="water_area" class="form-control" style="width:250px ;">';
                        $watertable .= "<option value='全部'>全部</option>";
                        foreach($rows as $row){
                            foreach($row as $key => $value){
                                if($key=='縣市名稱'){
                                    $watertable .= "<option value='$value'>". $value . "</option>";
                                }
                            }
                        }
                        $watertable.='</select>
                        <input style="position:static" class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">
                                </form>';
                        echo $watertable;      
                    }
                    //samll_table_ID
                    elseif((($tabletype=="意外事件類型")||($tabletype=="海岸型態")||($tabletype=="海岸類型")||($tabletype=="湖泊型態")||($tabletype=="湖泊類型")||($tabletype=="地區")||($tabletype=="漁港類型")||($tabletype=="意外事件年齡"))){
                        $sql="SELECT * FROM $tabletype;";
                        $rows = $pdo->bindQuery($sql);
                        $watertable='<h6>選擇修改內容 :</h6>
                        <form method="post" action="">
                            <select name="samll_table_ID" class="form-control" style="width:250px ;">';
                        foreach($rows as $row){
                            foreach($row as $key => $value){
                                if($key=='ID'){
                                    $ID=$value;
                                }
                                elseif($key!='ID'){
                                    $watertable .= "<option value='$ID'>". $value . "</option>";
                                }
                            }
                        }
                        $watertable.='</select>
                        <input style="position:static" class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">
                                </form>';
                        echo $watertable;
                        

                    }
                    //選縣市篩出符合縣市的水域
                    if(isset($_POST['water_area'])){
                        if($water_area=="全部"){
                            $sql="SELECT $tabletype.水域ID,縣市名稱,$tabletype.名稱 FROM (`$tabletype` LEFT JOIN `水域景點` ON $tabletype.水域ID =水域景點.水域ID) LEFT JOIN `地理區域` ON 水域景點.區域ID = 地理區域.區域ID ;";
                        }
                        else{
                            $sql = "SELECT $tabletype.水域ID,$tabletype.名稱 ,地理區域.縣市名稱 FROM (`$tabletype` LEFT JOIN `水域景點` ON $tabletype.水域ID =水域景點.水域ID) LEFT JOIN `地理區域` ON 水域景點.區域ID = 地理區域.區域ID WHERE 縣市名稱 = '$water_area';";
                        }
                        $rows = $pdo->bindQuery($sql);
                        if($rows){
                            $watertable='<h6>選擇更改內容 :</h6>
                            <form method="post" action="">
                                <select name="water_ID" class="form-control" style="width:250px ;">';
                            if($water_area=="全部"){
                                foreach($rows as $row){
                                    foreach($row as $key => $value){
                                        if($key=="水域ID"){
                                            $waterID=$value;
                                        }
                                        elseif($key=='縣市名稱'){
                                            $name_area=$value;
                                        }
                                        elseif($key=='名稱'){
                                            $watertable .= "<option value='$waterID'>".$name_area."__".$value . "</option>";
                                        }
                                    }
                                }
                            }
                            else{
                                foreach($rows as $row){
                                    foreach($row as $key => $value){
                                        if($key=="水域ID"){
                                            $waterID=$value;
                                        }
                                        elseif($key=='名稱'){
                                            $watertable .= "<option value='$waterID'>". $value . "</option>";
                                        }
                                    }
                                }
                            }
                            $watertable.='</select>
                            <input style="position:static" class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">
                            </form>';

                        }
                        else{
                            $watertable="<h4>no data</h4>";
                        }
                        
                        echo $watertable;      
                    }
                    //選出某縣市的意外事件
                    if(isset($_POST['accident_area'])){
                        if($accident_area=="全部"){
                            $sql="SELECT  事件ID,發生地點 FROM `意外事件` LEFT JOIN `地理區域` ON 意外事件.區域ID=地理區域.區域ID;";
                        }
                        else{
                            $sql = "SELECT  事件ID,發生地點 FROM `意外事件` LEFT JOIN `地理區域` ON 意外事件.區域ID=地理區域.區域ID WHERE 縣市名稱='$accident_area';";
                        }
                        $rows = $pdo->bindQuery($sql);
                        if($rows){
                            $watertable='<h6>選擇更改內容 :</h6>
                            <form method="post" action="">
                                <select name="accident_ID" class="form-control" style="width:250px ;">';
                            foreach($rows as $row){
                                foreach($row as $key => $value){
                                    if($key=="事件ID"){
                                        $watertable .= "<option value='$value'>編號_".$value;
                                    }
                                    elseif($key=='發生地點'){
                                        $watertable .= "_". $value . "</option>";
                                    }
                                }
                            }
                            $watertable.='</select>
                            <input style="position:static" class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">
                            </form>';
                        }
                        else{
                            $watertable="<h4>no data</h4>";
                        }
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