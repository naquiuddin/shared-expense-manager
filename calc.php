<?php
class user
{
	var $uname;
	var $pamt;
	var $samt;
	var $sub;
	function user($name,$p,$s)
	{
		$this->uname=$name;
		$this->pamt=$p;
		$this->samt=$s;
		$this->sub=$p-$s;
	}
}
class dues
{
	var $creditor;
	var $debtor;
	Var $amount;
	function dues($c,$d,$a)
	{
		$this->creditor=$c;
		$this->debtor=$d;
		$this->amount=$a;
	}
	function printdue()
	{
		$r='<p>'.$this->debtor.' is '.$this->amount.' due to '.$this->creditor.'</p>';
		return $r;
	}
}
function calculate($users)
{
	$d=array();
	$large= new user("", 0, 0);
	$small= new user("", 0, 0);
	for($i=0;$i<count($users)-1;$i++)
	{
		$large=$users[1];
		$small=$users[1];
		foreach($users as $user)
		{
			if($user->sub > $large->sub)
			{
				$large=$user;
			}
		}
		foreach($users as $user)
		{
			if($user->sub < $small->sub)
			{
				$small=$user;
			}
		}
		$diff = $large->sub - abs($small->sub);
		//echo $large->sub.'<br />'.$small->sub.'<br/>'.$diff;
		if($diff > 0)
		{
			$d[$i]=new dues($large->uname, $small->uname, abs($small->sub));
			foreach ($users as $u)
			{
				if($u==$large)
				{
				//echo "from positive<br/>";
				//echo $large->sub.'<br/>';
				//echo $u->sub.'<br/>';
				$u->sub=$diff;
				//echo $u->sub;
				}
				if($u==$small)
				{$u->sub=0;}	
			}
		}
		else if($diff<=0)
		{
			$d[$i]=new dues($large->uname, $small->uname, abs($large->sub));
			foreach ($users as $u)
			{
				if($u==$large)
				{
					$u->sub=0;
				}
				if($u==$small)
				{
					//echo "from minus<br/>";
					//echo $small->sub.'<br/>';
					//echo $u->sub.'<br/>';
					//echo $diff.'<br/>';
					$u->sub=$diff;
					//echo $u->sub;
				}	
			}
		}
	}
	return $d;
}