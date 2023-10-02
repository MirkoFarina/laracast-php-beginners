<?php

use Core\Container;

test('example', function () {
    expect(true)->toBeTrue();
});

test('test container', function (){
    $container = new Container();
   $container->bind('foo', fn() => 'bar');

   $result = $container->resolve('foo');

   expect($result)->toEqual('bar');
});
