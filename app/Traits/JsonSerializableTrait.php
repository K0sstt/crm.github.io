<?php

namespace App\Traits;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;

trait JsonSerializableTrait
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        $data = [];

        foreach ($this as $property => $value) {

            if (empty($this->{$property})) {
                continue;
            }

            if ( property_exists($this, $property)) {
                $name = $property;
            } else {
                $name = Str::snake($property);
            }

            $property = $this->{$property};
            if ($property instanceof Arrayable) {
                $property = $property->toArray();
            }

            $data[$name] = $property;
        }

        return $data;
    }

    /**
     * @param int $option
     * @return false|string
     */
    public function toJson($option = 0): string
    {
        return json_encode($this->jsonSerialize(), $option);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
