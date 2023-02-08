<?php

namespace Testes\Unit;

use PHPUnit\Framework\TestCase;
use Core\Teste;

class TesteUnitTest extends TestCase
{
    public function test_call_method_full()
    {
        $teste = new Teste();
        $response = $teste->foo();

        $this->assertEquals('123', $response);
    }
}