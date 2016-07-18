<?php
if(isset($_POST['submit']))	
{
	require_once(dirname(__FILE__) .'/calc.php');
	for($i=0;$i<4;$i++)
	{
		$p=$_POST['p'.$i];
		$s=$_POST['s'.$i];
		$name=$_POST['name'.$i];
		$arr[$i]=new user($name, $p, $s);
	}
	$bd=$_POST['billdesc'];
	$due=calculate($arr);
	$res='<p><strong>The dues for the Bill :</strong> '.$bd.'</p>';
	foreach($due as $d)
	{
		$res.=$d->printdue();
	}
	echo $res; 
}
?>