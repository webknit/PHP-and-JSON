<!doctype html>
<html lang="en">
 
<head>
	
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css" media="screen">

</head>

<body> 
	
	<div class="main-body">

		<div class="container">

			<h1>PHP and JSON</h1>

			<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">

				<input type="text" name="name_search" value="Insert Name">
				<input type="submit" />

			</form>

			<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">

				<input type="hidden" name="name_search" value="">
				<input type="submit" value="reset" />

			</form>

			<br />

			<ul class="channels-box">

				<?php
					$search_value = $_GET['name_search'];
					$json = file_get_contents('channels.json');
					$data = json_decode($json);
					foreach($data as $item)
					{
						if (empty($search_value)) 
						{
						    echo '<li>';
							echo '<img src="'.$item->image.'"/>';
							echo '<h2>'.$item->name.'</h2>';
							echo '<a href="'.$item->link.'" title="'.$item->name.'">Website</a>';
							echo '</li>';
						}

						else if( stripos($item->name,$search_value) > -1) 
						{
							echo '<li>';
							echo '<img src="'.$item->image.'"/>';
							echo '<h2>'.$item->name.'</h2>';
							echo '<a href="'.$item->link.'" title="'.$item->name.'">Website</a>';
							echo '</li>';
						}
					}							  	
				?>

			</ul>

			<br><br>
	        <a href="http://function.webknit.co.uk/">www.function.webknit.co.uk</a>

	    </div><!-- .container -->

	</div><!-- .main-body -->
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="script.js"></script>

</body>
</html>

