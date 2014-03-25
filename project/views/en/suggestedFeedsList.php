<h2>Suggested Feeds</h2>
<table>
<tr style="font-weight:bold;"><td>URL</td><td>Category</td><td colspan="2">Actions</td></tr>
<?php

foreach($data as $feed){
	///var_dump($feed);
	?>
	<tr><td><?=$feed->url;?></td><td><?=$feed->cat_id;?></td><td><a href="admin/approveFeed/<?=$feed->id;?>"><img src="img/tick.png" style="height:20px;"></a></td><td><a class="delete" href="admin/deleteSuggestedFeed/<?=$feed->id?>"><img src="img/delete.png" style="height:20px;"></a></td></td></tr>
	<?php
}
?>
</table>