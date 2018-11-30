<?php
    $title = "Title";
	$h1 = "Header";
	$year = date("d.m.Y H:i:s D");
	$innerLi = [
	'home' => ['main', 'about'], 
	'archive' => ['blogs', 'comments'], 
	'contact' => ['office', 'store']
	];
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" http-equiv="content-type">
    <title>
	<?=$title?>
	</title>
</head>
<body>
    <h1><?=$h1?></h1>
    <ul>
	<?php
	/*
	echo '<ul>';
	foreach($innerLi as $key => $val) { ?>
	<li> <?php echo $key; ?>
		<ul>
			<?php 
				foreach($val as $item) { ?>
				<li> <?php echo $item; ?> </li> // или <?=$item;?>
				<?php }
				?>
		</ul>
	</li>
	<?php }
	echo '</ul>';
	?>
	*/
	foreach($innerLi as $inners => $inner) {
		echo '<li><a href="#">' . $inners . '</a></li>';
		foreach($inner as $valueInner) {
			echo '<a href="#">' . $valueInner . '</a><br>';
		}
	}
        /*<li><a href="#">home</a></li>
        <li><a href="#">archive</a></li>
        <li><a href="#">contact</a></li>*/
	?>
    </ul>
    <div class="post">
        <div class="detail">
            <h2><a href="#">Nunc commodo euismod massa quis vestibulum</a></h2>
            <p class="info">posted 3 hours ago in <a href="#">general</a></p>
        </div>
        <div class="body">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim</p>
        </div>
        <div class="x"></div>
    </div>
    <div class="col">
        <h3><a href="#">Ut enim risus rhoncus</a></h3>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim</p>
        <p>&not; <a href="#">read more</a></p>
    </div>
    <div class="col">
        <h3><a href="#">Ut enim risus rhoncus</a></h3>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim</p>
        <p>&not; <a href="#">read more</a></p>
    </div>
    <div class="col last">
        <h3><a href="#">Ut enim risus rhoncus</a></h3>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim</p>
        <p>&not; <a href="#">read more</a></p>
    </div>
    <div id="footer">
        <p>Copyright &copy; <em>mini</em> &middot; Design: <a href="#">...</a><span><?=" " . $year?></span> </p>
    </div>


</body>
</html>
