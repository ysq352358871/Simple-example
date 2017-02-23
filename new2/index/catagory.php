<?php 
	include "header.php";
	$id=$_GET["id"];
	$sql="select * from catagory where pid=".$id;
	$result=$db->query($sql);
?>
<h1>这是catagory页面</h1>
	<div class="wrap">
		<?php
			while($row=$result->fetch_assoc()){
		?>
			<div class="con">
				<a href="list.php?id=<?php echo $row["cid"];?>"><?php echo $row["cname"]; ?></a>
			</div>
		<?php 
		}
		?>	
		
		
	</div>
	</body>
</html>
