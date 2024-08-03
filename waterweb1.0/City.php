<?php
     require("pdo.php");
     $pdo = new mypdo();
     $table = "";
     $table.= "<table>";
     $news=$_GET["news"];
     
     $sql="SELECT `縣市名稱` FROM `地理區域` WHERE `地區`='".$news."'";
     $rows = $pdo->bindQuery($sql);
     foreach($rows as $row){
        $table .= "<ul>";
            foreach($row as $key => $value){
                if($key=="縣市名稱")
                {   
                    $table .= "<li>"."<a href='water.php?area=".$value."' >".$value."</a> "."</li>";
                }
            }
            $table .= "</ul>";
     }
     $table.="</table>";
     $taiwan="<img src='./taiwan/Taiwan_".$news.".png' id='North'></img>";

?>

<!DOCTYPE html>
<html>
     <head>
          <title>Taiwan</title>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable = no">
          <link rel="stylesheet" href="Home.css">
          <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
          <link rel="stylesheet" href="search.css">
     </head>
     <body onload="init();">
          <nav class="navbar navbar-light" style="background-color: #97CBFF;height: 60px">
               <a href="login.html"><button type="button" class="btn btn-outline-light">LOGIN</button></a>
               <form class="form-inline" style="position: absolute;right: 3%;">
                    <span class="icon"><i class="fa fa-search"></i></span>
                    <input class="form-control mr-sm-2"  type="search" placeholder="請輸入水域名稱" aria-label="Search" name="search-text" id="search-text"/>
               </form> 
               <div class="search">
                    <ul id="search-result"></ul>
               </div>
               <script src="search.js"></script>     
          </nav>
          <a href="City.php?news=北部">
          <button id="North" type="button" 
          style="position:fixed;top:150px;left: 280px;font-size:17px;font-weight:bold;font-family:DFKai-sb;color:white;
          width:70px;height: 40px;background-color:rgb(102, 182, 213);border: 8px solid rgb(102, 182, 213);border-radius: 10px;">北部</button>
          </a>
          <br><br><br>
          <a href="City.php?news=中部">
          <button id="Center" type="button" 
          style="position:fixed;top:200px;left: 280px;font-size:17px;font-weight:bold;font-family:DFKai-sb;color:white;
          width:70px;height: 40px;background-color:rgb(102, 182, 213);border: 8px solid rgb(102, 182, 213);border-radius: 10px;">中部</button>
          </a>
          <br><br><br>
          <a href="City.php?news=南部">
          <button id="South" type="button" 
          style="position:fixed;top:250px;left: 280px;font-size:17px;font-weight:bold;font-family:DFKai-sb;color:white;
          width:70px;height: 40px;background-color:rgb(102, 182, 213);border: 8px solid rgb(102, 182, 213);border-radius: 10px;">南部</button>
          </a>
          <br><br><br>
          <a href="City.php?news=東部">
          <button id="East" type="button" 
          style="position:fixed;top:300px;left: 280px;font-size:17px;font-weight:bold;font-family:DFKai-sb;color:white;
          width:70px;height: 40px;background-color:rgb(102, 182, 213);border: 8px solid rgb(102, 182, 213);border-radius: 10px;">東部</button>
          </a>
          <div id="Taiwan">
            <?php echo $taiwan ?>
          </div>
          <div id="city">
               <?php echo $table ?>
          </div>
     </body>
</html>
