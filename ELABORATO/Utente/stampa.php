<?php

function StampaRecordSet($con,$rs)
{
	$fieldinfo=mysqli_fetch_fields($rs);
	echo "<TABLE BORDER=1><TR>";
	foreach ($fieldinfo as $val)
	printf ("<TD>%s</TD>",$val->name);
	echo "</TR>";
	$NumCampi=mysqli_num_fields($rs);
	while ($row=mysqli_fetch_row($rs))
	{
		echo"<TR>";
		for ($j=0;$j<$NumCampi;$j++) 
		printf("<TD>%s</TD>",$row[$j]);
		echo "</TR>";
	}
	mysqli_free_result($rs);
	echo "</table>";
}
?> 


<style>
body{
    background: #ACD6E8;
    margin-left: 57px;
    text-align: center
}

td{
border:0px solid #fff;
width: 300px;
height: 40px;
white-space:inherit;
text-align:center;
}

td input {
width: 100%;
box-sizing: border-box;
text-align:center;
}
</style>    