<form method="post" action="<?=SITE_PATH?>admin/execManageCategory">
<b>Category ID:</b><?=$data[0]->id?><br>
<table>
<input type="hidden" name="id" value="<?=$data[0]->id?>">
<tr><td>Category Name</td><td><input type="text" name="name" value="<?=$data[0]->name?>"></td></tr>
<tr><td>Related to:</td><td><input type="text" name="relatedTo" value="<?=$data[0]->related_to?>"></td></tr>
<tr><td></td><td><input type="submit" name="act" value="Submit"></td></tr>
</table>
</form>