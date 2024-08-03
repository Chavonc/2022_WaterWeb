<?php
require('pdo.php');
$pdo = new mypdo();
$table = "";

if (isset($_POST['keywords'])) {
    $keywords = $_POST['keywords'];
    $Csql = "SELECT  `海岸分析`.`名稱`,`地理區域`.`縣市名稱`,`地區`.`地區` FROM (`海岸分析` INNER JOIN `水域景點` ON `水域景點`.`水域ID`= `海岸分析`.`水域ID` AND `海岸分析`.`名稱` LIKE '%$keywords%' INNER JOIN `地理區域` ON `水域景點`.`區域ID`= `地理區域`.`區域ID` ) INNER JOIN `地區` ON `地理區域`.`地區`=`地區`.ID;";
    $Rsql = "SELECT `溪河分析`.`名稱`,`地理區域`.`縣市名稱`,`地區`.`地區` FROM (`溪河分析` INNER JOIN `水域景點` ON `水域景點`.`水域ID`= `溪河分析`.`水域ID` AND `溪河分析`.`名稱` LIKE '%$keywords%' INNER JOIN `地理區域` ON `水域景點`.`區域ID`= `地理區域`.`區域ID` ) INNER JOIN `地區` ON `地理區域`.`地區`=`地區`.ID;";
    $Fsql = "SELECT `漁港分析`.`名稱`,`地理區域`.`縣市名稱`,`地區`.`地區` FROM (`漁港分析` INNER JOIN `水域景點` ON `水域景點`.`水域ID`= `漁港分析`.`水域ID` AND `漁港分析`.`名稱` LIKE '%$keywords%' INNER JOIN `地理區域` ON `水域景點`.`區域ID`= `地理區域`.`區域ID` ) INNER JOIN `地區` ON `地理區域`.`地區`=`地區`.ID;";
    $Esql = "SELECT `水庫及湖分析`.`名稱`,`地理區域`.`縣市名稱`,`地區`.`地區` FROM (`水庫及湖分析` INNER JOIN `水域景點` ON `水域景點`.`水域ID`= `水庫及湖分析`.`水域ID` AND `水庫及湖分析`.`名稱` LIKE '%$keywords%' INNER JOIN `地理區域` ON `水域景點`.`區域ID`= `地理區域`.`區域ID` ) INNER JOIN `地區` ON `地理區域`.`地區`=`地區`.ID;";
    if ($rows = $pdo->bindQuery($Csql)) {
        $type = "海岸";
        foreach ($rows as $row) {
            $table .= "<li>";
            $city = $row["縣市名稱"];
            $name = $row["名稱"];
            $area = $row["地區"];
            $table .= "<a href=location.php?area=" . $city . "&type=" . $type . "&location=" . $name . ">" . $area . " " . $city . " " . $name . "</a>";
            $table .= "<li>";
        }
    }
    if ($rows = $pdo->bindQuery($Rsql)) {
        $type = "溪河";
        foreach ($rows as $row) {
            $table .= "<li>";
            $city = $row["縣市名稱"];
            $name = $row["名稱"];
            $area = $row["地區"];
            $table .= "<a href=location.php?area=" . $city . "&type=" . $type . "&location=" . $name . ">" . $area . " " . $city . " " . $name . "</a>";
            $table .= "<li>";
            $table .= "<li>";
        }
    }
    if ($rows = $pdo->bindQuery($Fsql)) {
        $type = "漁港";
        foreach ($rows as $row) {
            $table .= "<li>";
            $city = $row["縣市名稱"];
            $name = $row["名稱"];
            $area = $row["地區"];
            $table .= "<a href=location.php?area=" . $city . "&type=" . $type . "&location=" . $name . ">" . $area . " " . $city . " " . $name . "</a>";
            $table .= "<li>";
            $table .= "<li>";
        }
    }
    if ($rows = $pdo->bindQuery($Esql)) {
        $type = "水庫及湖";
        foreach ($rows as $row) {
            $table .= "<li>";
            $city = $row["縣市名稱"];
            $name = $row["名稱"];
            $area = $row["地區"];
            $table .= "<a href=location.php?area=" . $city . "&type=" . $type . "&location=" . $name . ">" . $area . " " . $city . " " . $name . "</a>";
            $table .= "<li>";
            $table .= "<li>";
        }
    }
}
echo $table;
