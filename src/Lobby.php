<?php
/**
 * File: Lobby.php
 * Description: Handle functions related to the lobby renderization.
 *
 * @author: Nathan Berger
 * @created 2025-06-28
 * @last-modified 2025-07-02 by Nathan Berger
 * @version 1.0.0
 * @license MIT
 * @requires PHP 8.4
 */

namespace Uno;

class Lobby {

    public static function render(int $current_players_count, int $dotPosition ) {
        assert($currentPlayersCount > 0);

       /**
        * NOTE: I was thinking on return a Result Object instead of throw an
        * exception here.
        */
       if ( $dotPosition < 1 || $dotPosition > 15 ) {
           throw new InvalidArgumentException( "Arg: DotPosition must be a value between 1 and 16." );
       }

       $loadingIndicator = array_fill(0, 15, " ");
       $loadingIndicator[$dotPosition] = "*";
       $loadingIndicator[15] = " ";
       $loadingIndicator = implode( $loadingIndicator );

       $layout = <<<EOD
         ----------------
        |      LOBBY     |
        |      $current_players_count/4       |
        |                |
        |$loadingIndicator|
         ----------------
       EOD;

       return $layout;
    }
}
