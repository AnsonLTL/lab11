<?php
    $mysql = new mysqli('localhost', 'root', 'sim3150', 'lab11');
    $result = $mysql->query("select * from coas");
    $rows = array();
    while($row = $result->fetch_array(MYSQL_ASSOC)) {
        $rows[] = array_map("utf8_encode", $row);
    }

    echo json_encode($rows);
    $result->close();
    $mysql->close();
?>