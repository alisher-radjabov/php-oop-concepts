<?php

/**
 * AbstractCardCreator class pattern
 */
namespace classes\main;

use \classes\main\BoardingCard;
use \Exception;

/**
 * AbstractCardCreator creates a type of boarding card
 */
abstract class AbstractCardCreator {

    /**
     * Creates an instance of a boardingcard.
     * @return BoardingCard If $boardingcard['type] is not defined then it returns BoardingCard as a defaults
     * @param array $card
     */
    public static function create_boarding_card($boardingcard) {
        // if type wasn't set, use BoardingCard class.
        if (!isset($boardingcard['type'])) {
            return new BoardingCard($boardingcard);
        } else {
            try {
                return new $boardingcard['type'] . 'Boarding Card';
            } catch (Exception $e) {
                throw new Exception($boardingcard['type'] . 'Boarding Card' . ' class not found! ' . $e);
            }
        }
    }

}
