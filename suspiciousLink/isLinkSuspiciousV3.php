<?php

function isLinkSuspicious(string $link)
{
    if (linkContainsReservedTerms($link) ||
        isDomainNew($link) ||
        isLinkShortened($link)
    ) {
        return true;
    }
//    else { log('Link is ok'); return false; }

    log('Link is ok');
    return false;
}