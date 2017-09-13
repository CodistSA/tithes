<?php
include('class.php');

//session_start();
//global $DashBoard;

class DashBoards extends ConnectMe
{
  /*public function good_rating()
  {
    $html='';
    $response = $this->get_good_ratings_stats();
    if($response['status']=='true')
    {
      if(isset($response['content']))
      {
        foreach($response['content'] as $driver)
        {
          if($driver['driver_name']!='')
          {
            $html .= '<tr><td>'.$driver['driver_name'].'</td><td>'.$driver['rates_count'].'</td><td>'.$driver['total_rates'].'</td></tr>';
          }
          else
          {
            $html .= '<tr><td><i>'.$driver['new_entries'].' (new_entries)</i></td><td>'.$driver['rates_count'].'</td><td>'.$driver['total_rates'].'</td></tr>';
          }
        }
      }
      else
      {
        $html .= '<tr><td colspan="3">No results to show.</td></tr>';
      }
    }
    return $html;
  }*/

  /*public function good_rating_chart()
  {
    $html='';

    $response = $this->get_good_ratings_stats();
    if($response['status']=='true')
    {
      if(isset($response['content']))
      {
        foreach($response['content'] as $driver)
        {
          if($driver['driver_name']!='')
          {
            $html .= "['".$driver['driver_name']."',".$driver['total_rates']."],";
          }
          else
          {
            $html .= "['".$driver['new_entries']."',".$driver['total_rates']."],";
          }
        }
      }
      else
      {

      }
    }
    include('chartTemplates.php');
    $pieChart=str_replace('<heading>','',$pieChart);
    $pieChart=str_replace('<source>',$html,$pieChart);
    return $pieChart;
//    return $html;
  }*/

 /* public function bad_ratings()
  {
    $html='';
    $response = $this->get_bad_ratings_stats();
    if($response['status']=='true')
    {
      if(isset($response['content']))
      {
        foreach($response['content'] as $driver)
        {
          if($driver['value']!='')
          {
            $html .= '<tr><td>'.$driver['value'].'</td><td>'.$driver['driver'].'</td><td>'.$driver['count'].'</td></tr>';
          }
          else
          {
            $html .= '<tr><td><i>Other</i></td><td>'.$driver['driver'].'</td><td>'.$driver['count'].'</td></tr>';
          }
        }
      }
      else
      {
        $html .= '<tr><td colspan="3">No results to show.</td></tr>';
      }
    }
    return $html;
  }*/

 /* public function bad_ratings_charts($divID)
  {
    $categories=null;
    $category='';
    $seriesArr=null;
    $series='';
    $response = $this->get_bad_ratings_stats();
    if($response['status']=='true')
    {
      if(isset($response['content']))
      {
        foreach($response['content'] as $driver)
        {
          if($driver['value']!='')
          {
            $categories[$driver['value']]='';
            $seriesArr[$driver['driver']][$driver['value']]=$driver['count'];
          }
          else
          {
//            $categories['other']='';
//            $seriesArr[$driver['driver']]['other'][]=$driver['comment'];
          }
        }
      }
    }
//    var_dump($seriesArr);
    if(!empty($categories))
    {
      $category .= '[';
      foreach($categories as $key => $val)
      {
        $category .= "'".$key."',";
        foreach($seriesArr as $drivers => $complaints)
        {
          if(!isset($seriesArr[$drivers][$key]))
          {
            $seriesArr[$drivers][$key]=0;
          }
        }
      }
      $category .= ']';

      foreach($seriesArr as $driverName => $complaints)
      {
        $series .= "{name:'".$driverName."',data:[";
        foreach($categories as $complaint => $nothing)
        {
          if(isset($complaints[$complaint]) && $complaint != 'other')
          {
            $series .= $complaints[$complaint].",";
          }
        }
        $series .= "]},";
      }
    }
    include('chartTemplates.php');
    $columnChart=str_replace('<div>',$divID,$columnChart);
    $columnChart=str_replace('<category>',$category,$columnChart);
    $columnChart=str_replace('<series>',$series,$columnChart);
    return $columnChart;
//    return $series;
  }*/

public function TotalCongregants()
{

}
public function ListCongregants()
{
  $html='';
  $response = $this->List_Congregants_All();
  if($response['status'] == 'true')
  {
    foreach($response['content'] as $CongregantID => $Congregants)
    {
      $html .= '<tr>
                    <!--<td style="width:100px;"><input type="text"name="conID" id="conID" class="form-control" value="'.$CongregantID.'" disabled ></td>-->
                    <td>'.$Congregants['firstname'].'</td>
                    <td>'.$Congregants['lastname'].'</td>
                    <td><input type="checkbox" name="checkbox'.$CongregantID.'"></td></tr>';
    }
  }
  return $html;
}

public function checkSession()
{
  if(isset($_SESSION['user_session']))
  {
    if(isset($_SESSION['user_session']['id']))
    {
      $res = $this->validate_session($_SESSION['user_session']['id']);
      if($res['status']!=='true')
      {
        header('Location: menu.php');
      }
    }
    else
    {
      header('Location: index.php');
    }
  }
  else
  {
    header('Location: index.php');
  }
  return 'ok';
}

  /*public function listDriversDetail()
  {
    $html='';
    $response = $this->listDriversDetails();
    if($response['status'] == 'true')
    {
      foreach($response['content'] as $driverID => $drivers)
      {
        if($drivers['enabled'] == '1')
        {
          $html .= '<tr><td>'.$drivers['firstname'].'</td><td>'.$drivers['surname'].'</td>
          <td>'.$drivers['registration_plate'].'</td><td>'.$drivers['assoc'].'</td><td>'.$drivers['dbcreated'].'</td>
          <td class="text-center"><a href="" class="btn btn-warning">update</a> | <a href="logic/deleteDriver.php?id='.$driverID.'" id="delete_'.$driverID.'" class="btn btn-danger">delete</a></td></tr>';
        }
        else
        {
          $html .= '<tr style="background-color: lightsalmon"><td>'.$drivers['firstname'].'</td><td>'.$drivers['surname'].'</td>
          <td>'.$drivers['registration_plate'].'</td><td>'.$drivers['assoc'].'</td><td>'.$drivers['dbcreated'].'</td>
          <td class="text-center"><a href="logic/enableDriver.php?id='.$driverID.'" id="enable_'.$driverID.'" class="btn btn-success">Enable</a></td></tr>';
        }
      }
    }
    return $html;
  }*/

  /*public function list_Associations()
  {
    $html='';
    $response = $this->listAssociations();
    if($response['status'] == 'true')
    {
      $html .= "<select name='assoc' class='form-control'>";
      foreach($response['content'] as $id => $assoc)
      {
        $html .= "<option value='".$id."'>".$assoc['value']."</option>";
      }
      $html .= "</select>";
    }
    return $html;
  }*/

  /*public function listSystemUsers()
  {
    $html='';
    $response = $this->listUsers();
    if($response['status'] == 'true')
    {
      foreach($response['content'] as $driverID => $drivers)
      {
        $html .= '<tr><td>'.$drivers['firstname'].'</td><td>'.$drivers['surname'].'</td>
        <td>'.$drivers['email'].'</td><td>'.$drivers['dbcreated'].'</td>
        <td class="text-center"><a href="" class="btn btn-warning">update</a> | <a href="deleteDriver.php" id="delete_'.$driverID.'" class="btn btn-danger">delete</a></td></tr>';
      }
    }
    return $html;
  }*/
}

$DashBoard = new DashBoards;

?>