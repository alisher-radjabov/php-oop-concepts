<?php

/**
 * Travel class sorts a stack of boarding cards to make a trip in proper order
 */
namespace classes\main;

use \classes\helpers\sorters\SortArray as SortTicket;
use \classes\main\CardAbstract;
use \Exception;

class Travel {

    /**
     * Unordered array of boarding cards class
     */
    public $tickets = null;

    /**
     * Constructor of the Travel class
     * @param array $tickets an array of boarding cards
     * @return Travel 
     */
    function __construct($tickets) {
        $this->set_tickets($tickets);
        return $this;
    }

    /**
     * returns an array of boarding cards
     */
    public function get_tickets() {
        return $this->tickets;
    }

    /**
     * Setter for  boarding cards
     * @param array $tickets an array of unsorted  boarding cards
     */
    public function set_tickets(array $tickets) {

        foreach ($tickets as $ticket) {
            if (!$ticket instanceof CardAbstract) {
                throw new Exception("Cards should be an instance of CardAbstract class");
            }
        }
        $this->tickets = $tickets;
        return $this;
    }

    /**
     * Sorts tickets as ascended
     */
    public function sort_tickets($starting_point) {
        $this->tickets = SortTicket::sort($this->tickets, $starting_point);
        return $this;
    }

}
