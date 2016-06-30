<?php
    $mysql = new mysqli('localhost', 'root', 'sim3150', 'lab11');
    $q = isset($_POST['query']) ? $mysql->real_escape_string($_POST['query']) : '';
    $qLen = strlen($q);

    $result = $mysql->query("select * from coas where code like '". $q ."%'");
    $rows = array();
    while($row = $result->fetch_array(MYSQL_ASSOC)) {
        $rows[] = array_map("utf8_encode", $row);
    }

    echo json_encode($rows);
    $result->close();
    $mysql->close();
?>