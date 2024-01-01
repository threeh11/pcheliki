<?php

namespace App\Controller;

use App\Modules\Infrastructure\Base\BaseDefaultController;
use Symfony\Component\{HttpFoundation\Request, HttpFoundation\Response};
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends BaseDefaultController
{
    public function __construct(
//        private readonly DefaultRequestTransformer $defaultRequestTransformer
    ) {
        parent::__construct();
    }

    #[Route('/default', name: 'default')]
    public function index(Request $request): Response
    {
        // Первым делом нужно переделать request в валидное и правильное состояние для нас
        // Весь input/output конвертируется в Dto Request и передается на слой ниже
        // Переходным этапом между Контроллером и Экшеном/Сервисом будет requestTransformer
        // $validData = $this->defaultRequestTransformer->requestToDefault();
        return new Response();
    }

}