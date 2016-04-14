<!DOCTYPE html>
<html>
<head>
	<title>Calm.io Assignment</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="materialize.min.js"></script>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="materialize.min.css"  media="screen,projection"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="animate.css">
</head>
<body>

<div class="container">
<form method="GET" action="assign_calm.php">
	<div class="row">
		<div class="col s12">
			<div class="input-field col s12">
	          <input placeholder="Value of a" id="a" type="text" name="a" class="validate">
	          <label for="a">Value of a</label>
	        </div>
		</div>
	</div>
	<div class="row">	
		<div class="col s6">
			<div class="input-field col s12">
	          <input placeholder="Value of b" id="b" type="text" name="b" class="validate">
	          <label for="b">Value of b</label>
	        </div>
		</div>
	</div>
	<div class="row">	
		<div class="col s6">
			<div class="input-field col s12">
	          <input placeholder="Value of c" id="c" type="text" name="c" class="validate">
	          <label for="c">Value of c</label>
	        </div>
		</div>
	</div>
	<div class="row">	
		<div class="col s12">
			<div class="input-field col s6">
	          <input placeholder="Values of x" id="x" type="text" name="x" class="validate">
	          <label for="c">Enter values of x seprated with comas.</label>
	        </div>
		</div>
	</div>
	<div class="row">
		<button class="btn waves-effect waves-light" type="submit" name="action">Calculate
		    <i class="material-icons right">send</i>
		  </button>
	</div>
</form>

<?php
	if(isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c']) && isset($_GET['x'])){
		$a = $_GET['a'];
		$b = $_GET['b'];
		$c = $_GET['c'];
		$x = $_GET['x'];
		if(!empty($a) && !empty($b) && !empty($c) & !empty($x)){
			$x_input = explode(',', $x);
			$x_original = $x_input;
			$x_negative = array();
			$x_shift = -$b/(2*$a);
			$y_shift = (4*$a*$c-$b^2)/(4*$a);
			$count = count($x_input);
			for($i=0;$i<$count;$i++){
				if($x_input[$i]<0){
					$x_input[$i] = (-1)*$x_input[$i];
					$x_negative[] = $x_input[$i]; 
				}
			}
			
			//echo $y_shift;
			//echo $x_shift;
			//function radixsort($array){
			$array = $x_input;
				$bucket = array_fill(0, 9, array());
				$maxDigits = 0;
				$nextDigit = false;
				//echo "sdd";
				foreach ($array as $value) {
					$numDigits = strlen((string)$value);
					if($numDigits > $maxDigits){
						$maxDigits = $numDigits;
					}
				}	
				for ($k=1; $k <= $maxDigits; $k++) { 
					for ($i=0; $i < $count; $i++) { 
						if(!nextDigit){
							$bucket[$array[$i]%10][] = $array[$i];	
						}else{
							$bucket[floor($array[$i]%pow(10, $k))/pow(10, $k-1)][] = $array[$i];
						}
					}
					$array = array();
					for ($i=0; $i < count($bucket); $i++) { 
						foreach ($bucket[$i] as $value) {
							$array[] = $value;
						}
					}
					$bucket = array_fill(0, 9, array());
					$nextDigit = true;
				}
					
			//}
			// $x_input = radixsort($x_input);
			// print_r($x_input);
			//print_r($x_input);
			//print_r($array);
			echo "<div style='font-weight:bold;font-size:20px;'>Points in required format:-</div><br><div style='font-weight:bold;font-size:20px;'>";
			foreach ($array as $value) {
				$y = $a*($value^2) + $b*$value + $c;
				if(in_array($value, $x_original)){
					if(($key = array_search($value, $x_original)) !== false) {
					    unset($x_original[$key]);
					}
				}elseif (in_array((-1)*$value, $x_original)) {
					$value = (-1)*$value;
					if(($key = array_search($value, $x_original)) !== false) {
					    unset($x_original[$key]);
					}
				}
				// for ($i=0; $i < count($x_negative); $i++) { 
				// 	if($value == (-1)*$x_negative){
				// 		$value = $x_negative;
				// 	}
				// }

				echo $value.','.$y.' ';
			}
			echo "</div>";
		}
	}
?>
		
</div>
</body>
</html>