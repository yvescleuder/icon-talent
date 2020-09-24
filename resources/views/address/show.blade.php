@extends('layout.app', ['title' => "CEP: $address->cep"])

@section('page')
    <h1>CEP: {{ $address->cep }}</h1>
    <form method="POST" action="{{ route('update', $address->cep) }}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="address">Logradouro</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ old('address') ?? $address->address }}">
                    @if($errors->has('address'))
                        <small class="text-danger">{{ $errors->first() }}</small>
                    @endif
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="complement">Complemento</label>
                    <input type="text" class="form-control" name="complement" id="complement" value="{{ old('complement') ?? $address->complement }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="neighborhood">Bairro</label>
                    <input type="text" class="form-control" name="neighborhood" id="neighborhood" value="{{ old('neighborhood') ?? $address->neighborhood }}">
                    @if($errors->has('neighborhood'))
                        <small class="text-danger">{{ $errors->first() }}</small>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="city">Cidade</label>
                    <input type="text" class="form-control" name="city" id="city" value="{{ old('city') ?? $address->city }}">
                    @if($errors->has('address'))
                        <small class="text-danger">{{ $errors->first() }}</small>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="state">Estado</label>
                    <input type="text" class="form-control" name="state" id="state" value="{{ old('state') ?? $address->state }}">
                    @if($errors->has('state'))
                        <small class="text-danger">{{ $errors->first() }}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="ibge">IBGE</label>
                    <input type="text" class="form-control" name="ibge" id="ibge" value="{{ old('ibge') ?? $address->ibge }}">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="gia">GIA</label>
                    <input type="text" class="form-control" name="gia" id="gia" value="{{ old('gia') ?? $address->gia }}">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="ddd">DDD</label>
                    <input type="text" class="form-control" name="ddd" id="ddd" value="{{ old('ddd') ?? $address->ddd }}">
                    @if($errors->has('ddd'))
                        <small class="text-danger">{{ $errors->first() }}</small>
                    @endif
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="siafi">SIAFI</label>
                    <input type="text" class="form-control" name="siafi" id="siafi" value="{{ old('siafi') ?? $address->siafi }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Salvar alterações</button>
        <a href="{{ route('destroy', $address->cep) }}" class="btn btn-danger">Deletar</a>
    </form>
@endsection