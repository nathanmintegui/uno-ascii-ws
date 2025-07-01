<?php
/**
 * File: GameState.php
 * Description: It storages the game state, acts like an in memory database.
 *
 * @author Nathan Berger
 * @created 2025-06-28
 * @last-modified 2025-06-28 by Nathan Berger
 * @version 1.0.0
 * @license MIT
 * @requires PHP 8.4
 */

namespace Uno;

use Ratchet\ConnectionInterface;

class GameState extends Singleton
{
    private static $players = [];

    protected function __construct() {}

    public static function addPlayer( ConnectionInterface $conn )
    {
        assert( $conn !== null );

        if ( count( self::$players ) >= Constants::MAX_QUEUE_PLAYERS ) {
            return;
        }

        array_push( self::$players, $conn );
    }
}
