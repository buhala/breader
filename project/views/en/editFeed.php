<form method="post" action="<?=SITE_PATH?>admin/execEditFeed">
<table>
<input type="hidden" name="id" value="<?=$data[0]->id?>">
<tr><td>Feed URL:</td><td><input type="text" name="link" value="<?=$data[0]->link?>"></td></tr>
<tr><td>Feed Category:</td><td><input type="text" name="cat_id" value="<?=$data[0]->cat_id?>"></td></tr>
<tr><td></td><td><input type="submit" name="act" value="Submit"></td></tr>
</table>
</form>