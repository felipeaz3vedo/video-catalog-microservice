<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;
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

        $this->assertEquals('Category Test', $category->name);
        $this->assertEquals('Desctiption test', $category->description);
        $this->assertTrue($category->isActive);
        
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
        $uuid = 'uuid.value';
        
        $category = new Category(
            id: $uuid,
            name: 'Category Test',
            description: 'Desctiption test',
            isActive: true
        );

        $category->update(
            name: 'Updated name',
            description: 'Updated description'
        );

        $this->assertEquals('Updated name', $category->name);
        $this->assertEquals('Updated description', $category->description);
    }

    public function testExceptionName() 
    {
        try {
            $category = new Category(
                name: 'Ca',
                description: 'Desctiption test',
            );

            $this->assertTrue(false);
            
        } catch(Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }
}
