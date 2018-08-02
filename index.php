<!DOCTYPE html>
<html>
	<head>
		<title>PHP Class</title>
	</head>
	<body>
		<h1>Welcome to the PHP Class</h1>
		<?php
			$linkText = "My personal Link";
			echo '<a href="http://gces.edu.np">'.$linkText.'</a>';
			echo "Hi ".$linkText." a student";
		?>
		<h2>Arrays</h2>
		<ul>
			<li>Indexed Array</li>
			<li>Associative Array</li>
			<li>Multi-dimentional Array</li>
		</ul>
		<?php
			$arr = array("Hi", "Namaste", "Hola");
			print_r($arr);
			echo "<br />";
			// echo $arr[1];
			echo "<br />";
			for ($i=0; $i < 3; $i++) { 
				echo $arr[$i];
				echo "<br />";
			}
			echo "<br />";
			$waysToGreet = array('English' => 'Hi', 'Nepali' => 'Namaste', 'Spanish' => 'Hola');
			print_r($waysToGreet);
			echo "<br />";
			// echo $waysToGreet['Nepali'];
			/*for ($i=0; $i < count($waysToGreet); $i++) {
				echo $waysToGreet[$i];
				echo "<br />";
			}*/
			foreach ($waysToGreet as $key => $value) {
				echo "Key: ".$key;
				echo "<br />";
				echo "Value: ".$value;
				echo "<br />";
				echo "<br />";
			}
			echo count($waysToGreet);
			echo "<br />";
			echo "<br />";
			$multiArray = array(
				array("1", "2", "3"),
				array("4", "5", "6" ),
				array("7", "8", "9")
			);
			print_r($multiArray);
			echo "<br />";
			echo "<br />";
			echo $multiArray[2][1];
		?>




	</body>
</html>