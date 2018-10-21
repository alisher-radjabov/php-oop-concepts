<?php

/**
 * Interface for sorting algorithms
 */
namespace classes\helpers\interfaces;

/**
 *  BoardigCard sort algorithms have to implement this interface.
 */
interface SortInterface {

    /**
     * sort method should implement
     * @param array $items
     * @param array $starting_point - where trip starts
     */
    public static function sort($items, $starting_point);
}
