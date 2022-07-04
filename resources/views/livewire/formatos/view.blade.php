@section('title', __('Formatos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
						<div class="float-left">
							<h4><i class="fas  text-danger"></i>
							<strong>Listado Formatos </strong> </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Formatos">
						</div>
						<div class="btn btn-sm " style="background-color: chocolate"data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir Formatos
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.formatos.create')
						@include('livewire.formatos.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Formato</th>
								<td>Opciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($formatos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->for_nombre }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-danger btn-sm "style="background-color: chocolate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Confirma Eliminar Formato id {{$row->id}}? \nUna vez eliminado el Formato no se puede recuperar!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $formatos->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>