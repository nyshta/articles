<?php

function isLinkSuspicious(string $link)
{
    if (linkContainsReservedTerms($link)) {
        return true;
    }
    if (isDomainNew($link)) {
        return true;
    }
    if (isLinkShortened($link)) {
        return true;
    }
    log('Link is ok');
    return false;
}
