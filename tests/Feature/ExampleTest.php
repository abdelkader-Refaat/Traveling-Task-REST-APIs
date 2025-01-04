<?php

test('that true is true', function () {
    expect(true)->toBeTrue();
});


it('should assert true', function () {
    $this->assertTrue(true);
});

it('should assert false', function () {
    $this->assertFalse(false);
});

it('should add numbers correctly', function () {
    $result = 1 + 1;
    $this->assertEquals(2, $result);

});

test('checks if strings are equal', function () {
    $string1 = "Hello";
    $string2 = "Hello";
    expect($string1)->toEqual($string2);
});


