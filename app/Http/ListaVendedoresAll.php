<?php
    include('functions.php');
    $array = array();
    if($resulset = getSQLResultSet("select * from users where is_admin = 0")){
        while ($row = $resulset->fetch_array(MYSQLI_NUM)) {
            $e = array();
            $e['id'] = $row[0];
            $e['nombre'] = $row[1];
            $e['apellido'] = $row[2];
            $e['email'] = $row[3];
            $e['celular'] = $row[4];
            $e['fecha_nacimiento'] = $row[5];
            array_push($array, $e);
        }
        print_r(json_encode($array));
    }

?>
