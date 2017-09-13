<?php
//load the database configuration file
include 'dbConfig.php';

if(isset($_POST['importSubmit'])){
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile,0,";");
            $row = 1;
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile, 1000, ";")) !== FALSE){
               
                //check whether member already exists in database with same email
                $prevQuery = "SELECT id FROM congregant WHERE firstname = '".$line[0]."'";
                $prevResult = $db->query($prevQuery);
                if($prevResult->num_rows > 0){
                    //update member data
                    $db->query("UPDATE congregant SET lastname = '".strtolower($line[1])."' WHERE firstname = '".strtolower($line[0])."'");
                }
                else{
                    //insert member data into database
                    $db->query("INSERT INTO congregant (firstname, lastname) VALUES ('".strtolower($line[0])."','".strtolower($line[1])."')");
                }
            }
            
            //close opened csv file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

//redirect to the listing page
header("Location: index.php".$qstring);