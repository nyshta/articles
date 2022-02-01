<?php

class EmailSender
{
    private Storage $storage;
    //... here we're injecting Storage

    public function reactOnEvent(Event $event): void
    {
        $emails = $this->storage->getEmails($event);
        foreach ($emails as $email) {
            $user = $email->getUser;
            if ($user->getType == 'user') {
                if (!$user->isBlocked) {
                    //send random ads
                    //send main email
                }
            } elseif ($user->getType == 'moderator') {
                if (!$user->isBlocked) {
                    //send main email
                }
            }
        }
    }
}
