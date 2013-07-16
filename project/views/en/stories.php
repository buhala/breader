<script src="<?= SITE_PATH ?>js/stories_loaded.js"></script>
<center id='tip' style='cursor:pointer;'>Tip:Click on stories' titles to view the full article</center>
<?php
$starNum = 5; //This is a constant
$loop = 0; //Prevent a notice
foreach ($data as $entry) {
    $type = (array) $entry->is_recommended;
    if (!isset($type["0"])) {
        $cat = '-' . $entry->cat_name;
    } else {
        $cat = '';
    }

    $i = 0;
    $stars = array();
    while ($i < $starNum) {
        $i++;
        $stars[] = array('selected' => false);
    }
    $selected = 3;
    $i = 0;
    while ($i < $selected) {
        if (isset($stars[$i])) {
            $stars[$i]['selected'] = true;
        }
        $i++;
    }
    $i = 0;

    //It is with GET so special chars don't glitch stuff
    echo '<span id="story' . $loop . '"><h3 ><a id="link'.$loop.'" href="' . SITE_PATH . 'link/visit/' . $entry->cat_id . '?url=' . urlencode($entry->link) . '">' . $entry->title . '</a>' . $cat . '</h3>' . strip_tags(substr($entry->description, 0, 140)) . '<br>';

//**NO** Idea why this is like that


    if (isset($type[0])) {
        echo '<br><small>This is a recommended story.<a href="#" class="unsubscribe" id="' . $entry->cat_id . '" ><b>Click here to disable this type of stories</b></small></a><br>';
    }
    foreach ($stars as $star) {
        if ($star['selected'] == true) {
            $class = 'class="selected star"';
        } else {
            $class = 'class="star"';
        }
        $id = 'id="story' . $loop . '_' . $i . '"';
        echo '<img src="img/star.png" ' . $class . ' ' . $id . ' data-parent="story' . $loop . '">';
        $i++;
    }
    ?>

    <br>

    <!-- AddThis Button BEGIN -->
    <div class="addthis_toolbox addthis_default_style ">
        <a class="addthis_button_preferred_1" addthis:url="<?= $entry->link; ?>" addthis:description="Shared by bReader.me!"></a>
        <a class="addthis_button_preferred_2" addthis:url="<?= $entry->link; ?>" addthis:description="Shared by bReader.me!"></a>
        <a class="addthis_button_preferred_3" addthis:url="<?= $entry->link; ?>" addthis:description="Shared by bReader.me!"></a>
        <a class="addthis_button_preferred_4" addthis:url="<?= $entry->link; ?>" addthis:description="Shared by bReader.me!"></a>
        <a class="addthis_button_compact"></a>
        <a class="addthis_counter addthis_bubble_style"></a>
    </div>
    <br>
    <hr>
    <script type="text/javascript">var addthis_config = {"data_track_addressbar": false};</script>

    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51d0422f033735d0"></script>
    <!-- AddThis Button END -->
    </span>
    <?php
    $loop++;
}
?>