<?php

namespace App\Service;

interface ExampleInterface
{
    public function message(bool $isCaps): string;

    public function color(string $name): string;
}
