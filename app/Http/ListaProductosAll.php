<?php 
    include('functions.php');
    $array = array();
    if($resulset = getSQLResultSet("select * from productos")){
        while ($row = $resulset->fetch_array(MYSQLI_NUM)) {
            $e = array();
            $e['id'] = $row[0];
            $e['imagen'] = $row[1];
            $e['nombre'] = $row[2];
            $e['tipo'] = $row[3];
            $e['precio'] = $row[4];
            $e['cantidad_disponible'] = $row[5];
            array_push($array, $e);
        }
        echo json_encode($array);
    }

?>