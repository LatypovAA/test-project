<?php $title = "Guest book"; ?>
<?php ob_start() ?>
<?php	
	$c = 0;
	foreach ($posts as $post) : 
		if ($c%2) {
		$color="#8B4513";
		}
		else{
			$color="#CD853F";					
		}
							  

?>
		<div class="span12 marginleft commentBlock" id="postContenier">
			<div class="span7 well overflow " style="color:<?php echo $color?>"><?php echo $html = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $post['text']);?></div>
			<div class="span2"><?php echo htmlspecialchars($post['name'])  ?></div>	
			<div class="span2"><?php echo $post['date'] ?></div>
			<button style="display:none" value="<?php if ($color="#8B4513") {echo "#CD853F";} else {echo "#CD853F";} ?>" id="colorText">colorForText</button>										
		</div>				
	<?php 
		$c++;
	endforeach;

	if ($c==0) 
	echo "<p class='well text-info span8 offset1' id='noMess'>There are no posts</p>";
	?>
<?php $content = ob_get_clean() ?>
<?php include ("layout.php");