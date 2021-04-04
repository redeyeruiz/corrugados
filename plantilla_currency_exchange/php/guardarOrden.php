<?php
    $queries = $_POST["queries"];
    $conn=conecta_servidor();
    for($i=0;$i<count($queries);$i++){
        $query=queries[$i];
        $sql=mysqli_query($conn,$query);


    };

    $queries= [];

?>