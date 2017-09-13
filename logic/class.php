<?php
session_start();
//global $class;
class ConnectMe
{
  private function dbConnecion()
  {
    include('config.php');
    $dbConnection = mysqli_connect($config['connection_host'],$config['connection_user'],$config['connection_password'],$config['connection_database']);
    if(!mysqli_select_db($dbConnection,$config['connection_database']))
    {
      echo "Database connection failed";
      die();
    }
    return $dbConnection;
  }

  /*public function listDrivers()
  {
    $status='false';
    $return=array();
    $results=array();
    $db = $this->dbConnecion();
    $sql = "select hex(aes_encrypt(id,'profiles')) as id,firstname,surname,registration_plate from profiles where enabled='1'";
    $query = mysqli_query($db,$sql);
    if(mysqli_num_rows($query)>0)
    {
      $cnt=0;
      $status='true';
      while($row = mysqli_fetch_assoc($query))
      {
        $results['names'][$cnt]=$row['firstname'].' '.$row['surname'].' '.$row['registration_plate'];
        $results['ids'][$row['id']]=$row['firstname'].' '.$row['surname'].' '.$row['registration_plate'];
        $cnt++;
      }
      $return['content']=$results;
    }
    $return['status']=$status;
    return $return;
  }*/

 /* public function listAssociations()
  {
    $status='false';
    $return=array();
    $results=array();
    $db = $this->dbConnecion();
    $sql = "select hex(aes_encrypt(id,'tblassoc')) as id,value,dtcreated from tblassoc";
    $query = mysqli_query($db,$sql);
    if(mysqli_num_rows($query)>0)
    {
      $cnt=0;
      $status='true';
      while($row = mysqli_fetch_assoc($query))
      {
        $results[$row['id']]['value']=$row['value'];
        $results[$row['id']]['dtcreated']=$row['dtcreated'];
        $cnt++;
      }
      $return['content']=$results;
    }
    $return['status']=$status;
    return $return;
  }*/

  /*public function listDriversDetails()
  {
    $status='false';
    $return=array();
    $results=array();
    $db = $this->dbConnecion();
    $sql = "select hex(aes_encrypt(profiles.id,'profiles')) as id,firstname,surname,registration_plate,tblassoc.value as assoc,dbcreated,enabled from profiles left join tblassoc on (profiles.associd=tblassoc.id) order by dbcreated desc";
    $query = mysqli_query($db,$sql);
    if(mysqli_num_rows($query)>0)
    {
      $cnt=0;
      $status='true';
      while($row = mysqli_fetch_assoc($query))
      {
        $results[$row['id']]['firstname']=$row['firstname'];
        $results[$row['id']]['surname']=$row['surname'];
        $results[$row['id']]['registration_plate']=$row['registration_plate'];
        $results[$row['id']]['assoc']=$row['assoc'];
        $results[$row['id']]['dbcreated']=$row['dbcreated'];
        $results[$row['id']]['enabled']=$row['enabled'];
        $cnt++;
      }
      $return['content']=$results;
    }
    $return['status']=$status;
    return $return;
  }*/

  /*public function disableDriver($id)
  {
    $db = $this->dbConnecion();
    $sql = "SELECT id FROM profiles WHERE id=aes_decrypt(0x".$id.",'profiles')";
    $query = mysqli_query($db,$sql);
    $count = mysqli_num_rows($query);
    if($count > 0)
    {

      while($row = mysqli_fetch_assoc($query))
      {
        $driverID = $row['id'];
      }

      $sql = "update profiles set enabled=0 where id='".$driverID."'";
      $query = mysqli_query($db,$sql);
      $response = 'true';
    }
    else
    {
      $response = 'false';
    }
    return $response;
  }*/

  /*public function enableDriver($id)
  {
    $db = $this->dbConnecion();
    $sql = "SELECT id FROM profiles WHERE id=aes_decrypt(0x".$id.",'profiles')";
    $query = mysqli_query($db,$sql);
    $count = mysqli_num_rows($query);
    if($count > 0)
    {

      while($row = mysqli_fetch_assoc($query))
      {
        $driverID = $row['id'];
      }

      $sql = "update profiles set enabled=1 where id='".$driverID."'";
      $query = mysqli_query($db,$sql);
      $response = 'true';
    }
    else
    {
      $response = 'false';
    }
    return $response;
  }*/

