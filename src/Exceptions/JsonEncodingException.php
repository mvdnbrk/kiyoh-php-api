<?php

namespace Mvdnbrk\Kiyoh\Exceptions;

use RuntimeException;

class JsonEncodingException extends RuntimeException
{
    /**
     * Create a new JSON encoding exception for the model.
     *
     * @param  mixed  $resource
     * @param  string  $message
     * @return static
     */
    public static function forResource($resource, $message)
    {
        return new static('Error encoding resource ['.get_class($resource).'] to JSON: '.$message.'.');
    }
}
