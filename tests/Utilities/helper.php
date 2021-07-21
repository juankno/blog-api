<?php

function create(string $class, array $attr = [])
{
    return factory($class)->create($attr);
}
