<?php

class NumberList
{
	public function filterNumbers($from = 1, $to = 100)
	{
		$fltNumLst	= "";

		for($i = $from; $i <= $to; $i++)
		{
			$number	= $this->checkNumbers($i, 3, 5, 'Linianos');
			$number	= $this->checkNumbers($number, 3, 1, 'Linio');
			$number	= $this->checkNumbers($number, 5, 1, 'IT');
			$fltNumLst	.= $number.", ";
		}

		return rtrim($fltNumLst, ", ");
	}

	private function checkNumbers($number, $firstNum, $secondNum, $text)
	{
		if ((is_int($number)) && ($number%$firstNum == 0) && ($number%$secondNum == 0))
			return $text;
		return $number;
	}

	public function unitTest($testStr, $testFrom, $testTo)
	{
		if ($testStr == $this->filterNumbers($testFrom, $testTo))
			return "Test success";
		else
			return "Test failed";
	}
}


$numListObj	= new NumberList();
echo "<b>Listing numbers from 1 to 100: </b><br />";
echo $numListObj->filterNumbers(1, 100);

echo "<br />";
echo "<br />";
echo "<b>Unit testing from 1 to 15: </b><br />";
$testStr	= "1, 2, Linio, 4, IT, Linio, 7, 8, Linio, IT, 11, Linio, 13, 14, Linianos";
echo $numListObj->unitTest($testStr, 1, 15);


?>
