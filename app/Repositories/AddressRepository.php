<?php

namespace App\Repositories;

use App\Models\Address;
use App\Repositories\Contracts\AddressRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AddressRepository implements AddressRepositoryInterface
{
    private Address $model;

    public function __construct(Address $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function create(array $data): Address
    {
        return $this->model->create($data);
    }

    public function update(array $data, Address $address): bool
    {
        return $address->update($data);
    }

    public function destroy(Address $address): bool
    {
        return $address->delete();
    }
}