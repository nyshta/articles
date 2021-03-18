<?php

class Example
{
    private $messageTemplate;
    private $notificationService;
    private $userRepository;
    private $actionInterceptor;
    //...

    public function suspendSuspicious(ChatMessage $chatMessage): void
    {
        $message = strtr($this->messageTemplate,['$importantData' => 'important data']);
        $this->notificationService->notificationToSlack($message, $this->channel);

        $user = $this->userRepository->find($chatMessage->author_id);
        if (null === $user) {
            throw new PhishingIsNotSuspendedException("Cant suspend phishing. User id: {$chatMessage->author_id} is not found.");
        }
        if (null !== $user && false === $this->userService->suspend($user)) {
            throw new PhishingIsNotSuspendedException("Cant suspend phishing. User id: {$chatMessage->author_id} is not suspended.");
        }

        $this->actionInterceptor->userAutoSuspend(
            $chatMessage->author_id,
            'Automatic suspend due to sending phishing links (who-is rule)'
        );
    }
}