<?php

function create($class, $attributes = []){
    return factory($class)->create($attributes);
}

function make($class, $attributes = []){
    return factory($class)->make($attributes);
}

function createLp($class, $attributes = []){
    $laravel_role_permission =  new $class($attributes);
    $laravel_role_permission->save();

    return $laravel_role_permission;
}