<?php

namespace Tests\Unit\UseCase\Category;

use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;
use Mockery;
use PHPUnit\Framework\TestCase;
use stdClass;

class CreateCategoryUseCaseUnitTest extends TestCase
{
    public function testCreateNewCategory() 
    {
        $CategoryId = '1';
        $categoryName = 'Category Name';

        $mockEntity = Mockery::mock(Category::class, [$CategoryId,  $categoryName ]);
        $mockRepository = Mockery::mock(stdClass::class, CategoryRepositoryInterface::class);

        $this->$mockRepository->shouldReceive('insert')->andReturn($mockEntity);

        $useCase = new CreateCategoryUseCase($mockRepository);

        $useCase->execute();
    }
}