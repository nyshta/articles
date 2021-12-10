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

    public function __construct(WalkBehaviour $walkWith, FlyBehaviour $flyWith, SwimBehaviour $swimWith) {
        $this->walkBehaviour = $walkWith;
        $this->flyBehaviour = $flyWith;
        $this->swimBehaviour = $swimWith;
    }
}

class WalkWithLegs implements WalkBehaviour {
    public function walk() {
        echo ('I use my legs to walk');
    }
}

class FlyNoWay implements FlyBehaviour {
    public function fly() {
        echo ('I cant fly');
    }
}

class SwimOnWater implements SwimBehaviour {
    public function swim() {
        echo ('I can swim on the water surface');
    }
}

class Dog extends Animal{}
class Fish extends Animal{}
class Chick extends Animal{}
class Duck extends Animal{}

class AnimalFactory {
    public function createDog(): Dog {
        return new Dog(new WalkWithLegs, new FlyNoWay, new SwimOnWater);
    }

    public function createFish(): Fish {
        return new Fish(new WalkNoWay, new FlyNoWay, new SwimUnderWater);
    }

    public function createChick(): Chick {
        return new Chick(new WalkWithLegs, new FlyNoWay, new SwimNoWay);
    }

    public function createDuck(): Duck {
        return new Duck(new WalkWithLegs, new FlyWithWings, new SwimOnWater);
    }
}



