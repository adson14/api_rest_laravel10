<?php

namespace Tests\Unit;

use App\Http\Controllers\ExpenseController;
use App\Models\Expense;
use App\Repositories\ExpenseRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ExpenseControllerTest extends TestCase
{

    use RefreshDatabase;


    public function test_create()
    {
        //Caminho Feliz

        $data = [
            "description" => "Teste de criação",
            "value" => 17,
            "date_expense" => "2023-06-13"
        ];

        // Criar um mock do repositório de despesas
        $expenseRepository = $this->createMock(ExpenseRepositoryInterface::class);

        // Configurar o mock para retornar a despesa criada
        $expenseRepository->method('new')->willReturn(new Expense($data));

        // Chamar o método de criação de despesa
        $createdExpense = $expenseRepository->new($data);

        // Verificar se a despesa foi criada corretamente
        $this->assertInstanceOf(Expense::class, $createdExpense);
        $this->assertEquals($data['description'], $createdExpense->description);
        $this->assertEquals($data['value'], $createdExpense->value);
        $this->assertEquals($data['date_expense'], $createdExpense->date_expense->toDateString());

        //Caminho Triste
        $expenseRepository = [];
        $expenseRepository = $this->createMock(ExpenseRepositoryInterface::class);
        $expenseRepository->method('new')->willReturn(null);
        $createdExpense = $expenseRepository->new([]);
        $this->assertEmpty($createdExpense);
    }

}
