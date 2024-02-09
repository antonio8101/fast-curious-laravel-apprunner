<?php

namespace App\Models\Factories;


use App\Models\Person;

class PersonFactory {

    public static function Create(): Person {
        return new Person();
    }

}
