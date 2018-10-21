<?php

/**
 * Class used to create boarding cards
 */
namespace classes\main;

use \classes\main\CardAbstract as CardAbstract;

class BoardingCard extends CardAbstract {

    /**
     *  Properties used in sorting 
     */
    protected $starting_point;
    protected $destination;
    protected $transport;
    protected $transport_number;
    protected $seat;
    protected $gate;
    protected $ticket_counter_baggage;

    /**
    * Constructor for the BoardingCard class.
    * @param array $boardingcard
    */
    function __construct(array $boardingcard) {
        $this->starting_point               = $boardingcard['starting_point'];
        $this->destination                  = $boardingcard['destination'];
        $this->transport                    = $boardingcard['transport'];
        $this->transport_number             = $boardingcard['transport_number'];
        $this->seat                         = $boardingcard['seat'];
        $this->gate                         = $boardingcard['gate'];
        $this->ticket_counter_baggage       = $boardingcard['ticket_counter_baggage'];

        return $this;
    }
    /**
    * PHP Magic getter, to get properties securly
    * @param string $property 
    */
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
