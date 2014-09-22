<?php

namespace Cocoders;

class PhpSpecExample
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function showFile($key)
    {
        if ('test' === $key) {
           throw new \InvalidArgumentException();
        }

        return [
            'test123',
            'test123a',
            'test123aa'
        ];
    }
}
