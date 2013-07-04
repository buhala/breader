<?php
class register extends b_controller{
    public function token(){
        echo '<pre>';
        print_r($_POST);
        print_r($_GET);
    }
}