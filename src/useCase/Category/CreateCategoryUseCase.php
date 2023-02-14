<?php

namespace Core\UseCase\Category;

use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;

class CreateCategoryUseCase
{
    protected CategoryRepositoryInterface $repository;

    protected Category $category;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        $category = new Category(name: 'Felipe');

        $this->repository->insert($category);
    }
}