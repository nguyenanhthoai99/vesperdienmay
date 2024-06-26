<?php 

function layouts($layoutName = 'header-clients'){
    if(file_exists(_WEB_PATH_TEMPLATES . '/layouts/'. $layoutName.'.php')){
       require_once(_WEB_PATH_TEMPLATES . '/layouts/'. $layoutName.'.php');
    }
}