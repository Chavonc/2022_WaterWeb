<?php
    require("pdo.php");
    $pdo = new mypdo();
    $tabletype = isset($_GET['tabletype'])? htmlspecialchars($_GET['tabletype']):'';
    $area = isset($_POST['area'])? htmlspecialchars($_POST['area']):'';
    $accident_area = isset($_POST['accident_area'])? htmlspecialchars($_POST['accident_area']):'';
    $accident_happen_water = isset($_POST['accident_happen_water'])? htmlspecialchars($_POST['accident_happen_water']):'';
    
    $table="";
    
    //新增縣市表格呈現
    if(isset($_GET['tabletype'])&&($tabletype=="地理區域")){
        $table.="<h7>新增縣市資訊:</h7>";
        $value="";
        $table.='<form method="POST" action="">
        <div class="input-group mb-3" style="width:300px">
        <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">新增縣市</span>
        </div>

        <input type="text" value="'.$value.'" name="add_name" maxlength="4" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3" style="width:300px" >
        <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">選擇地區</label>
        </div>
        <select name="addArea" class="custom-select" id="inputGroupSelect01">';
        $area_all_area='SELECT DISTINCT 地區 FROM `地理區域`;';
        $all_area=$pdo->bindQuery($area_all_area);
        foreach($all_area as $row){
        foreach($row as $key => $area_value){
            if($value==$area_value){
                $table .= "<option selected value='$area_value'>". $area_value . "</option>";
            }
            else{
                $table .= "<option value='$area_value'>". $area_value . "</option>";
            }
        }
        }
        $table.='</select></div>
        ';
        $table.='<input style="position:static " class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">';
        $table.='</form>';
    }

    //水庫及湖表格呈現
    if(isset($_GET['tabletype'])&&($tabletype=="水庫及湖分析")){

        $table.="<h7>新增水域資訊:</h7>";
        $value="";
           
        $table.='<form method="POST" action="">
        <div class="input-group mb-3" style="width:300px">
        <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">水域名稱</span>
        </div>
        <input type="text" value="'.$value.'" name="info_add_name" maxlength="10" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3" style="width:300px" >
        <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">水域所屬縣市</label>
        </div>
        <select name="info_add_city"class="custom-select" id="inputGroupSelect01">';
            $lake_sql="SELECT DISTINCT 縣市名稱 FROM `地理區域` ";
            $lake=$pdo->bindQuery($lake_sql);
            foreach($lake as $row){
                foreach($row as $key => $valuerows){
                    if($value==$valuerows){
                        $table .= "<option selected value='$value'>". $value . "</option>";
                    }
                    else{
                        $table .= "<option value='$valuerows'>". $valuerows . "</option>";
                    }      
                }
            }
            $table.='</select></div>

        <div class="input-group mb-3" style="width:600px">
        <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">水域面積(int)</span>
        </div>
        <input type="text" value="'.intval((float)$value).'" name="info_add_space_int" maxlength="7" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
        <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">水域面積(float)</span>
        </div>
        <input type="text" value="'. mb_substr($value,-3).'" name="info_add_space_float" maxlength="3" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3" style="width:300px" >
        <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">水庫及湖類型</label>
        </div>
        <select name="info_add_type"class="custom-select" id="inputGroupSelect01">';
            $lake_sql="SELECT DISTINCT 湖泊類型  FROM `水庫及湖分析` ";
            $lake=$pdo->bindQuery($lake_sql);
            foreach($lake as $row){
                foreach($row as $key => $valuerows){
                    if($value==$valuerows){
                        $table .= "<option selected value='$value'>". $value . "</option>";
                    }
                    else{
                        $table .= "<option value='$valuerows'>". $valuerows . "</option>";
                    }      
                }
            }
            $table.='</select></div>
        
        <div class="input-group mb-3" style="width:300px" >
        <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">水庫及湖型態</label>            
        </div>
        <select name="info_add_status"class="custom-select" id="inputGroupSelect01">
        <option selected value="其他">其他</option>';
            $lake_sql="SELECT DISTINCT 型態  FROM `水庫及湖分析` ";
            $lake=$pdo->bindQuery($lake_sql);
            foreach($lake as $row){
                foreach($row as $key =>$valuerows){
                    if($value==$valuerows){
                        $table .= "<option selected value='$value'>". $value . "</option>";
                    }
                    else{
                        $table .= "<option value='$valuerows'>". $valuerows . "</option>";
                    }
                }
            }
        $table.='</select></div>
        
        <div class="input-group mb-3" style="width:300px" >
        <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">用途</span>
        </div>
        <input type="text" value="'.$value.'" name="info_add_use" maxlength="5" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
        </div>
        
        <div class="input-group mb-3" style="width:300px" >
        <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">海拔(公尺)</span>
        </div>
        <input type="text" value="'.$value.'" name="info_add_sea" maxlength="5" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
        </div>
        
        <div class="input-group mb-3" style="width:300px">
        <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">水源</span>
        </div>
        <input type="text" value="'.$value.'" name="info_add_orignal" maxlength="5" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3" style="width:˙700px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">水域活動限制</span>
            </div>
            <input type="text" value="'.$value.'" name="info_safe_act" maxlength="30" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3" style="width:˙700px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">看守人員</span>
            </div>
            <input type="text" value="'.$value.'" name="info_safe_people" maxlength="30" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div> 
            
            <div class="input-group mb-3" style="width:˙700px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">是否為危險水域</span>
            </div>
            <input type="text" value="'.$value.'" name="info_safe_danger" maxlength="150" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>';
            $table.='<input style="position:static " class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">';
            $table.='</form>';
    }

    //海岸表格呈現
    if(isset($_GET['tabletype'])&&($tabletype=="海岸分析")){
            
        $table.="<h7>新增水域資訊:</h7>";
        $value="";

            $table.='<form method="POST" action="">
            <div class="input-group mb-3" style="width:300px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">海岸名稱</span>
            </div>
            <input type="text" value="'.$value.'" name="info_add_name" maxlength="10" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>
            
            <div class="input-group mb-3" style="width:300px" >
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">海岸所屬縣市</label>
            </div>
            <select name="info_add_city"class="custom-select" id="inputGroupSelect01">';
            $lake_sql="SELECT DISTINCT 縣市名稱 FROM `地理區域` ";
            $lake=$pdo->bindQuery($lake_sql);
            foreach($lake as $row){
                foreach($row as $key => $valuerows){
                    if($value==$valuerows){
                        $table .= "<option selected value='$value'>". $value . "</option>";
                    }
                    else{
                        $table .= "<option value='$valuerows'>". $valuerows . "</option>";
                    }      
                }
            }
            $table.='</select></div>

            <div class="input-group mb-3" style="width:300px" >
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">海岸類型</label>
            </div>
            <select name="info_add_type"class="custom-select" id="inputGroupSelect01">';
                $lake_sql="SELECT DISTINCT 海岸類型  FROM `海岸分析` ";
                $lake=$pdo->bindQuery($lake_sql);
                foreach($lake as $row){
                    foreach($row as $key => $valuerows){
                        if($value==$valuerows){
                            $table .= "<option selected value='$value'>". $value . "</option>";
                        }
                        else{
                            $table .= "<option value='$valuerows'>". $valuerows . "</option>";
                        }       
                    }
                }
                $table.='</select></div>
            
            <div class="input-group mb-3" style="width:300px" >
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">海岸型態</label>
            </div>
            <select name="info_add_status"class="custom-select" id="inputGroupSelect01">
            <option selected value="其他">其他</option>';
            $lake_sql="SELECT DISTINCT 型態  FROM `海岸分析` ";
            $lake=$pdo->bindQuery($lake_sql);
                foreach($lake as $row){
                    foreach($row as $key =>$valuerows){
                        if($value==$valuerows){
                            $table .= "<option selected value='$value'>". $value . "</option>";
                        }
                    else{
                        $table .= "<option value='$valuerows'>". $valuerows . "</option>";
                    }
                }
            }
            $table.='</select></div>
            
            <div class="input-group mb-3" style="width:300px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">海岸特色</span>
            </div>
            <input type="text" value="'.$value.'" name="info_add_use" maxlength="20" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>
            
            <div class="input-group mb-3" style="width:300px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">開放時間</span>
            </div>
            <input type="text" value="'.$value.'" name="info_add_time" maxlength="20" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3" style="width:˙700px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">水域活動限制</span>
            </div>
            <input type="text" value="'.$value.'" name="info_safe_act" maxlength="30" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3" style="width:˙700px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">看守人員</span>
            </div>
            <input type="text" value="'.$value.'" name="info_safe_people" maxlength="30" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div> 
            
            <div class="input-group mb-3" style="width:˙700px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">是否為危險水域</span>
            </div>
            <input type="text" value="'.$value.'" name="info_safe_danger" maxlength="150" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>
            ';
            $table.='<input style="position:static " class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">';
            $table.='</form>';
    }

    //溪河表格呈現
    if(isset($_GET['tabletype'])&&($tabletype=="溪河分析")){

        $table.="<h7>新增水域資訊:</h7>";
        $value="";

            $table.='<form method="POST" action="">
            <div class="input-group mb-3" style="width:300px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">溪河名稱</span>
            </div>
            <input type="text" value="'.$value.'" name="info_add_name" maxlength="5" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div> 
            
            <div class="input-group mb-3" style="width:300px" >
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">溪河所屬縣市</label>
            </div>
            <select name="info_add_city"class="custom-select" id="inputGroupSelect01">';
            $lake_sql="SELECT DISTINCT 縣市名稱 FROM `地理區域` ";
            $lake=$pdo->bindQuery($lake_sql);
            foreach($lake as $row){
                foreach($row as $key => $valuerows){
                    if($value==$valuerows){
                        $table .= "<option selected value='$value'>". $value . "</option>";
                    }
                    else{
                        $table .= "<option value='$valuerows'>". $valuerows . "</option>";
                    }      
                }
            }
            $table.='</select></div>

            <div class="input-group mb-3" style="width:600px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">河流長度(int)</span>
            </div>
            <input type="text" value="'.intval((float)$value).'" name="info_add_long_int" maxlength="4" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">河流長度(float)</span>
            </div>
            <input type="text" value="'.mb_substr($value,-2).'" name="info_add_long_float" maxlength="2" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3" style="width:600px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">流域面積(int)</span>
            </div>
            <input type="text" value="'.intval((float)$value).'" name="info_add_space_int" maxlength="4" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">流域面積(float)</span>
            </div>
            <input type="text" value="'. mb_substr($value,-2).'" name="info_add_space_float" maxlength="2" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3" style="width:300px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">發源地</span>
            </div>
            <input type="text" value="'.$value.'" name="info_add_original" maxlength="20" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3" style="width:300px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">流向</span>
            </div>
            <input type="text" value="'.$value.'" name="info_add_direction" maxlength="20" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>   
            
            <div class="input-group mb-3" style="width:˙700px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">水域活動限制</span>
            </div>
            <input type="text" value="'.$value.'" name="info_safe_act" maxlength="30" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3" style="width:˙700px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">看守人員</span>
            </div>
            <input type="text" value="'.$value.'" name="info_safe_people" maxlength="30" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div> 
            
            <div class="input-group mb-3" style="width:˙700px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">是否為危險水域</span>
            </div>
            <input type="text" value="'.$value.'" name="info_safe_danger" maxlength="150" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>
            ';
            $table.='<input style="position:static " class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">';
            $table.='</form>';
    }

    //漁港表格呈現
    if(isset($_GET['tabletype'])&&($tabletype=="漁港分析")){

        $table.="<h7>新增水域資訊:</h7>";
        $value="";

            $table.='<form method="POST" action="">
            <div class="input-group mb-3" style="width:300px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">漁港名稱</span>
            </div>
            <input type="text" value="'.$value.'" name="info_add_name" maxlength="20" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3" style="width:300px" >
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">漁港所屬縣市</label>
            </div>
            <select name="info_add_city" class="custom-select" id="inputGroupSelect01">';
            $lake_sql="SELECT DISTINCT 縣市名稱 FROM `地理區域` ";
            $lake=$pdo->bindQuery($lake_sql);
            foreach($lake as $row){
                foreach($row as $key => $valuerows){
                    if($value==$valuerows){
                        $table .= "<option selected value='$value'>". $value . "</option>";
                    }
                    else{
                        $table .= "<option value='$valuerows'>". $valuerows . "</option>";
                    }      
                }
            }
            $table.='</select></div>

            <div class="input-group mb-3" style="width:300px" >
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">漁港類型</label>
            </div>
            <select name="info_add_status"class="custom-select" id="inputGroupSelect01">
            <option selected value="其他">其他</option>';
                $lake_sql="SELECT DISTINCT 漁港類型  FROM `漁港分析` ";
                $lake=$pdo->bindQuery($lake_sql);
                foreach($lake as $row){
                    foreach($row as $key =>$valuerows){
                       if($value==$valuerows){
                            $table .= "<option selected value='$value'>". $value . "</option>";
                        }
                        else{
                            $table .= "<option value='$valuerows'>". $valuerows . "</option>";
                        }
                    }
                }
                $table.='</select></div>

            <div class="input-group mb-3" style="width:600px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">泊地面積(int)</span>
            </div>
            <input type="text" value="'.intval((float)$value).'" name="info_add_space_int" maxlength="7" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">泊地面積(float)</span>
            </div>
            <input type="text" value="'. mb_substr($value,-3).'" name="info_add_space_float" maxlength="3" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>  
            
            <div class="input-group mb-3" style="width:600px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">港域深度(int)</span>
            </div>
            <input type="text" value="'.intval((float)$value).'" name="info_add_long_int" maxlength="3" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">港域深度(float)</span>
            </div>
            <input type="text" value="'. mb_substr($value,-2).'" name="info_add_long_float" maxlength="2" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>  
        
            <div class="input-group mb-3" style="width:300px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">開放時間</span>
            </div>
            <input type="text" value="'.$value.'" name="info_add_time" maxlength="20" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3" style="width:˙700px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">水域活動限制</span>
            </div>
            <input type="text" value="'.$value.'" name="info_safe_act" maxlength="30" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3" style="width:˙700px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">看守人員</span>
            </div>
            <input type="text" value="'.$value.'" name="info_safe_people" maxlength="30" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div> 
            
            <div class="input-group mb-3" style="width:˙700px">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">是否為危險水域</span>
            </div>
            <input type="text" value="'.$value.'" name="info_safe_danger" maxlength="150" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
            </div>
            ';
        
        $table.='<input style="position:static " class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">';
        $table.='</form>';
    }

