<?php
/**
 * Created by PhpStorm.
 * User: is
 * Date: 3/13/21
 * Time: 10:50 PM
 */

foreach ($_POST as $fieldName => $field) {
    if($field != '') {
        $filter[$fieldName] = $field;
    }
}
