@extends('layout.app', ['title' => 'Lista de CEPs'])

@section('page')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="panel panel-primary" style="margin: 50px;">
        <div class="panel-heading">
            <h3 class="panel-title">Gerenciamento de Endereços</h3>
        </div>
        <div class="panel-body">
            <div style="width: 100%;">
                <div class="table-responsive">
                    <table id="addresses" class="table table-striped table-hover table-bordered dt-responsive">
                        <thead>
                            <tr>
                                <th>CEP</th>
                                <th>Endereço</th>
                                <th>Complemento</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>IBGE</th>
                                <th>GIA</th>
                                <th>DDD</th>
                                <th>SIAFI</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($addresses as $address)
                                <tr>
                                    <td>{{ $address->cep }}</td>
                                    <td>{{ $address->address }}</td>
                                    <td>{{ $address->complement }}</td>
                                    <td>{{ $address->neighborhood }}</td>
                                    <td>{{ $address->city }}</td>
                                    <td>{{ $address->state }}</td>
                                    <td>{{ $address->ibge }}</td>
                                    <td>{{ $address->gia }}</td>
                                    <td>{{ $address->ddd }}</td>
                                    <td>{{ $address->siafi }}</td>
                                    <td>
                                        <a href="{{ route('show', $address->cep) }}"><i class="fas fa-edit"></i></a>
                                        <a class="text-danger" href="{{ route('destroy', $address->cep) }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('/modules/datatables.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            revendamais.datatables.display('#addresses');
        } );
    </script>
@endsection