//新增意外事件表格呈現
if((isset($_GET['tabletype']))&&($tabletype=="意外事件")){
    $value="";
    $table.="<h7>新增意外事件資訊:</h7>";
    
    $table.='<form method="POST" action="">

    <div class="input-group mb-3" style="width:300px" >
    <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">事件發生水域類型</label>
    </div>
    <select name="accident_water_type" class="custom-select" id="inputGroupSelect01">
    <option selected value="水庫及湖分析">水庫、湖泊</option>
    <option selected value="海岸分析">海岸</option>
    <option selected value="溪河分析">溪河</option>
    <option selected value="漁港分析">漁港</option>
    </select></div>

    <div class="input-group mb-3" style="width:300px" >
    <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">事件發生縣市</label>
    </div>
    <select name="accident_city" class="custom-select" id="inputGroupSelect01">';
    $sql="SELECT `區域ID`,`縣市名稱` FROM `地理區域`;";
    $city=$pdo->bindQuery($sql);
    foreach($city as $row){
        foreach($row as $key => $status){
            if($key=="區域ID"){
                $city_id=$status;
            }
            elseif($value==$status){
                 $table .= "<option selected value='$city_id'>". $status . "</option>";
            }
            else{
                $table .= "<option value='$city_id'>". $status . "</option>";
            }
        }
    }
    $table.='</select></div>
    <input style="position:static" class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">
    </form>';
}
if((isset($_GET['tabletype']))&&($tabletype=="意外事件")&&(isset($_POST['accident_city']))&&(isset($_POST['accident_water_type']))){
    $accident_water_type = isset($_POST['accident_water_type'])? htmlspecialchars($_POST['accident_water_type']):'';
    $accident_city = isset($_POST['accident_city'])? htmlspecialchars($_POST['accident_city']):'';   
    
    $table = '<h7>新增意外事件資訊:</h7><form method="POST" action="">
    <div class="input-group mb-3" style="width:300px" >
    <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">事件發生水域</label>
    </div>
    <input type="hidden" name="accident_water_type" value="'.$accident_water_type.'">
    <input type="hidden" name="accident_city" value="'.$accident_city.'">
    <select name="accident_add_water" class="custom-select" id="inputGroupSelect01">';
    $sql="SELECT `名稱` FROM `$accident_water_type` LEFT JOIN `水域景點` ON `$accident_water_type`.`水域ID`=`水域景點`.`水域ID` 
    WHERE `區域ID`='$accident_city';";
    $water_name=$pdo->bindQuery($sql);
    foreach($water_name as $row){
        foreach($row as $key => $status){
            if($value==$status){
                $table .= "<option value='$status'>". $status . "</option>";
            }
            else{
                $table .= "<option value='$status'>". $status . "</option>";
            }
        }
    }
    $table.='</select></div>

    <div class="input-group mb-3" style="width:350px">
    <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">事件發生地點</span>
    </div>
    <input type="text" value="'.$value.'" name="accident_add_name" maxlength="20" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3" style="width:300px">
    <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">發生時間</span>
    </div>
    <input type="date" value="'.$value.'" name="accident_add_time"  class="form-control" aria-label="Add" aria-describedby="basic-addon1"></div>
    
    <div class="input-group mb-3" style="width:300px" >
    <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">事件類型</label>
    </div>
    <select name="accident_add_type" class="custom-select" id="inputGroupSelect01">';
    $sql="SELECT DISTINCT 事件類型 FROM `意外事件`;";
    $type=$pdo->bindQuery($sql);
        foreach($type as $row){
            foreach($row as $key => $status){
                if($value==$status){
                     $table .= "<option selected value='$status'>". $status . "</option>";
                }
                else{
                    $table .= "<option value='$status'>". $status . "</option>";
                }
            }
        }
        $table.='</select></div>


    <div class="input-group mb-3" style="width:300px" >
    <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">年齡層</label>
    </div>
    <select name="accident_add_age" class="custom-select" id="inputGroupSelect01">';
    $sql="SELECT DISTINCT 年齡層 FROM `意外事件`;";
    $type=$pdo->bindQuery($sql);
    foreach($type as $row){
        foreach($row as $key => $status){
            if($value==$status){
                $table .= "<option selected value='$status'>". $status ;
            }
            else{
                $table .= "<option value='$status'>". $status ;
            }
            if( $status=="少兒"){
                $table.="(0~17)</option>";
            }
            elseif( $status=="青年"){
                $table.="(18~40)</option>";
            }
            elseif( $status=="中年"){
                $table.="(41~64)</option>";
            }
            elseif( $status=="老人"){
                $table.="(65以上)</option>";
            }
            elseif($status=="不詳"){
                $table.="</option>";
            }
        }
    }
    $table.='</select></div>

    <div class="input-group mb-3" style="width:300px">
    <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">事件結果</span>
    </div>
    <input type="text" value="'.$value.'" name="accident_add_result" maxlength="2" class="form-control" placeholder="Add" aria-label="Add" aria-describedby="basic-addon1">
    </div>
    ';
    $table.='<input style="position:static " class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">';
    $table.='</form>';
}


