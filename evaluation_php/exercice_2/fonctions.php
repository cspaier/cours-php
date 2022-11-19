<?php

function moyenne(array $tableau): float
{
    return array_sum($tableau) / count($tableau);
}
