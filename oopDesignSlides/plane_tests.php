<?php


public function testPlane()
{
    $pilotMock = $this->createMock(Pilot::class);
    $plane = new Plane($pilotMock);

    $plane = new Plane(new Pilot(...));
    ...
}

final class Pilot {...}