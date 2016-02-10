<?php

function uniqueString()// Return a unique string
{
    return $customId = strtoupper(uniqid()) . rand(0, 20);
}