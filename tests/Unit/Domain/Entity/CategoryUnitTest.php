<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Throwable;


class CategoryUnitTest extends TestCase
{
    public function testAttributes()
    {
        $category = new Category(
            name: 'Category Test',
            description: 'Desctiption test',
            isActive: true
        );

        $this->assertNotEmpty('Category Test', $category->id());
        $this->assertEquals('Category Test', $category->name);
        $this->assertEquals('Desctiption test', $category->description);
        $this->assertTrue($category->isActive);
        $this->assertNotEmpty($category->createdAt());
        
    }

    public function testActivated()
    {
        $category = new Category(
            name: 'Category test',
            isActive: false
        );

        $this->assertFalse($category->isActive);

        $category->activate();

        $this->assertTrue($category->isActive);
    }

    public function testDisable()
    {
        $category = new Category(
            name: 'Category test',
        );

        $this->assertTrue($category->isActive);

        $category->disable();

        $this->assertFalse($category->isActive);
    }

    public function testUpdate()
    {
        $uuid = Uuid::uuid4()->toString();
        
        $category = new Category(
            id: $uuid,
            name: 'Category Test',
            description: 'Desctiption test',
            isActive: true,
            createdAt: '2023-01-01 12:12:12'
        );

        $category->update(
            name: 'Updated name',
            description: 'Updated description'
        );

        $this->assertEquals($uuid, $category->id());  
        $this->assertEquals('Updated name', $category->name);
        $this->assertEquals('Updated description', $category->description);
    }

    public function testExceptionName() 
    {
        try {
            new Category(
                name: 'C',
                description: 'Desctiption test',
            );

            $this->assertTrue(false);
            
        } catch(Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }

    public function testExceptionDescription() 
    {
        try {
            new Category(
                name: 'Category test',
                description: random_bytes(256),
            );

            $this->assertTrue(false);
            
        } catch(Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }
}
