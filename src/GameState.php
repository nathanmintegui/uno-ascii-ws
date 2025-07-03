<?php
/**
 * File: GameState.php
 * Description: It storages the game state, acts like an in memory database.
 *
 * @author Nathan Berger
 * @created 2025-06-28
 * @last-modified 2025-07-02 by Nathan Berger
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

    /**
     * Adds a player into the array.
     *
     * @param ConnectionInterface $conn the connection that represents the player.
     * @return
     */
    public static function addPlayer( ConnectionInterface $conn )
    {
        assert( $conn !== NULL );

        if ( count( self::$players ) >= Constants::MAX_QUEUE_PLAYERS ) {
            return;
        }

        array_push( self::$players, $conn );
    }

    /**
     * Removes a player from the array.
     *
     * @param ConnectionInterface $conn the connection that represents the player.
     * @return
     */
    public static function removePlayer( ConnectionInterface $conn )
    {
        assert( $conn !== NULL );

        $element = array_search( $conn, self::$players );

        if ( !$element ) {
            return;
        }

        array_splice( self::$players, $element );
    }

    /**
     * Returns all the players.
     *
     * @return array of players.
     */
    public static function getPlayers()
    {
        return self::$players;
    }
}
