<?php
	include "header.php";
	$sid=$_GET["id"];
	$sql="select * from shows where sid=".$sid;
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
?>
	<h3>这是show页面</h3>
		<div class="wrap show">
			<div class="wrap_box">
				<p class="title"><?php echo $row["stitle"] ?></p>
				<span><?php echo $row["stime"] ?></span>
				<p class="inner"><?php echo $row["scon"] ?></p>
			</div>	
		</div>
	</body>
</html>