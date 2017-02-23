<?php
	include "header.php";
	$cid=$_GET["id"];
	$sql="select * from shows where cid=".$cid;
	$result=$db->query($sql);
?>
	<h1>这是list页面</h1>
	<div class="wrap">
		<?php 
			while($row=$result->fetch_assoc()){
		?>	
		<p class="list">
			<a href="show.php?id=<?php echo $row["sid"]; ?>">
				<span style="float: left;" class="one"><?php echo $row["stitle"];?></span>
				<span style="float: right;" class="two"><?php echo $row["stime"];?></span>
			</a>
			
		</p>
		<?php	
			}
	    ?>
		
	</div>
	</body>
</html>
