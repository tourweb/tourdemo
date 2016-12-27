<?php
class clscon 
{
   public $link;
function db_connect()
{
    $host= "localhost";
    $uname="indiator_user";
    $pwd="india@123";
    $this->link=  mysqli_connect ($host, $uname, $pwd,"indiator_admin");
    return $this->link;
}
function  db_close()
{
    mysqli_close ($this->link);
}
}
?>