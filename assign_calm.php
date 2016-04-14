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

</body>
</html>
<form method="GET" action="assign_calm.php">
	<div class="row">
		<div class="col s6">
			<div class="input-field col s6">
	          <input placeholder="Value of a" id="a" type="text" name="a" class="validate">
	          <label for="a">Value of a</label>
	        </div>
		</div>
	</div>
	<div class="row">	
		<div class="col s6">
			<div class="input-field col s6">
	          <input placeholder="Value of b" id="b" type="text" name="b" class="validate">
	          <label for="b">Value of b</label>
	        </div>
		</div>
	</div>
	<div class="row">	
		<div class="col s6">
			<div class="input-field col s6">
	          <input placeholder="Value of c" id="c" type="text" name="c" class="validate">
	          <label for="c">Value of c</label>
	        </div>
		</div>
	</div>
	<div class="row">	
		<div class="col s6">
			<div class="input-field col s6">
	          <input placeholder="Values of x" id="x" type="text" name="x" class="validate">
	          <label for="c">Enter values of x seprated with comas.</label>
	        </div>
		</div>
	</div>
	<div class="row">
		<button class="btn waves-effect waves-light" type="submit" name="action">Submit
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
			$x_shift = -$b/(2*$a);
			$y_shift = (4*$a*$c-$b^2)/(4*$a);
			for($i=0;$i<count($x);$i++){
				if($x[$i]<0){
					$x[$i] = (-1)*$x[$i];
				}
			}
			
			echo $y_shift;
			echo $x_shift;
		}
	}
?>