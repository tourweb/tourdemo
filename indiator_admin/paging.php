<?php
include_once 'connect.php';
$con=new clscon();
$link=$con->db_connect();
$qry="select count(tourid) from tb_tours";
$res=  mysqli_query($link, $qry);
$r=mysqli_fetch_row($res);
$totrec=$r[0];
$pno=0;
if(!isset($_REQUEST["page"]))
{
	$pno=0;
	$srec=0;
}
else{
	$pn=$_REQUEST["page"];
	$srec=$pno*$nor;
}
$rc=$totrec-($pno*$nor);
$qry1="select * from tb_tours limit $srec,$nor";
$res1=mysqli_query($link,$qry1);
echo '<table border=2>';
$i=1;
while($r1=mysqli_fetch_array($res1))
{
	$i++;
	if($i==2)
	{
		echo "<tr>";
		$i=0;
	}
	echo "<td>".$r[1]."</td>";
	echo "<td>".$r[2]."<br>";
	echo $r[5]."<br>";
	echo "</td>";
	if($i==1)
	{
		echo "</tr>";
	}
}
echo "<tr>";
echo "<td colspan=2>";
if($rc<=$nor)
{
	$prv=$pno-1;
	echo "<a href=paging.php?page=$prv>PRV</a>";
}
else if($pno>0)
{
	$prv=$pno-1;
	$next=$pno+1;
	echo "<a href=paging.php?page=$prv>PRV</a>";
	echo "<a href=paging.php?page=$next>Next</a>";
}
else if($pno==0)
{
	$next=$pno+1;
	echo "<a href=paging.php?page=$next>Next</a>";
}
echo "</td></tr>";
echo "</table>";