//新增縣市
if((isset($_POST['add_name']))&&(isset($_POST['addArea']))){
    $add_name = isset($_POST['add_name'])? htmlspecialchars($_POST['add_name']):'';
    $add_area = isset($_POST['addArea'])? htmlspecialchars($_POST['addArea']):''; 

    $id_sql = "SELECT MAX(`區域ID`) FROM `地理區域`";
    $id_row=$pdo->bindQuery($id_sql);
    foreach($id_row as $row){
        foreach($row as $key => $add_id){
            $add_id=$add_id+1;
        }
    }
    $add_id = strval($add_id);
    
    $add_sql="INSERT INTO `地理區域` (`區域ID`,`縣市名稱`,`地區`)
                VALUES (LPAD($add_id,4,0),'$add_name', '$add_area')";
    $row_area=$pdo->bindQuery($add_sql); 
    $table="<h5>新增成功</h5>";
}
//新增水域
if((isset($_GET['tabletype'])) && ($tabletype!="地理區域") && ($tabletype!="意外事件")){
    //新增水庫及湖
    if(($tabletype=="水庫及湖分析")&&(isset($_POST['info_add_name']))){    
        $info_add_name= isset($_POST['info_add_name'])? htmlspecialchars($_POST['info_add_name']):'';
        $info_add_space_int= isset($_POST['info_add_space_int'])? htmlspecialchars($_POST['info_add_space_int']):'';
        $info_add_space_float= isset($_POST['info_add_space_float'])? htmlspecialchars($_POST['info_add_space_float']):'';
        $info_add_type= isset($_POST['info_add_type'])? htmlspecialchars($_POST['info_add_type']):'';
        $info_add_status= isset($_POST['info_add_status'])? htmlspecialchars($_POST['info_add_status']):'';
        $info_add_use= isset($_POST['info_add_use'])? htmlspecialchars($_POST['info_add_use']):'';
        $info_add_sea= isset($_POST['info_add_sea'])? htmlspecialchars($_POST['info_add_sea']):'';
        $info_add_orignal= isset($_POST['info_add_orignal'])? htmlspecialchars($_POST['info_add_orignal']):'';
        $total=$info_add_space_int.".".$info_add_space_float;
        $info_add_city= isset($_POST['info_add_city'])? htmlspecialchars($_POST['info_add_city']):'';

        //水域ID
        $id_sql = "SELECT MAX(`水域ID`) FROM `水庫及湖分析`";
        $id_row=$pdo->bindQuery($id_sql);
        foreach($id_row as $row){
            foreach($row as $key => $add_id){
                $add_id=$add_id;
            }
        }
        $add_id = substr($add_id,-4);
        $add_id = intval($add_id)+1;
        $add_id = str_pad($add_id,4,"0",STR_PAD_LEFT);
        $add_id = str_pad($add_id,5,"L",STR_PAD_LEFT);

        //水域ID+縣市加入水域景點表格
        $city_sql="SELECT `區域ID` FROM `地理區域` WHERE `縣市名稱`='$info_add_city'";
        $city_row=$pdo->bindQuery($city_sql);
        foreach($city_row as $row){
            foreach($row as $key => $city_id){
                $city_id=$city_id;
            }
        }
        $sql="INSERT INTO `水域景點` (`水域ID`,`區域ID`) VALUES('$add_id','$city_id');";
        $add_city=$pdo->bindQuery($sql);
        
        //水域資訊
        $sql="INSERT INTO `水庫及湖分析` (`水域ID`,`名稱`,`湖泊類型`,`水源`,`型態`,`用途`,`海拔(公尺)`,`面積(公頃)`)
        VALUES('$add_id','$info_add_name','$info_add_type','$info_add_orignal','$info_add_status','$info_add_use','$info_add_sea','$total')";
        $add_lake=$pdo->bindQuery($sql); 
        
        //水域安全性
        $info_safe_act= isset($_POST['info_safe_act'])? htmlspecialchars($_POST['info_safe_act']):'';
        $info_safe_people= isset($_POST['info_safe_people'])? htmlspecialchars($_POST['info_safe_people']):'';
        $info_safe_danger= isset($_POST['info_safe_danger'])? htmlspecialchars($_POST['info_safe_danger']):'';
        $sql_safe="INSERT INTO `安全性` (`水域ID`,`水域活動限制`,`看守人員`,`是否為危險水域`)
        VALUES('$add_id','$info_safe_danger','$info_safe_people','$info_safe_danger')";
        $add_lake=$pdo->bindQuery($sql_safe);
        $table="<h5>新增成功</h5>";
        
    }
    elseif(($tabletype=="海岸分析")&&(isset($_POST['info_add_name']))){
        $info_add_type= isset($_POST['info_add_type'])? htmlspecialchars($_POST['info_add_type']):'';
        $info_add_status= isset($_POST['info_add_status'])? htmlspecialchars($_POST['info_add_status']):'';
        $info_add_name= isset($_POST['info_add_name'])? htmlspecialchars($_POST['info_add_name']):'';
        $info_add_use= isset($_POST['info_add_use'])? htmlspecialchars($_POST['info_add_use']):'';
        $info_add_time= isset($_POST['info_add_time'])? htmlspecialchars($_POST['info_add_time']):'';
        $info_add_city= isset($_POST['info_add_city'])? htmlspecialchars($_POST['info_add_city']):'';
        
        //水域ID
        $id_sql = "SELECT MAX(`水域ID`) FROM `海岸分析`";
        $id_row=$pdo->bindQuery($id_sql);
        foreach($id_row as $row){
            foreach($row as $key => $add_id){
                $add_id=$add_id;
            }
        }
        $add_id = substr($add_id,-4);
        $add_id = intval($add_id)+1;
        $add_id = str_pad($add_id,4,"0",STR_PAD_LEFT);
        $add_id = str_pad($add_id,5,"C",STR_PAD_LEFT);

        //水域ID+縣市加入水域景點表格
        $city_sql="SELECT `區域ID` FROM `地理區域` WHERE `縣市名稱`='$info_add_city'";
        $city_row=$pdo->bindQuery($city_sql);
        foreach($city_row as $row){
            foreach($row as $key => $city_id){
                $city_id=$city_id;
            }
        }
        $sql="INSERT INTO `水域景點` (`水域ID`,`區域ID`) VALUES('$add_id','$city_id');";
        $add_city=$pdo->bindQuery($sql);

        //水域資訊
        $sql="INSERT INTO `海岸分析` (`水域ID`,`名稱`,`海岸類型`,`型態`,`特色`,`開放時間`)
        VALUES('$add_id','$info_add_name','$info_add_type','$info_add_status','$info_add_use','$info_add_time')";
        $add_coastal=$pdo->bindQuery($sql); 

        //安全性
        $info_safe_act= isset($_POST['info_safe_act'])? htmlspecialchars($_POST['info_safe_act']):'';
        $info_safe_people= isset($_POST['info_safe_people'])? htmlspecialchars($_POST['info_safe_people']):'';
        $info_safe_danger= isset($_POST['info_safe_danger'])? htmlspecialchars($_POST['info_safe_danger']):'';
        $sql_safe="INSERT INTO `安全性` (`水域ID`,`水域活動限制`,`看守人員`,`是否為危險水域`)
        VALUES('$add_id','$info_safe_act','$info_safe_people','$info_safe_danger')";
        $add_coastal=$pdo->bindQuery($sql_safe);
        $table="<h5>新增成功</h5>";
    }
    elseif(($tabletype=="漁港分析")&&(isset($_POST['info_add_name']))){
        $info_add_name= isset($_POST['info_add_name'])? htmlspecialchars($_POST['info_add_name']):'';
        $info_add_status= isset($_POST['info_add_status'])? htmlspecialchars($_POST['info_add_status']):'';
        $info_add_space_int= isset($_POST['info_add_space_int'])? htmlspecialchars($_POST['info_add_space_int']):'';
        $info_add_space_float= isset($_POST['info_add_space_float'])? htmlspecialchars($_POST['info_add_space_float']):'';
        $info_add_long_int= isset($_POST['info_add_long_int'])? htmlspecialchars($_POST['info_add_long_int']):'';
        $info_add_long_float= isset($_POST['info_add_long_float'])? htmlspecialchars($_POST['info_add_long_float']):'';
        $info_add_time= isset($_POST['info_add_time'])? htmlspecialchars($_POST['info_add_time']):'';
        $total_space=$info_add_space_int.".".$info_add_space_float;
        $total_long=$info_add_long_int.".".$info_add_long_float;
        $info_add_city= isset($_POST['info_add_city'])? htmlspecialchars($_POST['info_add_city']):'';

        //水域ID
        $id_sql = "SELECT MAX(`水域ID`) FROM `漁港分析`";
        $id_row=$pdo->bindQuery($id_sql);
        foreach($id_row as $row){
            foreach($row as $key => $add_id){
                $add_id=$add_id;
            }
        }
        $add_id = substr($add_id,-4);
        $add_id = intval($add_id)+1;
        $add_id = str_pad($add_id,4,"0",STR_PAD_LEFT);
        $add_id = str_pad($add_id,5,"F",STR_PAD_LEFT);

        //水域ID+縣市加入水域景點表格
        $city_sql="SELECT `區域ID` FROM `地理區域` WHERE `縣市名稱`='$info_add_city'";
        $city_row=$pdo->bindQuery($city_sql);
        foreach($city_row as $row){
            foreach($row as $key => $city_id){
                $city_id=$city_id;
            }
        }
        $sql="INSERT INTO `水域景點` (`水域ID`,`區域ID`) VALUES('$add_id','$city_id');";
        $add_city=$pdo->bindQuery($sql);

        //水域資訊
        $sql="INSERT INTO `漁港分析`(`水域ID`,`名稱`,`漁港類型`,`泊地面積(公頃)`,`港域深度(公尺)`,`開放時間`)
        VALUES('$add_id','$info_add_name','$info_add_status','$total_space','$total_long','$info_add_time')";
        $add_fishingPort=$pdo->bindQuery($sql);

        //安全性
        $info_safe_act= isset($_POST['info_safe_act'])? htmlspecialchars($_POST['info_safe_act']):'';
        $info_safe_people= isset($_POST['info_safe_people'])? htmlspecialchars($_POST['info_safe_people']):'';
        $info_safe_danger= isset($_POST['info_safe_danger'])? htmlspecialchars($_POST['info_safe_danger']):'';
        $sql_safe="INSERT INTO `安全性` (`水域ID`,`水域活動限制`,`看守人員`,`是否為危險水域`)
        VALUES('$add_id','$info_safe_danger','$info_safe_people','$info_safe_danger')";
        $add_fishingPort=$pdo->bindQuery($sql_safe);
        $table="<h5>新增成功</h5>";
    }
    elseif(($tabletype=="溪河分析")&&(isset($_POST['info_add_name']))){
        $info_add_name= isset($_POST['info_add_name'])? htmlspecialchars($_POST['info_add_name']):'';
        $original= isset($_POST['original'])? htmlspecialchars($_POST['original']):'';
        $info_add_space_int= isset($_POST['info_add_space_int'])? htmlspecialchars($_POST['info_add_space_int']):'';
        $info_add_space_float= isset($_POST['info_add_space_float'])? htmlspecialchars($_POST['info_add_space_float']):'';
        $info_add_long_int= isset($_POST['info_add_long_int'])? htmlspecialchars($_POST['info_add_long_int']):'';
        $info_add_long_float= isset($_POST['info_add_long_float'])? htmlspecialchars($_POST['info_add_long_float']):'';
        $info_add_original=isset($_POST['info_add_original'])? htmlspecialchars($_POST['info_add_original']):'';
        $info_add_direction=isset($_POST['info_add_direction'])? htmlspecialchars($_POST['info_add_direction']):'';
        $total_space=$info_add_space_int.".".$info_add_space_float;
        $total_long=$info_add_long_int.".".$info_add_long_float;
        $info_add_city= isset($_POST['info_add_city'])? htmlspecialchars($_POST['info_add_city']):'';

        //水域ID
        $id_sql = "SELECT MAX(`水域ID`) FROM `溪河分析`";
        $id_row=$pdo->bindQuery($id_sql);
        foreach($id_row as $row){
            foreach($row as $key => $add_id){
                $add_id=$add_id;
            }
        }
        $add_id = substr($add_id,-4);
        $add_id = intval($add_id)+1;
        $add_id = str_pad($add_id,4,"0",STR_PAD_LEFT);
        $add_id = str_pad($add_id,5,"R",STR_PAD_LEFT);

        //水域ID+縣市加入水域景點表格
        $city_sql="SELECT `區域ID` FROM `地理區域` WHERE `縣市名稱`='$info_add_city'";
        $city_row=$pdo->bindQuery($city_sql);
        foreach($city_row as $row){
            foreach($row as $key => $city_id){
                $city_id=$city_id;
            }
        }
        $sql="INSERT INTO `水域景點` (`水域ID`,`區域ID`) VALUES('$add_id','$city_id');";
        $add_city=$pdo->bindQuery($sql);

        //水域資訊
        $sql="INSERT INTO `溪河分析`(`水域ID`,`名稱`,`河流長度(公里)`,`流域面積(平方公里)`,`發源地`,`流向`) 
        VALUES('$add_id','$info_add_name','$total_long','$total_space','$info_add_original','$info_add_direction')";
        $add_river=$pdo->bindQuery($sql);
        
        //安全性
        $info_safe_act= isset($_POST['info_safe_act'])? htmlspecialchars($_POST['info_safe_act']):'';
        $info_safe_people= isset($_POST['info_safe_people'])? htmlspecialchars($_POST['info_safe_people']):'';
        $info_safe_danger= isset($_POST['info_safe_danger'])? htmlspecialchars($_POST['info_safe_danger']):'';
        $sql_safe="INSERT INTO `安全性` (`水域ID`,`水域活動限制`,`看守人員`,`是否為危險水域`)
        VALUES('$add_id','$info_safe_danger','$info_safe_people','$info_safe_danger')";
        $add_river=$pdo->bindQuery($sql_safe);
        $table="<h5>新增成功</h5>";

    }
}

