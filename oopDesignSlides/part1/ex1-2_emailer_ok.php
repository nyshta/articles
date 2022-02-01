<?php

class EmailSender
{
    private Storage $storage;

    //... here we injecting Storage

    public function reactOnEvent(Event $event): void
    {
        $emails = $this->storage->getEmails($event);
        foreach ($emails as $email) {
            $this->proceedEmail($email);
        }
    }

    private function proceedEmail(Email $email): void //do not forget about types declaration
    {
        $user = $email->getUser;
        if ($user->isBlocked) {
            return;
        }
        $this->sendAdsForUserEmail($user, $email);
        $this->sendMainEmail($email);
    }

    private function sendAdsForUserEmail(User $user, Email $email): void
    {
        if ($user->getType != 'user') {
            return;
        }
        $this->sendRandomAds($email);
    }

    private function sendMainEmail(Email $email): void
    {
        //send main email
    }

    private function sendRandomAds(Email $email): void
    {
        //send random ads
    }
}
