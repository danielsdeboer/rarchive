<?php

namespace App\Support;

use Exception;
use Stringable;

class Size implements Stringable
{
    /**
     * @throws \Exception
     */
    public function __construct(private readonly string $bytes)
    {
        if ($this->bytes < 0) {
            throw new Exception('Size cannot be negative');
        }
    }

    /**
     * @throws \Exception
     */
    public function __toString(): string
    {
        if ($this->bytes < 1024) {
            return sprintf('%sB', $this->bytes);
        }

        if ($this->bytes < 1024 ** 2) {
            return sprintf('%sKB', round($this->bytes / 1024, 2));
        }

        if ($this->bytes < 1024 ** 3) {
            return sprintf('%sMB', round($this->bytes / 1024 ** 2, 2));
        }

        if ($this->bytes < 1024 ** 4) {
            return sprintf('%sGB', round($this->bytes / 1024 ** 3, 2));
        }

        return sprintf('%sTB', round($this->bytes / 1024 ** 4, 2));
    }
}
