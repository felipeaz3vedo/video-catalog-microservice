<?php

namespace Core\UseCase\Category;

use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\DTO\CreateCategoryInputDTO;
use Core\UseCase\DTO\CreateCategoryOutputDTO;

class CreateCategoryUseCase
{
    public function __construct(protected CategoryRepositoryInterface $repository)
    {}

    public function execute(CreateCategoryInputDTO $input) : CreateCategoryOutputDTO
    {
        $category = new Category(
            name: $input->name,
            description: $input->description,
            isActive: $input->isActive
        );

        $newCategory = $this->repository->insert($category);

        return new CreateCategoryOutputDTO(
            id: $newCategory->id(),
            name: $newCategory->name,
            description: $newCategory->description,
            isActive: $newCategory->isActive
        );
    }
}