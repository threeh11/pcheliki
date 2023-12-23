<?php

final class DtoRequestDefault
{

    //Тут наши поля и маппинг их на дтошку array -> dto
    public function __construct(
        public string $default1,
        public string $default2,
        public string $default3,
    ) {}


}