  /*public function listUsers()
  {
    $status='false';
    $return=array();
    $results=array();
    $db = $this->dbConnecion();
    $sql = "select hex(aes_encrypt(id,'tblusers')) as id,firstname,surname,email,dtCreated from tblusers order by dtCreated desc";
    $query = mysqli_query($db,$sql);
    if(mysqli_num_rows($query)>0)
    {
      $cnt=0;
      $status='true';
      while($row = mysqli_fetch_assoc($query))
      {
        $results[$row['id']]['firstname']=$row['firstname'];
        $results[$row['id']]['surname']=$row['surname'];
        $results[$row['id']]['email']=$row['email'];
        $results[$row['id']]['dbcreated']=$row['dtCreated'];
        $cnt++;
      }
      $return['content']=$results;
    }
    $return['status']=$status;
    return $return;
  }*/

  /*public function create_user($firstname,$surname,$email)
  {
    $status='false';
    $return=array();
    $results=array();
    $db = $this->dbConnecion();
    $sql = "select id from tblusers where email='".$email."'";
    $query = mysqli_query($db,$sql);
    if(mysqli_num_rows($query)<=0)
    {
      $password = strtoupper(substr(md5(date('Y-m-d H:i:s')),0,6));
      $status = 'true';
      $sql = "insert into tblusers(	firstname,surname,email,Password)
      values('".$firstname."','".$surname."','".$email."','".$password."')";
      $query = mysqli_query($db,$sql);
    }

    $return['status']=$status;
    return $return;
  }*/

  /*public function create_driver($firstname,$surname,$registration,$assoc='')
  {
    $status='false';
    $return=array();
    $results=array();
    $db = $this->dbConnecion();
    $sql = "select id from profiles where registration_plate='".$registration."'";
    $query = mysqli_query($db,$sql);
    if(mysqli_num_rows($query)<=0)
    {
      $status = 'true';
      $sql = "insert into profiles(firstname,surname,registration_plate,associd)
      values('".$firstname."','".$surname."','".$registration."',aes_decrypt(0x".$assoc.",'tblassoc'))";
      $query = mysqli_query($db,$sql);

    }

    $return['status']=$status;
    return $return;
  }*/

  /*public function getBadRatings()
  {
    $status='false';
    $return=array();
    $results=array();
    $db = $this->dbConnecion();
    $sql = "select hex(aes_encrypt(id,'tblbadratings')) as id,value from tblbadratings";
    $query = mysqli_query($db,$sql);
    if(mysqli_num_rows($query)>0)
    {
      $cnt=0;
      $status='true';
      while($row = mysqli_fetch_assoc($query))
      {
        $results[$cnt]['id']=$row['id'];
        $results[$cnt]['value']=$row['value'];
        $cnt++;
      }
      $return['content']=$results;
    }
    $return['status']=$status;
    return $return;
  }*/

  /*public function rate_driver($driver,$score,$lat,$lng)
  {
    $status='false';
    $return=array();
    $results=array();
    $db = $this->dbConnecion();
    if(strlen(trim($driver))==32 && strpos(trim($driver),' ')==0)
    {
      $sql = "select * from profiles where id=aes_decrypt(0x" . trim($driver) . ",'profiles')";
      $query = mysqli_query($db, $sql);
      if (mysqli_num_rows($query) > 0)
      {
        $id = '';
        $registration_plate = '';
        while ($row = mysqli_fetch_assoc($query))
        {
          $id = $row['id'];
          $registration_plate = $row['registration_plate'];
        }
        $results['id'] = $id;
        $results['registration_plate'] = $registration_plate;
        $insertSQL = "insert into driver_rating(driverid,scrore,lat,lng) values('" . $id . "'," . $score . ",'" . $lat . "','" . $lng . "')";
      }
      else
      {
        $insertSQL = "insert into driver_rating(drivername,scrore,lat,lng) values('" . trim($driver) . "'," . $score . ",'" . $lat . "','" . $lng . "')";
      }
    }
    else
    {
      $insertSQL = "insert into driver_rating(drivername,scrore,lat,lng) values('" . trim($driver) . "'," . $score . ",'" . $lat . "','" . $lng . "')";
    }
    $query = mysqli_query($db,$insertSQL);
    if($query)
    {
      $status='true';
      $return['content']=$results;
    }
    else
    {
      $return['content']='Failed to insert rating, please try again soon.';
    }
    $return['status']=$status;
    return $return;
  }*/

