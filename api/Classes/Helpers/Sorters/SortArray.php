<?php

/**
 * SortArray::sort($boarding_cards, $starting_points);
 * 
 * Description: 
 *
 * method sort is sorting  boarding cards from $starting_point param 
 * @param $boarding_cards is an array of starting points and destinations,etc.
 */
namespace Classes\Helpers\Sorters;

use Classes\Helpers\Interfaces\SortInterface;
use \Exception;

class SortArray implements SortInterface {

    /**
     * method sort is sorting  boarding cards from $starting_point param and shows next starting point of the previous destination
     */
    public static function sort($boarding_cards, $starting_point) {
        $sorted = array();

        while (!empty($boarding_cards)) {
            foreach ($boarding_cards as $key => $tick) {
                if ((empty($sorted) && $tick->starting_point == $starting_point) || (!empty($sorted) &&
                        $sorted[count($sorted) - 1]->destination == $tick->starting_point )) {
                    $sorted[] = $tick;
                    unset($boarding_cards[$key]);
                }
            }
        }
        return $sorted;
    }

}
