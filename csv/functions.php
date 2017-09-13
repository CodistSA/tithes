<?php
include 'config.php';

 if(isset($_POST["Import"])){
        
        $filename=$_FILES["file"]["tmp_name"];      


         if($_FILES["file"]["size"] > 0)
         {
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
             {


               $sql = "INSERT into congregant (firstname,lastname) 
                   values ('".$getData[0]."','".$getData[1]."')";
                   $result = mysqli_query($con, $sql);
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
    function get_all_records(){
    $con = getdb();
    $Sql = "SELECT * FROM congregant";
    $result = mysqli_query($con, $Sql);  


    if (mysqli_num_rows($result) > 0) {
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead><tr><th>ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                        </tr></thead><tbody>";


     while($row = mysqli_fetch_assoc($result)) {

         echo "<tr><td>" . $row['id']."</td>
                   <td>" . $row['firstname']."</td>
                   <td>" . $row['lastname']."</td></tr>";        
     }
    
     echo "</tbody></table></div>";
     
} else {
     echo "you have no records";
}
}
 if(isset($_POST["Export"])){
         
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'First Name', 'Last Name'));  
      $query = "SELECT * from congregant ORDER BY emp_id DESC";  
      $result = mysqli_query($con, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }     


 ?>