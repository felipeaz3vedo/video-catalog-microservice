<?php

namespace Tests\Unit\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;
use PHPUnit\Framework\TestCase;
use Throwable;

class DomainValidationUnitTest extends TestCase
{
    public function testNotNull()
    {
        try {
            $value = '';
            DomainValidation::notNull($value);

            $this->assertTrue(false);
        } catch(Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }

    public function testNotNullCustomException()
    {
        try {
            $value = '';
            $exceptionMessage = 'Custom exception message test';
            
            DomainValidation::notNull($value, $exceptionMessage);

            $this->assertTrue(false);
        } catch(Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th, $exceptionMessage);
        }
    }

    public function testStrMaxLength()
    {
        try {
            $value = 'Testes';
            $exceptionMessage = 'Custom exception message test';

            DomainValidation::strMaxLength($value, 5, $exceptionMessage);

            $this->assertTrue(false);
        } catch(Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th, $exceptionMessage);
        }
    }

    public function testStrMinLength()
    {
        try {
            $value = 'Test';
            $exceptionMessage = 'Custom exception message test';

            DomainValidation::strMinLength($value, 5, $exceptionMessage);

            $this->assertTrue(false);
        } catch(Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th, $exceptionMessage);
        }
    }

    public function testStrNullAndMaxLenght() 
    {
        try {
            $value = 'Value example';
            $exceptionMessage = 'Custom exception message test';

            DomainValidation::strCanNullAndMaxLenght($value, 3, $exceptionMessage);

            $this->assertTrue(false);

        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th, $exceptionMessage);
        }
    }
}