<?php

namespace Tests\Unit;

use App\Http\Controllers\ExpenseController;
use PHPUnit\Framework\TestCase;


class ExpenseControllerTest extends TestCase
{
    public function test_attributes()
    {
        $expense = new ExpenseController(
            descricao: "Primeira Despesa"
        );



        $this->assertTrue(true);
    }
}