  /*public function bad_rating($driver,$ratingsArraya=array(),$lat,$lng)
  {
    $status='false';
    $return=array();
    $results=array();
    $db = $this->dbConnecion();
    if(strlen(trim($driver))==32 && strpos(trim($driver),' ')==0)
    {
      $sql = "select * from profiles where id=aes_decrypt(0x" . trim($driver) . ",'profiles')";
      $query = mysqli_query($db, $sql);
      if (mysqli_num_rows($query) > 0)
      {
        $id = '';
        $registration_plate = '';
        while ($row = mysqli_fetch_assoc($query))
        {
          $id = $row['id'];
          $registration_plate = $row['registration_plate'];
        }
        $results['id'] = $id;
        $results['registration_plate'] = $registration_plate;
        $status='true';
        foreach($ratingsArraya as $key => $score)
        {
          if($key!=='other')
          {
            $insertSQL = "insert into tblbadrating(driverid,ratingid,lat,lng) values('" . $id . "',aes_decrypt(0x" . $score . ",'tblbadratings'),'" . $lat . "','" . $lng . "')";
            $query = mysqli_query($db,$insertSQL);
            if(!$query)
            {
              $status='false';
              $return['content']="Couln't capture ".$score." rating onto database";
              exit;
            }
          }
          else
          {
            $insertSQL = "insert into tblbadrating(driverid,comment,lat,lng) values('" . $id . "',\"" . $score . "\",'" . $lat . "','" . $lng . "')";
            $query = mysqli_query($db,$insertSQL);
          }
        }
      }
      else
      {
        $status='true';
        foreach($ratingsArraya as $key => $score)
        {
          if($key!=='other')
          {
            $insertSQL = "insert into tblbadrating(drivername,ratingid,lat,lng) values('" . trim($driver) . "',aes_decrypt(0x" . $score . ",'tblbadratings'),'" . $lat . "','" . $lng . "')";
            $query = mysqli_query($db, $insertSQL);
            if (!$query)
            {
              $status = 'false';
              $return['content'] = "Couln't capture " . $score . " rating onto database";
              exit;
            }
          }
          else
          {
            $insertSQL = "insert into tblbadrating(drivername,comment,lat,lng) values('" . trim($driver) . "',\"" . $score . "\",'" . $lat . "','" . $lng . "')";
            $query = mysqli_query($db,$insertSQL);
          }
        }
      }
    }
    else
    {
      $status='true';
      foreach($ratingsArraya as $key => $score)
      {
        if($key!=="other")
        {
          $insertSQL = "insert into tblbadrating(drivername,ratingid,lat,lng) values('" . trim($driver) . "',aes_decrypt(0x" . $score . ",'tblbadratings'),'" . $lat . "','" . $lng . "')";
          $query = mysqli_query($db,$insertSQL);
          if(!$query)
          {
            $status='false';
            $return['content']="Couln't capture ".$score." rating onto database";
            exit;
          }
        }
        else
        {
          $insertSQL = "insert into tblbadrating(drivername,comment,lat,lng) values('" . trim($driver) . "',\"" . $score . "\",'" . $lat . "','" . $lng . "')";
          $query = mysqli_query($db,$insertSQL);
        }
      }
    }

    $return['status']=$status;
    return $return;
  }*/

  /*public function get_good_ratings_stats()
  {
    $status='false';
    $return=array();
    $results=array();
    $db = $this->dbConnecion();
    $sql = "SELECT hex(aes_encrypt(id,'profiles')) as id,(select concat(profiles.firstname,' ',profiles.surname) from profiles where profiles.id=driver_rating.driverid) as driver, drivername as 'new_entries',count(*) Rates,SUM(scrore) as Score
    FROM driver_rating
    group by driverid,drivername
    order by Score desc";
    $query = mysqli_query($db, $sql);
    if($query)
    {
      $return['status']='true';
      if(mysqli_num_rows($query)>0)
      {
        $cnt=0;
        while($rows = mysqli_fetch_assoc($query))
        {
          if($rows['driver'] !== '')
          {
            $results[$cnt]['id']=$rows['id'];
            $results[$cnt]['driver_name']=$rows['driver'];
            $results[$cnt]['new_entries']=$rows['new_entries'];
            $results[$cnt]['rates_count']=$rows['Rates'];
            $results[$cnt]['total_rates']=$rows['Score'];
            $cnt++;
          }
        }
        $return['content']=$results;
      }
    }
    else
    {
      $return['status']='false';
    }
    return $return;
  }*/

