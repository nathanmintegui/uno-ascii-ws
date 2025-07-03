<?php
/**
 * File: Game.php
 * Description: Game engine.
 *
 * @author Nathan Berger
 * @created 2025-06-28
 * @last-modified 2025-07-02 by Nathan Berger
 * @version 1.0.0
 * @license MIT
 * @requires PHP 8.4
 */

namespace Uno;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

/**
 * Main class, responsible for the logic and game engine.
 */
class Game implements MessageComponentInterface
{
    /**
     * The maximum number of players allowed by queue.
     */
    protected const MAX_QUEUE_PLAYERS = 4;

    protected $clients;
    protected $gameState = null;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->gameState = GameState::getInstance();
    }

    public function onOpen( ConnectionInterface $conn ) {
        if ( count( $this->clients ) >= self::MAX_QUEUE_PLAYERS ) {
            $conn->send( "Lobby already full. Wait for someone to leave." );
        }

        $this->clients->attach( $conn );
        $this->gameState::addPlayer( $conn );

        $engine = new Engine();

        $engine->start();
    }

    public function onMessage( ConnectionInterface $from, $msg ) {
        foreach( $this->clients as $client ) {
            if ( $from != $client ) {
                $client->send( $msg );
            }
        }
    }

    public function onClose( ConnectionInterface $conn ) {
        $this->clients->detach( $conn );
        $this->gameState::removePlayer( $conn );
    }

    public function onError( ConnectionInterface $conn, \Exception $ex ) {
        $conn->close();
    }
}
