<?php
require_once './_model/Parameter.php';
define('_OFFSET', Parameter::getValueByKey('posts_per_page'));
define('_HOME_PATH', Parameter::getValueByKey('home_path'));

abstract class Config
{
    const OFFSET = _OFFSET;
    const HOME_PATH = _HOME_PATH;
}