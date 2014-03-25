<style>
	td{
		border:1px solid #ccc;
		padding:5px;

	}
	table{
		border-collapse: collapse;
	}
</style>
<h2>Active feeds</h2>
<table>
<tr style="font-weight:bold;"><td>URL</td><td>Category</td><td colspan="2">Actions</td></tr>
<?php

foreach($data as $feed){
	///var_dump($feed);
	?>
	<tr><td style="width:100%"><?=$feed->link;?></td><td><?=$feed->cat_id;?></td><td><a href="admin/editFeed/<?=$feed->id;?>"><img src="img/edit.png" style="height:20px;"></a></td><td><a href="admin/deleteFeed/<?=$feed->id?>" class="delete"><img src="img/delete.png" style="height:20px;"></a></td></td></tr>
	<?php
}
?>
</table>