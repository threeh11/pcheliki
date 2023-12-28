<?php

namespace App\modules\Infrastructure\Base;

use Psr\Container\{ContainerExceptionInterface, NotFoundExceptionInterface};
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

abstract class BaseController extends AbstractController
{
    public function __construct()
    {
    }

    // Пока не расписал сам Request, тут будем передавать весь request

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function sendPage(string $pathToTemplate, array $parameters): Response
    {
        if (!$this->container->has('twig')) {
            throw new \DomainException(
                'Вы не сможете использовать метод "sendPage", если пакет Twig недоступен. Попробуйте запустить "composer require symfony/twig-bundle".'
            );
        }
        /**
         * @var Environment $twig
         */
        $twig = $this->container->get('twig');

        if (!$twig->getLoader()->exists($pathToTemplate)) {
            throw new \LogicException('Не правильный путь к файлу отображения: ' . $pathToTemplate);
        }

        return $this->render($pathToTemplate, $parameters);
//        return new Response(
//            $content,
//            200,
//            [
//                'Content-Type' => 'text/html',
//                'Cache-Control' => 'public, max-age=3600',
//                'Accept-Language' => 'en-US,en;q=0.9,ru;q=0.8',
//                // будет дополнятся, пока написал базовые, потом сюда еще куки прикрутим
//            ]
//        );
    }

    // TODO Написать Json Response для отправки ответа в виде json

    // Это только пример надо норм переписать
    //    protected function sendJson(): JsonResponse
    //    {
    //        Проверить на валидный Json
    //
    //        return new Response(
    //            $content,
    //            200,
    //            [
    //                'Content-Type' => 'text/html', <- тут уже будет json
    //                'Cache-Control' => 'public, max-age=3600',
    //                'Accept-Language' => 'en-US,en;q=0.9,ru;q=0.8',
    //                // будет дополнятся, пока написал базовые, потом сюда еще куки прикрутим
    //            ]
    //        );
    //    }

}