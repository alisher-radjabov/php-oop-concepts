<?php

/**
 * Description:
 * Classes loader file
 */
/**
 * Including path.
 */
set_include_path(get_include_path() . ':' . __DIR__ . '/');

/**
 * Loader for boarding cards sorting
 * Magic function, checks namespaces and loads classes automatically.
 * @param $class class names with namespace
 */
function __autoload($class_name) {
    require_once '/' . $class_name . '.php';
}
