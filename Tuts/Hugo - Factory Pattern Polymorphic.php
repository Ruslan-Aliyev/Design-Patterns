<?php

class CarFactory
{
    public static function createSportscar(): CarInterface;
    public static function createMinivan(): CarInterface;
    public static function createSuperCar(): CarInterface;

    public static function create(string $type = 'sports'): CarInterface;
}