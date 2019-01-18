<?php require_once('admin/scripts/read.php');
if(isset($_GET['id'])){
	$tbl = 'tbl_movies';
	$col = 'movies_id';
	$id = $_GET['id'];
	$results =getSingle($tbl,$col,$id);
}
else{
	echo 'Missing Movie ID';
	exit;	
}
?>
<html>
<head>
	<meta charset="uft-8">
	<title>Movie Details</title>
</head>
<body>
	<header>
		<h1>Header</h1>
		<nav>
			<ul>
				<li><a href="index.php?filter=action">Action</a></li>
				<li><a href="index.php?filter=comedy">Comedy</a></li>
			</ul>
		</nav>
	</header>
<?php

while ($row = $results->fetch(PDO::FETCH_ASSOC)):?>
	<div>
		<table>		
		<h2>Movie title<?php echo $row['movies_title'];?></h2>
		<p>Movie Year<?php echo $row['movies_year'];?></p>
		<h2><?php echo $row['movies_runtime'];?></h2>
		<p><?php echo $row['movies_release'];?></p>
		<img src="images/<?php echo $row['movies_cover'];?>" alt="">
		</table>

	</div>
<?php endwhile;?>
	<footer>
		<p>This is cpoyright -2019</p>
	</footer>
</body>
</html>