<?php

namespace Mvdnbrk\Kiyoh\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @var array */
    protected $casts = [
        'payload' => 'array',
        'recommendation' => 'boolean',
    ];

    /** @var array */
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        $this->setTable(config('kiyoh.table_name'));

        parent::__construct($attributes);
    }
}
