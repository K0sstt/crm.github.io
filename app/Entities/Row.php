<?php

namespace App\Entities;

use App\Interfaces\JsonSerializableInterface;
use App\Traits\JsonSerializableTrait;

final class Row implements JsonSerializableInterface
{
    use JsonSerializableTrait;

    /**
     * @var string
     */
    public $first;

    /**
     * @var string
     */
    public $second;

    /**
     * Row constructor.
     * @param string $first
     * @param string $second
     */
    public function __construct(
        string $first,
        string $second
    ) {
        $this->first = $first;
        $this->second = $second;
        $this->toArray();
    }
}
