<!--Social JS -->

<?php
foreach($data as $entry){
    //It is with GET so special chars don't glitch stuff
    echo '<h3><a href="'.SITE_PATH.'link/visit/'.$entry->cat_id.'?url='.urlencode($entry->link).'">'.$entry->title.'</a></h3>'.strip_tags(substr($entry->description,0,140));
    $type=(array)$entry->is_recommended;
    if($type[0]=="1"){
        echo '<br><small>This is a recommended story.</small>';
    }
?>
<br>

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_preferred_1" addthis:url="<?=$entry->link;?>" addthis:description="Shared by bReader.me!"></a>
<a class="addthis_button_preferred_2" addthis:url="<?=$entry->link;?>" addthis:description="Shared by bReader.me!"></a>
<a class="addthis_button_preferred_3" addthis:url="<?=$entry->link;?>" addthis:description="Shared by bReader.me!"></a>
<a class="addthis_button_preferred_4" addthis:url="<?=$entry->link;?>" addthis:description="Shared by bReader.me!"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<br>
<hr>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51d0422f033735d0"></script>
<!-- AddThis Button END -->
<?php
    
}
?>