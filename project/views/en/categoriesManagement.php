<style>
	td{
		border:1px solid #ccc;
		padding:5px;

	}
	table{
		border-collapse: collapse;
		width:100%;
	}
</style>
<?php
echo '<p><u><a href="'.SITE_PATH.'admin/addCategory">Add a category</a></u></p>';
?>
<table>
<tr><td style="width:100%"><b>Name</b></td><td colspan="2" width="0"><b>Actions</b></td></tr>
<?php

foreach($data as $cat){

	echo '<tr><td>'.$cat->name.'</a></td><td width="0"><a href="'.SITE_PATH.'admin/manageCategory/'.$cat->id.'""><img src="img/edit.png" style="width:20px;"></a></td><td width="0"><a href="admin/deleteCategory/'.$cat->id.'" class="delete"><img style="width:20px;" src="img/delete.png"></a></td><tr>';
}
echo '</table>';