  /*public function get_bad_ratings_stats()
  {
    $status='false';
    $return=array();
    $results=array();
    $db = $this->dbConnecion();
    $sql = "select tblbadratings.value,tblbadrating.comment,concat(profiles.firstname,' ',profiles.surname) as driver,count(*) as rates
    from tblbadrating
    left join tblbadratings on (tblbadratings.id=tblbadrating.ratingid)
    left join profiles on (profiles.id=tblbadrating.driverid)
    group by tblbadratings.value,driver
    order by rates desc";
    $query = mysqli_query($db, $sql);
    if($query)
    {
      $return['status']='true';
      if(mysqli_num_rows($query)>0)
      {
        $cnt=0;
        while($rows = mysqli_fetch_assoc($query))
        {
          if($rows !== '')
          {
            $results[$cnt]['value']=$rows['value'];
            $results[$cnt]['comment']=$rows['comment'];
            $results[$cnt]['driver']=$rows['driver'];
            $results[$cnt]['count']=$rows['rates'];
            $cnt++;
          }
        }
        $return['content']=$results;
      }
    }
    else
    {
      $return['status']='false';
    }
    return $return;
  }*/

  public function LoginUsers($email, $password)
  {
    $db = $this->dbConnecion();
    $sql = "SELECT hex(aes_encrypt(id,'trustee')) as id,concat(firstname,' ',lastname) as username FROM trustee WHERE Email='".$email."' AND Password='".$password."'";
    $query = mysqli_query($db,$sql);
    $count = mysqli_num_rows($query);
    if($count > 0)
    {
      while($row = mysqli_fetch_assoc($query))
      {
        $id = $row['id'];
        $_SESSION['user_session']['id']=$row['id'];
        $_SESSION['user_session']['username']=$row['username'];
      }

      $sql = "update trustee set dtLogin=now() where id=aes_decrypt(0x".$id.",'trustee')";
      $query = mysqli_query($db,$sql);
      $response = 'true';
    }
    else
    {
      $response = 'false';
    }
	  return $response;
  }

  /*public function logoutUser($session_id)
  {
    $db = $this->dbConnecion();
    $sql = "update tblusers set dtLogin=null where id=aes_decrypt(0x".$session_id.",'tblusers')";
    $query = mysqli_query($db,$sql);
  }*/

  public function validate_session($session_id)
  {
    $status='false';
    $content='';
    $db = $this->dbConnecion();
    $sql = "SELECT concat(firstname,' ',lastname) as username FROM  trustee WHERE id=aes_decrypt(0x".$session_id.",' trustee')";
    $query = mysqli_query($db,$sql);
    $count = mysqli_num_rows($query);
    if($count > 0)
    {
      while($row = mysqli_fetch_assoc($query))
      {
        $_SESSION['user_session']['username']=$row['username'];
        $content=$row['username'];
      }
      $status = 'true';
    }
    $response['status']=$status;
    $response['content']=$content;
    return $response;
  }

