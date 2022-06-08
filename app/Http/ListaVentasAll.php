<?php
    include('functions.php');
    $array = array();
    if($resulset = getSQLResultSet("SELECT vt.id, vt.fecha_venta, vt.vendedor_id, u.nombre, vt.nombre_cliente FROM ventas vt INNER JOIN users u ON vt.vendedor_id = u.id ")){
        while ($row = $resulset->fetch_array(MYSQLI_NUM)) {
            $e = array();
            $e['id'] = $row[0];
            $e['fecha_venta'] = $row[1];
            $e['vendedor_id'] = $row[2];
            $e['nombre_vendedor'] = $row[3];
            $e['nombre_cliente'] = $row[4];
            array_push($array, $e);
        }
        print_r(json_encode($array));
    }

?>
