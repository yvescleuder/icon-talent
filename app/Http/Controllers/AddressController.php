<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressStoreRequest;
use App\Http\Requests\AddressUpdateRequest;
use App\Models\Address;
use App\Services\AddressService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AddressController extends Controller
{
    private AddressService $addressService;

    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }

    /**
     * Lista os endereços que estão cadastrados
     *
     * @return View
     */
    public function index()
    {
        $addresses = $this->addressService->all();

        return view(
            'address.index',
            [
                'addresses' => $addresses
            ]
        );
    }

    /**
     * Validação do CEP e cadastro, caso tenha sucesso, redireciona o usuário para a edição do CEP
     *
     * @param AddressStoreRequest $request
     * @return JsonResponse|RedirectResponse
     */
    public function store(AddressStoreRequest $request)
    {
        try {
            $addressAPI = $this->addressService->getAddress($request->input('cep'));
            $address    = $this->addressService->create($addressAPI);

            return redirect()->route('show', $address->cep);
        } catch (NotFoundHttpException | BadRequestHttpException $exception) {
            return back()->withInput()->withErrors([$exception->getMessage()]);
        } catch (\Throwable $throwable) {
            return back()->withInput()->withErrors(['Erro interno ao cadastrar o endereço.']);
        }
    }

    /**
     * Visualizar um determinado endereço
     *
     * @param Address $address
     * @return View
     */
    public function show(Address $address)
    {
        return view(
            'address.show',
            [
                'address' => $address
            ]
        );
    }

    /**
     * Validação os dados do endereço e atualiza os dados
     *
     * @param AddressUpdateRequest $request
     * @param Address $address
     * @return RedirectResponse
     */
    public function update(AddressUpdateRequest $request, Address $address)
    {
        try {
            $this->addressService->update($request->validated(), $address);

            return redirect()->route('index')->withSuccess('Endereço atualizado com sucesso!');
        } catch (\Throwable $throwable) {
            return redirect()->route('index')->withErrors(['Erro interno ao cadastrar o endereço.']);
        }
    }

    /**
     * Deleta um endereço
     *
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        try {
            $this->addressService->destroy($address);

            return redirect()->route('index')->withSuccess('Endereço deletado com sucesso!');
        } catch (\Throwable $throwable) {
            return redirect()->route('index')->withErrors(['Erro interno ao cadastrar o endereço.']);
        }
    }
}
