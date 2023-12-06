<?php

namespace App\Support;

use Exception;
use Stringable;

class Size implements Stringable
{
    /**
     * @throws \Exception
     */
    public function __construct(private readonly string|null $bytes)
    {
    }

    /**
     * @throws \Exception
     */
    public function __toString(): string
    {
        return match (true) {
            $this->bytes === null => 'n/a',
            $this->bytes < 1024 => sprintf('%sB', $this->bytes),
            $this->bytes < 1024 ** 2 => sprintf(
                '%sKB',
                round($this->bytes / 1024, 2),
            ),
            $this->bytes < 1024 ** 3 => sprintf(
                '%sMB',
                round($this->bytes / 1024 ** 2, 2),
            ),
            $this->bytes < 1024 ** 4 => sprintf(
                '%sGB',
                round($this->bytes / 1024 ** 3, 2),
            ),
            default => sprintf(
                '%sTB',
                round($this->bytes / 1024 ** 4, 2),
            ),
        };
    }
}
