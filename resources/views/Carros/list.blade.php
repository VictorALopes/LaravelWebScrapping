<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<!-- Latest compiled JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Lista
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <?php
                    if (empty($carros[0])) {
                        echo "<p>Nenhum carro cadastrado.</p>";
                    }
                    ?>
                    <div class="container-fluid">
                    @foreach($carros as $carro)
                     <!-- <table>
                        <thead>
                          <tr><th>#{{$carro->id}}</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Nome do veículo:</th>
                                <td>{{$carro->nome_veiculo}}</td>
                            </tr>
                        </tbody>
                    </table>  -->

                    <!-- 
                        Apresentação em bootstrap
                    -->
                        <table class="table table-bordered">
                        <thead>
                          <tr><th>#{{$carro->id}}</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="row">
                    	        	    <div class="col-md-3">Nome do Veículo:</div>
                    	        	    <div class="col-md-7">{{$carro->nome_veiculo}}</div>
                    	        	    <form action="delete/{{$carro->id}}" method="delete">
                                        @csrf
                                        @method('delete')
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-danger btn-sm">
			                                    	Excluir
			                                    </button>
                    	        	        </div>
                                        </form>
                    	            </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="row">
                    	            	<div class="col-md-3">Link:</div>
                    	            	<div class="col-md-9">{{$carro->link}}</div>
                    	            </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="row">
                    	    	        <div class="col-md-3">Ano:</div>
                    	    	        <div class="col-md-9">{{$carro->ano}}</div>
                    	            </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="row">
                    	    	        <div class="col-md-3">Combustível:</div>
                    	    	        <div class="col-md-9">{{$carro->combustivel}}</div>
                    	            </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="row">
                    	    	        <div class="col-md-3">Portas:</div>
                    	    	        <div class="col-md-9">{{$carro->portas}}</div>
                    	            </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="row">
                    	    	        <div class="col-md-3">Quilometragem:</div>
                    	    	        <div class="col-md-9">{{$carro->quilometragem}}</div>
                    	            </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="row">
                    	    	        <div class="col-md-3">Cambio:</div>
                    	    	        <div class="col-md-9">{{$carro->cambio}}</div>
                    	            </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="row">
                    	    	        <div class="col-md-3">Cor:</div>
                    	    	        <div class="col-md-9">{{$carro->cor}}</div>
                    	            </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
