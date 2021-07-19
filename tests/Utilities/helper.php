<?php

function create($class, $attr = [])
{
    return factory($class)->create($attr);
}