//新增意外事件
if((isset($_GET['tabletype']))&&(isset($_POST['accident_city']))&&(isset($_POST['accident_water_type']))){
    
    $accident_water_type = isset($_POST['accident_water_type'])? htmlspecialchars($_POST['accident_water_type']):'';
    $accident_city = isset($_POST['accident_city'])? htmlspecialchars($_POST['accident_city']):'';

}
if((isset($_GET['tabletype']))&&(isset($_POST['accident_add_water']))){
    
    $accident_add_water = isset($_POST['accident_add_water'])? htmlspecialchars($_POST['accident_add_water']):'';
    $accident_add_name = isset($_POST['accident_add_name'])? htmlspecialchars($_POST['accident_add_name']):'';
    $accident_add_time = isset($_POST['accident_add_time'])? htmlspecialchars($_POST['accident_add_time']):'';
    $accident_add_type = isset($_POST['accident_add_type'])? htmlspecialchars($_POST['accident_add_type']):'';
    $accident_add_age = isset($_POST['accident_add_age'])? htmlspecialchars($_POST['accident_add_age']):'';
    $accident_add_result = isset($_POST['accident_add_result'])? htmlspecialchars($_POST['accident_add_result']):'';
    $accident_water_type = isset($_POST['accident_water_type'])? htmlspecialchars($_POST['accident_water_type']):'';
    $accident_city = isset($_POST['accident_city'])? htmlspecialchars($_POST['accident_city']):'';
   
    //事件ID
    $id_sql = "SELECT MAX(`事件ID`) FROM `意外事件`";
    $id_rows=$pdo->bindQuery($id_sql);
    foreach($id_rows as $row){
        foreach($row as $key => $add_id){
            $add_id=$add_id+1;
        }
    }
    $add_id = strval($add_id);//LPAD($add_id,4,0)
    
    //水域ID
    $water_sql = "SELECT `水域ID` FROM `$accident_water_type` WHERE `名稱`='$accident_add_water';";
    $water_rows=$pdo->bindQuery($water_sql);
    foreach($water_rows as $row){
        foreach($row as $key => $accident_water_id){
            $accident_water_id=$accident_water_id;
        }
    }

    //意外事件
    $accident="INSERT INTO `意外事件`(`事件ID`,`水域ID`,`區域ID`,`發生地點`,`事件發生時間`,`事件類型`,`年齡層`,`事件結果`) 
    VALUES(LPAD($add_id,4,0),'$accident_water_id','$accident_city','$accident_add_name','$accident_add_time','$accident_add_type','$accident_add_age','$accident_add_result')";
    $row_accident=$pdo->bindQuery($accident); 
    
    $table ="<h5>新增成功</h5>";
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
                        if(isset($_GET['tabletype'])){
                            if(isset($_POST['water_area'])){
                                echo 'Add__'.$tabletype.'__'.$water_area;
                            }
                            elseif(isset($_POST['accident_area'])){
                                echo 'Add__'.$tabletype.'__'.$accident_area;
                            }
                            elseif(isset($_POST['accident_happen_water'])){
                                echo 'Add__'.$tabletype.'__'.$accident_happen_water;
                            }
                            else{
                                echo 'Add__'.$tabletype;
                            }
                        }
                        else{
                            echo "Add";
                        }
                    ?>
                </h5>
        <h6>選擇新增表格 :</h6>
            <form method="get" action="">
                <select name="tabletype" class="form-control" style="width:250px ;">
                    <option value="地理區域">縣市</option>
                    <option value="水庫及湖分析">水庫、湖泊</option>
                    <option value="溪河分析">溪河</option>
                    <option value="海岸分析">海岸</option>
                    <option value="漁港分析">漁港</option>
                    <option value="意外事件">意外事件</option>    
                </select>
                <input style="position:static" class="btn btn-outline-secondary btn-sm" type="submit" value="Submit">
            </form>
                <?php
                     echo $table;
                ?>
            </div>
        </div>
    </body>
</html>