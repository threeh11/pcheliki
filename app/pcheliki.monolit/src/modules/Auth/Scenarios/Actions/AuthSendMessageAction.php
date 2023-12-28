<?php

namespace App\modules\Auth\Scenarios\Actions;

use App\modules\Auth\Dto\DtoRequestAuthCheckNumber;
use Symfony\Component\Notifier\{
    Exception\TransportExceptionInterface,
    Message\SmsMessage,
    TexterInterface
};

final readonly class AuthSendMessageAction
{
    public function __construct(
//        private TexterInterface $texter
    ) {}

    /**
     * @throws TransportExceptionInterface
     */
    public function execute(DtoRequestAuthCheckNumber $dto): void
    {
//        $generatedCode = rand(1000000, 9999999);
//        $sms = new SmsMessage(
//            $dto->phone,
//            'Ваш код: ' . $generatedCode,
//        );
//        $sentMessage = $this->texter->send($sms);

//        $sentMessage->getMessageId(); - Вот это в базе будем хранить, создадим табличку для отправленных сообщений
//        $sentMessage->getOriginalMessage();
//        $generatedCode - тоже будем хранить
    }
}