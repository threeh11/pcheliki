<?php
namespace Scenarios\Others;

//use Symfony\Component\HttpFoundation\Request;
//use Validator\ValidatorService;
//
final readonly class DefaultRequestTransformer
{
//    public function __construct(
//        private ValidatorService $validatorService,
//    ) {}

    public function requestToDefault() //DtoRequestDefault
    {
//        $notValidData = $request->request->all() ?: [];

        // Вот такая штука будет валидировать наши данные

        //        $constraint = new Assert\Collection([
        //            'name' => [
        //                new Assert\NotBlank(),
        //                new Assert\Type('string'),
        //                new Assert\Length(['max' => 255]),
        //            ],
        //            'email' => [
        //                new Assert\NotBlank(),
        //                new Assert\Email(),
        //                new Assert\Unique(['entity' => 'App\Entity\User', 'field' => 'email']),
        //            ],
        //            'password' => [
        //                new Assert\NotBlank(),
        //                new Assert\Type('string'),
        //                new Assert\Length(['min' => 8]),
        //            ],
        //        ]);

        /*
         * @var ValidationResultTry $validationResult
         */
        // $validationResult = $this->validatorService->validateData($notValidData, $constraint);
        // $validationResult->getValidDataOrThrowEx();

        //Тут способы натягивания на dto

        // Через конструктор
        //        return new DtoRequestDefault(
        //            $validData['default'],
        //            $validData['default'],
        //            $validData['default'],
        //        );
        //
        // Либо через статическое свойство

        //        return DtoRequestDefault::createFromArray($validData);
    }
}

