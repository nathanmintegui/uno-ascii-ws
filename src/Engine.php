<?php
/**
 * File: Engine.php
 * Description: Game engine.
 *
 * @author Nathan Berger
 * @created 2025-06-30
 * @last-modified 2025-07-02 by Nathan Berger
 * @version 1.0.0
 * @license MIT
 * @requires PHP 8.4
 */

namespace Uno;

class Engine
{
    protected $gameState = null;

    public function __construct() {
        $this->gameState = GameState::getInstance();
    }

    public function start() {
        $players = $this->gameState::getPlayers();
        assert( count( $players ) > 0 );

        foreach ( $players as $player ) {
            for ( $i = 1; $i <= 15; $i++) {
                $player->send( Lobby::render( count( $players ), $i ) );
            }
        }
    }
}
