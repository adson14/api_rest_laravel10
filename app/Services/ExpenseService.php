<?php

namespace App\Services;

class ExpenseService {

    protected $repository;
    public function __construct()
    {

    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id) : \stdClass | null
    {
        return $this->repository->findOne($id);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }

    public function new(string $subject, string $status, string $body): \stdClass | null
    {
        $created = $this->repository->new($subject, $status, $body);
        return $created;
    }

    public function update(string $id, string $subject, string $status, string $body): \stdClass | null
    {
        $created = $this->repository->new($id,$subject, $status, $body);
        return $created;
    }
}