  /*public function avgStarRating()
  {
    $status='false';
    $content='';
    $db = $this->dbConnecion();
    $sql = "select sum(scrore)/count(*) as Average from driver_rating";
    $query = mysqli_query($db,$sql);
    $count = mysqli_num_rows($query);
    if($count>0)
    {
      $status='true';
      $row = mysqli_fetch_assoc($query);
      $content = number_format($row['Average'],1);

    }
    $response['status']=$status;
    $response['content']=$content;
    return $response;
  }*/
  public function CongregantReports()
  {
    $status='false';
    $return=array();
    $results=array();
    $db = $this->dbConnecion();
    $sql = "SELECT congregant.id, CONCAT(congregant.firstname,' ',congregant.lastname) as Fullname, paid.dtpaid FROM congregant INNER JOIN tithespayment AS paid ON (congregant.id = paid.CongregantID)";
    $query = mysqli_query($db,$sql);
    $data= array();
    foreach($query as $row)
    {
      $data[] = $row;
    }
    /*if(mysqli_num_rows($query)>0)
    {
      $cnt=0;
      $status='true';
      while($row = mysqli_fetch_assoc($query))
      {
        $id = $row['id'];
        $fullname = $row['Fullname'];
        $dtpaid = $row['dtpaid'];
        $results['Congregant'][]= array('ID'=>$id, 'Fullname'=>$fullname, 'DatePaid'=>$dtpaid);
        //$results[$row['id']] = $row['Fullname'];
        //$results[$row['id']]['dtpaid'] = $row['dtpaid'];
        $cnt++;
      }
      //$return['content'] = $results;
    }*/
    //$return['status']=$results;*/
    return json_encode($data, JSON_UNESCAPED_SLASHES);
  }

  public function Count_All_Congregants()
  {

    $db = $this->dbConnecion();
    $sql = "select COUNT(id) as members FROM congregant";
    $query = mysqli_query($db,$sql);
    $row = $query->fetch_row();
    return $row[0];
  }

  public function List_Congregants_All()
  {
    $status='false';
    $return=array();
    $results=array();
    $db = $this->dbConnecion();
    //$sql = "select hex(aes_encrypt(id,'congregant')) as id,firstname,lastname from congregant";
    $sql = "select id,firstname,lastname from congregant";
    $query = mysqli_query($db,$sql);
    if(mysqli_num_rows($query)>0)
    {
      $cnt=0;
      $status='true';
      while($row = mysqli_fetch_assoc($query))
      {
        $results[$row['id']]['id']=$row['id'];
        $results[$row['id']]['firstname']=$row['firstname'];
        $results[$row['id']]['lastname']=$row['lastname'];
        $cnt++;
      }
      $return['content']=$results;
    }
    $return['status']=$status;
    return $return;
  }
public function TithesPayment($CongregantID,$datePaid)
{
  $status='false';
  $return=array();
  $results='';
  $db = $this->dbConnecion();
  $sql = "select * from congregant where id=".$CongregantID."";
  $query = mysqli_query($db,$sql);
  if(mysqli_num_rows($query)>0)
  {
    $sql = "INSERT INTO tithespayment(CongregantID,dtpaid)
            VALUES(".$CongregantID.",'".$datePaid."')";
    $query = mysqli_query($db,$sql);
    if($query)
    {
      $status = 'true';
    }
  }
  else
  {
    $results = "<b>".$CongregantID."</b> Does not exist in our database.";
  }
  $return['content']=$results;
  $return['status']=$status;
  return $return;
}
  public function RegisterTrustee($firstname,$lastname,$email,$password,$assembly)
  {
    $status='false';
    $return=array();
    $results='';
    $db = $this->dbConnecion();
    $sql = "select id from  trustee where firstname='".$firstname."'";
    $query = mysqli_query($db,$sql);
    if(mysqli_num_rows($query)<=0)
    {
      $status = 'true';
      $sql = "insert into  trustee(firstname,lastname,Email,Password, assembly)
      values('".$firstname."', '".$lastname."', '".$email."','".$password."','".$assembly."')";
      $query = mysqli_query($db,$sql);
    }
    else
    {
      $results = "<b>".$firstname."</b> is already in the database.";
    }

    $return['content']=$results;
    $return['status']=$status;
    return $return;
  }

  public function RegisterCongregant($firstname,$lastname,$assembly)
  {
    $status='false';
    $return=array();
    $results='';
    $db = $this->dbConnecion();
    $sql = "select id from  congregant where firstname='".$firstname."'";
    $query = mysqli_query($db,$sql);
    if(mysqli_num_rows($query)<=0)
    {
      $status = 'true';
      $sql = "insert into  congregant(firstname,lastname,assembly)
      values('".$firstname."', '".$lastname."', '".$assembly."')";
      $query = mysqli_query($db,$sql);
    }
    else
    {
      $results = "<b>".$firstname."</b> is already in the database.";
    }

    $return['content']=$results;
    $return['status']=$status;
    return $return;
  }

}

$class = new ConnectMe();
