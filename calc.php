<?
	$summn[0]=$_POST['sum-deposit'];
	if ($_POST['repl-deposit']==1)
		{
	$summadd =$_POST['sum-repl-deposit'];
		}
	else
		{
	$summadd=0;
		}
	$deposit_date = new DateTime($_POST['deposit-date']);

	$firstDayOfNextMonth =new DateTime($_POST['deposit-date']);
	$firstDayOfNextMonth = $firstDayOfNextMonth->add(new DateInterval('P1M'));
	$firstDayOfNextMonth=$firstDayOfNextMonth->format('Y-m-1');
	$firstDayOfNextMonth =new DateTime($firstDayOfNextMonth);
	$interval = $deposit_date->diff($firstDayOfNextMonth);
	$daysn[0] =$interval->d;
	$nextNextMonth=new DateTime();
		for($i=1;$i<$_POST['term-deposit']*12;$i++)
		{
			if($i==$_POST['term-deposit']*12-1)
			{
				$daysn[$i-1]=$daysn[$i-1]-$daysn[0];
			}
			$summn[$i] += $summn[$i-1]+($summn[$i-1]+$summadd)*$daysn[$i-1]*(0.1/365);
			$nextNextMonth->setDate($firstDayOfNextMonth->format('Y'),$firstDayOfNextMonth->format('m')+1,$firstDayOfNextMonth->format('1'));
			$interval = $firstDayOfNextMonth->diff($nextNextMonth);
			$daysn[$i] = $interval->format("%a");
			$firstDayOfNextMonth->setDate($nextNextMonth->format('Y'),$nextNextMonth->format('m'),1);
		}
			echo "<pre>";
			echo " ".round(end($summn),0)." руб.";
			echo "</pre>";

?>
