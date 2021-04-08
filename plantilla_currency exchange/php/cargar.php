<?php
include_once "util_pcP.php";

 if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
             $sql = "INSERT INTO Compania VALUES ('$idcomp','$nom');";
                $result = mysqli_query($conection, $sql);
        if(!isset($result))
        {
          echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"index.php\"
              </script>";    
        }
        else {
            echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"index.php\"
          </script>";
        }
           }
      
           fclose($file);  
     }
  }   

/*use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

if (isset($_POST["import"])) {
    
    $archivo = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($archivo, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            $idcomp = "";
            if (isset($column[0])) {
                $idcomp = mysqli_real_escape_string($conn, $column[0]);
            }
            $nom = "";
            if (isset($column[1])) {
                $nom = mysqli_real_escape_string($conn, $column[1]);
            
            $sqlInsert = "INSERT into compania (idcomp, nom)
                   values (?,?)";
            $paramType = "issss";
            $paramArray = array(
                $idcomp,
                $nom,
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            
            if (! empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}*/
?>