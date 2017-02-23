<?php
//	include "db.php";
	class fun{
		function fun(){
			$this->str="";
		}
		function tree($pid,$flag,$table,$db,$currentId=null){
			if($currentId){
				$result=$db->query("select * from $table where cid=".$currentId);
				$row=$result->fetch_assoc();
				$p=$row["pid"];
			}
				$flag=$flag+1;
				$sql="select * from $table where pid=".$pid;
				$row=$result=$db->query($sql);
				while($row=$result->fetch_assoc()){
					$cid=$row["cid"];
					$str=str_repeat("-",$flag);
						if($currentId&&$p==$row["cid"]){
							$this->str.="<option value='$p' selected='selected'>{$str}{$row["cname"]}</option>";
						}else{
							$this->str.="<option value='$cid'>{$str}{$row["cname"]}</option>";
							$this->tree($row["cid"],$flag,$table,$db,$currentId);
						}
							
						
				}
			
			
		}
		function table($pid,$flag,$table,$db){
			$flag=$flag+1;
			$sql="select * from $table where pid=".$pid;
			$row=$result=$db->query($sql);
			while($row=$result->fetch_assoc()){
				$cid=$row["cid"];
				$str=str_repeat("-",$flag);
				$this->str.="<tr>
					<td>{$cid}</td>
					<td>{$str}{$row["cname"]}</td>
					<td>{$row["pid"]}</td>
					<td><a href='delCatagory.php?id=$cid'>删除</><a href='updateCatagory.php?id=$cid'>编辑</a></td>
					</tr>";
				$this->table($row["cid"],$flag,$table,$db);
			}
			
		}
		function delete($cid,$table,$db){
			$sql="select * from $table where pid=".$cid;
			$result=$db->query($sql);
			$row=$result->fetch_assoc();
//			while($row=$result->fetch_assoc());
				if(!$row){
					$sql="delete from $table where cid=".$cid;
					$db->query($sql);
					if($db->affected_rows>0){
						$mesege="删除成功！";
						$url="ediCatagory.php";
						include "add_success.php";
						exit;
					}	
				}
				else{
					$mesege="有子类，请先删除子类！";
					$url="ediCatagory.php";
					include "add_success.php";
					exit;	
				}
		}
		function treeCon($pid,$flag,$table,$db,$currentId=null){
				$flag=$flag+1;
				$sql="select * from $table where pid=".$pid;
				$row=$result=$db->query($sql);
				while($row=$result->fetch_assoc()){
					$cid=$row["cid"];
					$str=str_repeat("-",$flag);
						if($currentId==$row["cid"]){
							$this->str.="<option value='$cid' selected='selected'>{$str}{$row["cname"]}</option>";
						}else{
							$this->str.="<option value='$cid'>{$str}{$row["cname"]}</option>";
							$this->treeCon($row["cid"],$flag,$table,$db,$currentId);
						}
							
						
				}
			
			
		}
	}
?>