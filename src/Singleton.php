<?php
/**
 * File: Singleton.php
 * Description: Singleton Design pattern implementation.
 *
 * @see https://refactoring.guru/pt-br/design-patterns/singleton/php/example
 *
 * @author Nathan Berger
 * @created 2025-06-28
 * @last-modified 2025-06-28 by Nathan Berger
 * @version 1.0.0
 * @license MIT
 * @requires PHP 8.4
 */

namespace Uno;

class Singleton
{
    private static $instances = [];

    protected function __construct() {}

    protected function __clone() {}

    public function __wakeup()
    {
        throw new \Exception( "Cannot unserialize singleton." );
    }

    public static function getInstance()
    {
        $subclass = static::class;
        if ( !isset( self::$instances[$subclass]  ) ) {
            self::$instances[$subclass] = new static();
        }
        return self::$instances[$subclass];
    }
}
