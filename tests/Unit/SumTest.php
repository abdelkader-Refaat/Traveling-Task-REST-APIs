<?php

test('sumittion', function () {
    $arr = [1, 2, 3, 4, 5];
    $result = array_sum($arr);
    expect($result)->toBe(15);
});

it('performs sums', function () {
    $arr = [1, 2, 3, 4, 5];
    $result = array_sum($arr);
    expect($result)->toBe(15);
 });
