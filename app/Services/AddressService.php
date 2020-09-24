<?php

namespace App\Services;

use App\Models\Address;
use App\Repositories\Contracts\AddressRepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AddressService
{
    private AddressRepositoryInterface $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    /**
     * Serviço responsável por buscar todos os endereços cadastrados
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->addressRepository->all();
    }

    /**
     * Serviço responsável por criar um endereço
     *
     * @param array $data
     * @return Address
     */
    public function create(array $data): Address
    {
        return $this->addressRepository->create($data);
    }

    /**
     * Serviço responsável por atualizar um endereço já cadastrado
     *
     * @param array $data
     * @param Address $address
     * @return bool
     */
    public function update(array $data, Address $address): bool
    {
        return $this->addressRepository->update($data, $address);
    }

    /**
     * Serviço responsável por deletado um endereço cadastrado
     *
     * @param Address $address
     * @return bool
     */
    public function destroy(Address $address): bool
    {
        return $this->addressRepository->destroy($address);
    }

    /**
     * Busca endereço da API ViaCEP através do CEP
     *
     * @param int $cep
     * @return array
     * @throws GuzzleException
     */
    public function getAddress(int $cep): array
    {
        $client   = new Client();
        $response = $client->request('GET', "https://viacep.com.br/ws/$cep/json/");
        if ($response->getStatusCode() === 200) {
            $address = json_decode($response->getBody(), true);

            if (isset($address['erro'])) {
                throw new NotFoundHttpException('Esse CEP não existe.');
            }

            $address['cep']          = Str::replaceArray('-', [''], $address['cep']);
            $address['address']      = $address['logradouro'];
            $address['neighborhood'] = $address['bairro'];
            $address['city']         = $address['localidade'];
            $address['state']        = $address['uf'];
            $address['complement']   = $address['complemento'] !== '' ? $address['complemento'] : null;
            $address['ibge']         = $address['ibge'] !== '' ? $address['ibge'] : null;
            $address['gia']          = $address['gia'] !== '' ? $address['gia'] : null;
            $address['siafi']        = $address['siafi'] !== '' ? $address['siafi'] : null;

            unset($address['logradouro']);
            unset($address['complemento']);
            unset($address['bairro']);
            unset($address['localidade']);
            unset($address['uf']);

            return $address;
        } else {
            throw new BadRequestHttpException('Esse CEP não existe.');
        }
    }
}