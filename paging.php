<?php

function Page_Bind($nor)
{
$host= "localhost";
    $uname="root";
    $pwd="";
    $link=  mysqli_connect ($host, $uname, $pwd,"indiator_admin");
$qry="select count(tour_id) from tb_tours";
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
$qry1="SELECT * from tb_tours LIMIT $srec,$nor";
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
	echo "<td>Tour Code:".$r1[1]."<br>";
	echo "Tour Name:".$r1[2]."<br>";
	echo "Description:".$r1[5]."<br>";
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
	
	echo "<a href=paging.php?page=1>Next</a>";
}
echo "</td></tr>";
echo '<tr><td colspan=2>';
$totpage=ceil($totrec/$nor);
for($j=1;$j<=$totpage;$j++)
{
	if($j==1)
	{
		echo "<a href=paging.php>1</a>";
	}
	else{
		$d=$j-1;
		echo "<a href=paging.php?page=$d>$j</a>";
	}
}
echo "</table>";
}
?>
<html>
<body>
	<?php
	Page_Bind(5);
	?>
</body>
</html>