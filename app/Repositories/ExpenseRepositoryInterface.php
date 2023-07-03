<?php

namespace App\Repositories;

use App\Models\Expense;

interface ExpenseRepositoryInterface
{
    public function new(array $data): Expense | null;

    public function update(Expense $expense, array $data): ?Expense;

    public function delete(Expense $expense): void;

    public function findOne(int $id): ?Expense;

    public function getAll(): array;
}
