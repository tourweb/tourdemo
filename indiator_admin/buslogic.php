<?php
include("connect.php");
class clscity
{

    public $city_id,$city_name,$city_key,$city_desc;
    function  save_rec()
    {

        $con=new clscon();
        $link=$con->db_connect();
        $qry="call inscity('$this->city_name','$this->city_key','$this->city_desc')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {

            $con->db_close();
            return TRUE;
        }
        else 
         {
         $con->db_close();
         return FALSE;
         }
        }
        function update_rec()
        {
            $con = new clscon();
            $link=$con->db_connect();
           $qry="call updcity($this->city_id,'$this->city_name','$this->city_key','$this->city_desc')";
            $res= mysqli_query($link, $qry);
            if(mysqli_affected_rows($link)==1)
            {

                $con->db_close();
                return TRUE;
            }
            else
            {
                 $con->db_close();
                 return FALSE;
                
            }
        }
    function delete_city()
    {
        $con = new clscon();
        $link=$con->db_connect();
        $qry="call delcity($this->city_id)";
        $res= mysqli_query($link, $qry);
    if(mysqli_affected_rows($link)==1)
        {

            $con->db_close();
            return TRUE;
        }
 else 
     {
     $con->db_close();
     return FALSE;
     }
        
        
    }
   function disp_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call dispcity()";
        $res= mysqli_query($link, $qry);
        $arr=array();
        $i=0;
        while($r= mysqli_fetch_array($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
    }
    function find_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call fndcity($this->city_id)";
        $res= mysqli_query($link, $qry);
        if(mysqli_num_rows($res)>0)
        {

            $r= mysqli_fetch_row($res);
            $this->city_id=$r[0];
            $this->city_name=$r[1];
$this->city_key=$r[2];
$this->city_desc=$r[3];

        }
        $con->db_close();
        
    }
}
class clscat
{
    public $cat_name,$cat_id;
     function  save_rec()
    {

        $con=new clscon();
        $link=$con->db_connect();
        $qry="call inscat('$this->cat_name')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {

            $con->db_close();
            return TRUE;
        }
 else 
     {
     $con->db_close();
     return FALSE;
     }
}
function update_rec()
{
$con = new clscon();
$link=$con->db_connect();
$qry="call updcat($this->cat_id,'$this->cat_name')";
$res= mysqli_query($link, $qry);
if(mysqli_affected_rows($link)==1)
{

    $con->db_close();
    return TRUE;
}
        else
        {
             $con->db_close();
             return FALSE;
            
        }
}
function delete_rec()
{
      $con = new clscon();
        $link=$con->db_connect();
        $qry="call delcat($this->cat_id)";
        $res= mysqli_query($link, $qry);
    if(mysqli_affected_rows($link)==1)
        {

            $con->db_close();
            return TRUE;
        }
 else 
     {
     $con->db_close();
     return FALSE;
     }
}

function  disp_rec()
{
     $con=new clscon();
        $link=$con->db_connect();
        $qry="call dispcat()";
        $res=  mysqli_query($link, $qry);
        $arr=array();
        $i=0;
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
}
function find_rec()
{
    $con=new clscon();
        $link=$con->db_connect();
        $qry="call fndcat($this->cat_id)";
        $res=  mysqli_query($link, $qry);
        if(mysqli_num_rows($res)>0)
        {

            $r=  mysqli_fetch_row($res);
            $this->cat_id=$r[0];
            $this->cat_name=$r[1];
            
        }
        $con->db_close();
        
}
}
class clstour
{
    public $tour_id,$tour_code,$tour_name,$tour_cat_id,$tour_city_id,$duration,$ratings,$short_description,$highlights,$inclusions,$exclusions,$itinerary_details,$additional_info,$page_url;
    function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call instour('$this->tour_code','$this->tour_name','$this->tour_cat_id','$this->tour_city_id','$this->duration','$this->ratings','$this->short_description','$this->highlights','$this->overview','$this->inclusions','$this->exclusions','$this->itinerary_details','$this->additional_info','$this->page_url')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {            
           
            ?>

            <script type="text/javascript">
                alert("Data added Successfully");
                window.location.href="tours.php";
            </script>

            <?php
           
            $con->db_close();
            return TRUE;
        }
        else 
        {
         $con->db_close();
         return FALSE;
            
        }
}
function update_rec()

{
    $con = new clscon();
$link=$con->db_connect();
$qry="call updinggrp($this->inggrpcod,'$this->inggrpnam')";
$res= mysqli_query($link, $qry);
if(mysqli_affected_rows($link)==1)
{

    $con->db_close();
    return TRUE;
}
        else
        {
             $con->db_close();
             return FALSE;
            
        }
    
}
function  delete_rec()
{
    
     $con = new clscon();
        $link=$con->db_connect();
        $qry="call deltour($this->tour_id)";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
            {
                ?>

            <script type="text/javascript">
                alert("Tour deleted Successfully");
                window.location.href="tours.php";
            </script>

            <?php
                $con->db_close();
                return TRUE;
            }
        else 
         {
         $con->db_close();
         return FALSE;
         }
}
function display_rec($cityid,$catid)
{
     $con=new clscon();
        $link=$con->db_connect();
        $qry="call displaytour($cityid,$catid)";
        $res=  mysqli_query($link,$qry) or die(mysqli_error($link));
        $arr=array();
        $i=0;

        while($r=mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
}
function search_rec($cityid,$catid)
{
     $con=new clscon();
        $link=$con->db_connect();
        $qry="";
        $res=  mysqli_query($link,$qry) or die(mysqli_error($link));
        $arr=array();
        $i=0;
        echo mysqli_error($link);
        while($r=mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
}
function disp_rec()
{
     $con=new clscon();
        $link=$con->db_connect();
        $qry="call disptour()";
        $res=  mysqli_query($link,$qry) or die(mysqli_error($link));
        $arr=array();
        $i=0;

        while($r=mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
}


}

class clsbook
{
    public $book_id,$tour_id,$amount,$amnt_sts;
function  disp_rec()
{
     $con=new clscon();
        $link=$con->db_connect();
        $qry="SELECT book_id,tour_id,amount,amnt_sts,today_date FROM `tb_booking` ORDER BY today_date DESC";
        $res=  mysqli_query($link, $qry);
        $arr=array();
        $i=0;
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
}

}
     
?>