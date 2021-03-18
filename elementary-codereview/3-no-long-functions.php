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
        $tradeId = $chatMessage->trade_id;
        $userId = $chatMessage->author_id;
        $tradeLink = '<'.$this->urlGenerator->route('admin.trade.show', ['tradeHash' => $tradeId]).'|'.$tradeId.'>';
        $userLink = '<'.$this->urlGenerator->route('admin.user.show', ['user' => $userId]).'|'.$userId.'>';
        $message = strtr(
            $this->messageTemplate,
            [
                '$userLink' => $userLink,
                '$tradeLink' => $tradeLink,
                '$messageBody' => $chatMessage->content_raw,
            ]
        );
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