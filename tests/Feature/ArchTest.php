<?php

arch('dd and ray NOT used')
    ->expect(['dd', 'dump','ray'])
    ->not->toBeUsed();
