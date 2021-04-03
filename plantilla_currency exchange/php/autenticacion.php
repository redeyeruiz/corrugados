<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Autenticando...</title>
    </head>
    <body>
        <p>Hola</p>
        <?php
        session_start();
        $DATABASE_HOST = 'localhos';
        $DATABASE_USER = 'root';
        $DATABASE_PASSWORD = '';
        $DATABASE_NAME = 'PapelesCorrugados';

        echo "<p>hola</p>";

        $conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASSWORD, $DATABASE_NAME);

        if(mysqli_connect_errno()){
            echo "<script type='text/javascript'>";
            echo "alert('Error al conectarse a la base de datos.\nInténtelo nuevamente más tarde.')";
            echo "</script>";

            exit("Hubo un error");
        }

        if($statement = $con->prepare())

        ?>
    </body>
</html>