<?php
    include('functions.php');
    $array = array();
    if($resulset = getSQLResultSet("select * from users where is_admin = 0")){
        while ($row = $resulset->fetch_array(MYSQLI_NUM)) {
            $e = array();
            $e['id'] = $row[0];
            $e['nombre'] = $row[4];
            $e['apellido'] = $row[5];
            $e['email'] = $row[6];
            $e['celular'] = $row[8];
            $e['fecha_nacimiento'] = $row[9];
            array_push($array, $e);
        }
        print_r(json_encode($array));
    }

?>
