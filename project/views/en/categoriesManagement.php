<?php
echo '<u><a href="'.SITE_PATH.'admin/addCategory">Add a category</a><ul>';
foreach($data as $cat){

	echo '<li><a href="'.SITE_PATH.'admin/manageCategory/'.$cat->id.'"">'.$cat->name.'</a></li>';
}
echo '</ul></u>';