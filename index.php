<?php require_once('admin/scripts/read.php');
if(isset($_GET['filter'])){
	$tbl='tbl_movies';
	$tbl_2='tbl_genre';
	$tbl_3='tbl_mov_genre';
	$col='movies_id';
	$col_2='genre_id';
	$col_3='genre_name';
	$filter = $_GET['filter'];
	$results = filterResults($tbl,$tbl_2,$tbl_3,$col,$col_2,$col_3,$filter);
}
else{
	$results = getAll('tbl_movies');	
}
?>
<html>
<head>
	<meta charset="uft-8">
	<title>Movie Review</title>
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
		<h2><?php echo $row['movies_title'];?></h2>
		<p><?php echo $row['movies_year'];?></p>
		<h2><?php echo $row['movies_runtime'];?></h2>
		<p><?php echo $row['movies_release'];?></p>
		<img src="images/<?php echo $row['movies_cover'];?>" alt="">
		<a href="details.php?id=<?php echo $row['movies_id'];?>">See deatils</a>
		</table>

	</div>
<?php endwhile;?>
	<footer>
		<p>This is cpoyright -2019</p>
	</footer>
</body>
</html>