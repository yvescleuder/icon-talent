<?php

namespace App\Repositories\Contracts;

use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;

interface AddressRepositoryInterface
{
    public function all(): Collection;

    public function create(array $data): Address;

    public function update(array $data, Address $address): bool;

    public function destroy(Address $address): bool;
}