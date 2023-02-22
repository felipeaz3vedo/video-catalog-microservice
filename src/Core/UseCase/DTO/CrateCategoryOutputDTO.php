<?php

namespace Core\UseCase\DTO;

class CreateCategoryOutputDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description = '',
        public bool $isActive = true
    ) 
    {}
}