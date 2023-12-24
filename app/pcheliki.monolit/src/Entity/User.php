<?php

namespace src\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Config\Definition\Exception\InvalidTypeException;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'users')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id',type: 'bigint', nullable: false)]
    private int $id;

    #[ORM\Column(name: 'phone', type: 'string', length: 20, nullable: false)]
    private string $phone;

    #[ORM\Column(name: 'password', type: 'string', length: 100, nullable: false)]
    private string $password;

    #[ORM\Column(name: 'ip_address', type: 'string', length: 15, nullable: false)]
    private string $ipAddress;

    #[ORM\Column(name: 'name', type: 'string', length: 50, nullable: false)]
    private string $name;

    #[ORM\Column(name: 'surname', type: 'string', length: 50, nullable: false)]
    private string $surname;

    #[ORM\Column(name: 'about_user', type: 'string', length: 100, nullable: true)]
    private ?string $aboutUser = null;

    #[ORM\Column(name: 'nickname', type: 'string', length: 30, nullable: false)]
    private string $nickname;

    #[ORM\Column(name: 'last_online', type: 'timestamp', length: 20, nullable: false)]
    private string $lastOnline;

    #[ORM\Column(name: 'sms_code', type: 'char', length: 6, nullable: true)]
    private ?string $smsCode = null;

    #[ORM\Column(name: 'double_auth_code', type: 'char', length: 6,nullable: true)]
    private ?string $doubleAuthCode = null;

    #[ORM\Column(name: 'remember_me', type: 'boolean', nullable: false)]
    private bool $rememberMe;


    public function __construct(
        string $phone,
        string $password,
        string $ipAddress,
        string $aboutUser,
        string $nickname,
        string $name,
        string $surname,
        string $lastOnline,
        string $smsCode,
        string $doubleAuthCode,
        bool $rememberMe,
    )
    {
        $this->phone = $phone;
        $this->password = $password;
        $this->ipAddress = $ipAddress;
        $this->aboutUser = $aboutUser;
        $this->nickname = $nickname;
        $this->name = $name;
        $this->surname = $surname;
        $this->lastOnline = $lastOnline;
        $this->smsCode = $smsCode;
        $this->doubleAuthCode = $doubleAuthCode;
        $this->rememberMe = $rememberMe;
    }

    public function setPhoneTry(string $phone): void
    {
        if ($phone == null) {
            throw new \DomainException();
        }
        if (gettype($phone) != 'string') {
            throw new InvalidTypeException();
        }
        if ($phone == '') {
            throw new \DomainException('Возможно, вы не ввели номер телефона, проверьте ещё раз');
        }
        if (!preg_match('/^\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}+$/iD', $phone)) {
            throw new \DomainException('Возможно, вы ввели неверный номер телефона. Номер должен начинаться с \'+7\'');
        }
        //Нужно будет разобраться с проверкой на уникальность телефонного номера в базе данных(где проводить и каким способом)

        $this->phone = $phone;
    }

    public function setPasswordTry(string $password, PasswordHasherInterface $passwordHasher): void
    {
        if ($password == null) {
            throw new \DomainException();
        }
        if (gettype($password) != 'string') {
            throw new InvalidTypeException();
        }
        if ($password == '') {
            throw new \DomainException('Возможно, вы не ввели пароль, проверьте ещё раз');
        }
        if (!preg_match('/^[А-яA-z0-9]{8,100}+$/iD', $password)) {
            throw new \DomainException(
                'Возможно, вы ввели недопустимый пароль. Пароль не должен иметь спецсимволов, к примеру: \'_,./\\-=+\' и т.д. 
                Пароль должен иметь минимальную длину в 8 символов, максимальную - 100 символов');
        }

        $hashedPassword = $passwordHasher->hash($password);
        $this->password = $hashedPassword;
    }

    public function setIpAddressTry(string $ipAddress): void
    {
        if ($ipAddress == null) {
            throw new \DomainException();
        }
        if (gettype($ipAddress) != 'string') {
            throw new InvalidTypeException();
        }
        if ($ipAddress == '') {
            throw new \DomainException();
        }
        if (!preg_match('/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)+$/iD', $ipAddress)) {
            throw new \DomainException();
        }

        $this->ipAddress = $ipAddress;
    }

    public function setNameTry(string $name): void
    {
        if ($name == null) {
            throw new \DomainException();
        }
        if (gettype($name) != 'string') {
            throw new InvalidTypeException();
        }
        if ($name == '') {
            throw new \DomainException('Возможно, вы не ввели имя. Попробуйте ещё раз');
        }
        if (!preg_match('/^[А-яA-z0-9]{1,50}+$/iD', $name)) {
            throw new \DomainException('Возможно, вы ввели недопустимое имя. Максимальная длина имени - 50 символов');
        }

        $this->name = $name;
    }

    public function setSurnameTry(string $surname): void
    {
        if ($surname == null) {
            throw new \DomainException();
        }
        if (gettype($surname) != 'string') {
            throw new InvalidTypeException();
        }
        if ($surname == '') {
            throw new \DomainException('Возможно, вы не ввели фамилию. Попробуйте ещё раз');
        }
        if (!preg_match('/^[А-яA-z0-9]{1,50}+$/iD', $surname)) {
            throw new \DomainException('Возможно, вы ввели недопустимую фамилию. Максимальная длина фамилии - 50 символов');
        }

        $this->surname = $surname;
    }

    public function setAboutUserTry(string $aboutUser): void
    {
        if (gettype($aboutUser) != 'string') {
            throw new InvalidTypeException();
        }
        if (!preg_match('/^[А-яA-z0-9]{0,100}+$/iD', $aboutUser)) {
            throw new \DomainException('Максимальная длина информации о себе - 100 символов');
        }

        $this->aboutUser = $aboutUser;
    }

    public function setNicknameTry(string $nickname): void
    {
        if ($nickname == null) {
            throw new \DomainException();
        }
        if (gettype($nickname) != 'string') {
            throw new InvalidTypeException();
        }
        if ($nickname == '') {
            throw new \DomainException('Возможно, вы не ввели свой никнейм. Попробуйте ещё раз');
        }
        if (!preg_match('/^[А-яA-z0-9]{5,30}+$/iD', $nickname)) {
            throw new \DomainException(
                'Возможно, вы ввели недопустимый никнейм. Минимальная длина никнейма 5 символов, максимальная длина никнейма - 30 символов. 
                Никнейм не может содержать спецсимволы, например: \'_,./\\\' и т.д.');
        }

        $this->nickname = $nickname;
    }

    public function setLastOnlineTry(string $lastOnline): void
    {
        if ($lastOnline == null) {
            throw new \DomainException();
        }
        if (gettype($lastOnline) != 'string') {
            throw new InvalidTypeException();
        }
        if ($lastOnline == '') {
            throw new \DomainException();
        }
        if (!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]+$/iD', $lastOnline)) {
            throw new \DomainException();
        }

        $this->lastOnline = $lastOnline;
    }

    public function setSmsCodeTry(string $smsCode): void
    {
        if (gettype($smsCode) != 'string') {
            throw new InvalidTypeException();
        }
        if ($smsCode == '') {
            throw new \DomainException();
        }
        if (!preg_match('/^[0-9]{6}+$/iD', $smsCode)) {
            throw new \DomainException();
        }

        $this->smsCode = $smsCode;
    }

    public function setDoubleAuthCodeTry(string $doubleAuthCode): void
    {
        if (gettype($doubleAuthCode) != 'string') {
            throw new InvalidTypeException();
        }
        if ($doubleAuthCode == '') {
            throw new \DomainException();
        }
        if (!preg_match('/^[0-9]{6}+$/iD', $doubleAuthCode)) {
            throw new \DomainException();
        }

        $this->doubleAuthCode = $doubleAuthCode;
    }

    public function setRememberMeTry(bool $rememberMe): void
    {
        if ($rememberMe == null) {
            throw new \DomainException();
        }
        if (gettype($rememberMe) != 'boolean') {
            throw new InvalidTypeException();
        }
        if ($rememberMe == '') {
            throw new \DomainException();
        }
        if ($rememberMe != true && $rememberMe != false) {
            throw new \DomainException();
        }

        $this->rememberMe = $rememberMe;
    }
}