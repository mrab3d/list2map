<?php

/*
******************************
***   written by MrAbed   ****
***sma.ab3d.apps@gmail.com****
******************************
*/

/*
what is a list? an indexed array like: array('Joe', 'Dane', 'Tyler')
what is a map? an associative array like: array('admin' => 'Joe', 'Editor' => 'Dane', 'Writer' => 'Tyler)

members with even indexes in list will be keys of map
members with odd indexes in list will be values of map

to see what this class does in action, uncomment lines at the end of this script and run it 
*/

class List2Map {

    private static $list;
    private static $map;

    public static function convert(Array $list) {

        self::$list = $list;
        self::sanitizeList();

        $arrKeys = array_filter(self::$list, "self::isIndexEven", ARRAY_FILTER_USE_KEY);
        $arrKeys = array_values($arrKeys);
        $arrValues = array_filter(self::$list, "self::isIndexOdd", ARRAY_FILTER_USE_KEY);
        $arrValues = array_values($arrValues);

        self::$map = array_combine($arrKeys, $arrValues);
        return self::$map;
    }

    private static function isIndexEven($index) {
        if($index % 2 == 0) {
            return true;
        }else {
            return false;
        }
    }
    
    private static function isIndexOdd($index) {
        if($index % 2 == 1) {
            return true;
        }else {
            return false;
        }
    }

    private function pushEmptyString() {
        array_push(self::$list, '');
    }

    private function isListCountEven() {
        if(count(self::$list) % 2 == 0) {
            return true;
        }else {
            return false;
        }
    }

    private function sanitizeList() {
        if(self::isListCountEven() == false) self::pushEmptyString();
    }

}

/*
$theList = array(
    'controller', 
    'homesController', 
    'action', 
    'edit', 
    'id', 
    'aePMM29D8', 
    'session', 
    'sKxO5Hu'
);
$map = List2Map::convert($theList);
print_r($map);
*/