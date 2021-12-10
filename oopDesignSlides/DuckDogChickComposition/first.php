<?php

interface WalkBehaviour {
    public function walk();
}
interface FlyBehaviour {
    public function fly();
}
interface SwimBehaviour {
    public function swim();
}

abstract class Animal implements WalkBehaviour, FlyBehaviour, SwimBehaviour
{
    protected WalkBehaviour $walkBehaviour;
    protected FlyBehaviour $flyBehaviour;
    protected SwimBehaviour $swimBehaviour;

    public function walk() {
        $this->walkBehaviour->walk();
    }

    public function fly() {
        $this->flyBehaviour->fly();
    }

    public function swim() {
        $this->swimBehaviour->swim();
    }
}

class FlyNoWay implements FlyBehaviour {
    public function fly() {
        echo ('I cant fly');
    }
}

class WalkWithLegs implements WalkBehaviour {
    public function walk() {
        echo ('I use my legs to walk');
    }
}

class SwimOnWater implements SwimBehaviour {
    public function swim() {
        echo ('I can swim on the water surface');
    }
}

class Dog extends Animal {
    public function __construct() {
        $this->walkBehaviour = new WalkWithLegs();
        $this->flyBehaviour = new FlyNoWay();
        $this->swimBehaviour = new SwimOnWater();
    }
}



