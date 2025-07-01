<?php
/**
 * File: Lobby.php
 * Description: Handle functions related to the lobby renderization.
 *
 * @author: Nathan Berger
 * @created 2025-06-28
 * @last-modified 2025-06-28 by Nathan Berger
 * @version 1.0.0
 * @license MIT
 * @requires PHP 8.4
 */

namespace Uno;

class Lobby {

    public static function render( int $current_players_count ) {
        assert($currentPlayersCount > 0);

        $layout = <<<EOD
         ----------------
        |      LOBBY     |
        |      $current_players_count/4       |
        |                |
         ----------------
        EOD;

        return $layout;
    }
}
