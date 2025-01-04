<?php
namespace App\Class;

class Parenthesis
{
    public $name = 'abdelkader';
    public function test(int $number): int
    {
        $number += $number * 2;
        return $number;
    }
}
