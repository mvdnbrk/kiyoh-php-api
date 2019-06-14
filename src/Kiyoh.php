<?php

namespace Mvdnbrk\Kiyoh;

class Kiyoh
{
    /**
     * Indicates if KiyOh migrations will be run.
     *
     * @var bool
     */
    public static $runsMigrations = true;

    /**
     * Configure this package to not register it's migrations.
     *
     * @return static
     */
    public static function ignoreMigrations()
    {
        static::$runsMigrations = false;

        return new static;
    }
}
