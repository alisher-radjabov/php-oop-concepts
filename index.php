<?php

/**
 * Index file for sorter 
 * It's initialize objects and call methods
 * Include loader file to initialize sorter
 */
require_once __DIR__ . '/api/loader.php';

/**
 * Classes uses in the task.
 */
use classes\main\AbstractCardCreator;
use \classes\main\Travel;

/**
 * An array of boarding cards
 */
$boarding_cards = array(
    array(
        'starting_point' => 'Stockholm',
        'destination' => 'New York JFK',
        'transport' => 'plane',
        'transport_number' => null,
        'seat' => '7B',
        'gate' => '22',
        'ticket_counter_baggage' => '35C'
    ),
    array(
        'starting_point' => 'Madrid',
        'destination' => 'Barcelona',
        'transport' => 'train',
        'transport_number' => '78A',
        'seat' => '45B',
        'gate' => null,
        'ticket_counter_baggage' => null
    ),
    array(
        'starting_point' => 'Gerona Airport',
        'destination' => 'Stockholm',
        'transport' => 'plane',
        'transport_number' => 'SK455',
        'seat' => '3A',
        'gate' => '45B',
        'ticket_counter_baggage' => '355'
    ),
    array(
        'starting_point' => 'Barcelona',
        'destination' => 'Gerona Airport',
        'transport' => 'airport bus',
        'transport_number' => null,
        'seat' => null,
        'gate' => null,
        'ticket_counter_baggage' => null
    )
);

$boarding_cards_array = array();
foreach ($boarding_cards as $cards) {
    array_push($boarding_cards_array, AbstractCardCreator::create_boarding_card($cards));
}

/**
 * Create object for Travel class and sort boarding cards.
 */
$travel = new Travel($boarding_cards_array);
$start_trip = 'Madrid';
$trip = $travel->sort_tickets($start_trip)->get_tickets();

echo '################################ <h4>Back end test to sort boarding cards</h4> ################################';

$order_num = 1;
$baggage = null;
$gate = null;

/**
 * Displaying result 
 */

for ($i = 0; $i < count($trip); $i++) {

    if ($trip[$i]->transport === 'plane') {
        $baggage = ($trip[$i]->ticket_counter_baggage) ? '. Baggage drop at ticket counter ' .
                $trip[$i]->ticket_counter_baggage : 'Baggage will we automatically transferred from your last leg';
        $gate = ($trip[$i]->gate) ? '. Gate ' . $trip[$i]->gate . '. ' : '';
    }

    $transport_number = ($trip[$i]->transport_number) ? $trip[$i]->transport_number : '';

    echo "<pre>";
    echo $order_num . '. Take ' . $trip[$i]->transport . ' ' .
    $transport_number . ' from ' .
    $trip[$i]->starting_point . ' to ' .
    $trip[$i]->destination . '. ';
    echo $gate;
    echo ($trip[$i]->seat) ? 'Seat ' . $trip[$i]->seat : ' No seat assignment. ';
    echo $baggage;
    echo "</pre>";

    $order_num++;

    if ($i == count($trip) - 1) {
        echo "<pre>";
        echo $order_num . '. You have arrived at your final destination.';
        echo "</pre>";
        break;
    }
}
