<?php

function isLinkNotSuspicious(string $link)
{
    if (linkContainsReservedTerms($link) ||
        isDomainNew($link) ||
        isLinkShortened($link)
    ) {
        return false;
    } else {
        log('Link is ok');
        return true;
    }
}

if (!isLinkNotSuspicious($someLink)) {...}