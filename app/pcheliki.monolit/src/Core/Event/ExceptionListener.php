<?php

namespace App\Core\Event;

use App\Core\Enums\ErrorTypes;
use App\Core\Exceptions\{
    PchelikiAccessDeniedException,
    PchelikiNotFoundException,
    PchelikiValidationException
};
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\{HttpFoundation\File\Exception\AccessDeniedException,
    HttpFoundation\JsonResponse,
    HttpFoundation\Response};
use Symfony\Component\HttpKernel\{
    Event\ExceptionEvent,
    Exception\NotFoundHttpException
};
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;
use Twig\{Error\LoaderError, Error\RuntimeError, Error\SyntaxError, Environment};

final readonly class ExceptionListener
{
    public function __construct(
        private Environment $twig,
        private LoggerInterface $logger,
    ) {}

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    #[NoReturn] public function __invoke(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if ($exception instanceof ValidationFailedException) {
            $response = new JsonResponse(
                [
                    'type' => ErrorTypes::DEFAULT_VALIDATION_ERRORS,
                    'message' => $exception->getMessage(),
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
            $event->setResponse($response);
        } else if ($exception instanceof PchelikiValidationException) {
            $errorsList = '';
            foreach ($exception->getValidationErrors() as $key => $error) {
                $errorsList = (string) ($key + 1) . ')' . $error . '\n';
            }
            $response = new JsonResponse(
                [
                    'type' => ErrorTypes::PCHELIKI_VALIDATION_ERRORS,
                    'message' => $exception->getMessage() . '\n' . $errorsList,
                    'message_array' => $exception->getValidationErrors()
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY,
            );
            $event->setResponse($response);
        } else if (
            $exception instanceof NotFoundHttpException
            || $exception instanceof PchelikiNotFoundException
        ) {
            // Такие ошибки мы логируем, чтобы по логам потом их править))
            $this->logger->critical(
                'Запрашиваемый ресурс не найден:' . $exception->getMessage()
            );
            $notFoundPage = $this->twig->render('main/errors/not_found.html.twig');
            $response = new Response(
                $notFoundPage,
                Response::HTTP_NOT_FOUND
            );
            $event->setResponse($response);
        } else if (
            $exception instanceof AccessDeniedException
            || $exception instanceof PchelikiAccessDeniedException
        ) {
            //такое мы не логируем, навернное
            $notFoundPage = $this->twig->render('main/errors/access_denied.html.twig');
            $response = new Response(
                $notFoundPage,
                Response::HTTP_NOT_FOUND
            );
            $event->setResponse($response);
        }

        // По дефолту будем 500 кидать, но нужно стремиться к тому чтобы такого не происходило,
        // И исключения обрабатывались в if`ах выше
    }

}