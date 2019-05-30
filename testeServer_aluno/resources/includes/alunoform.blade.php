<div class="form-group">
	<label for="name">Nome <span style="color: red;">*</span></label>
	<input type="text" required name='name' placeholder="Nome completo" class="form-control" id="name">
	@if($err && array_key_exists('name', $err))
		@foreach($err['name'] as $item)
			<small class="text-danger">{{$item}}</small>
		@endforeach
	@endif
</div>
<div class="row">
	<div class="form-group col-sm-6">
		<label for="phone_a">Telefone / Celular <span style="color: red;">*</span></label>
		<input type="tel" name="phone_a" placeholder="(00) 90000-0000" required class="form-control" id="phone_a">
		@if($err && array_key_exists('phone_a', $err))
			@foreach($err['phone_a'] as $item)
				<small class="text-danger">{{$item}}</small>
			@endforeach
		@endif
	</div>
	<div class="form-group col-sm-6">
		<label for="phone_b">Telefone / Celular</label>
		<input type="tel" name="phone_b" placeholder="(00) 90000-0000" class="form-control" id="phone_b">
		@if($err && array_key_exists('phone_b', $err))
			@foreach($err['phone_b'] as $item)
				<small class="text-danger">{{$item}}</small>
			@endforeach
		@endif
	</div>
</div>
<div class="form-group">
	<label for="email">E-mail <span style="color: red;">*</span></label>
	<input type="email" name="email" required class="form-control" id="email" placeholder="E-mail">
	@if($err && array_key_exists('email', $err))
		@foreach($err['email'] as $item)
			<small class="text-danger">{{$item}}</small>
		@endforeach
	@endif
</div>
<div class="form-group">
	<label for="inputAddress">Endereço <span style="color: red;">*</span></label>
	<input type="text" name="address" required class="form-control" id="inputAddress" placeholder="Endereço">
	@if($err && array_key_exists('address', $err))
		@foreach($err['address'] as $item)
			<small class="text-danger">{{$item}}</small>
		@endforeach
	@endif
</div>
<div class="form-group">
	<label for="inputState">Turno <span style="color: red;">*</span></label>
	<select id="inputState" onchange="change(this)" name="type" class="form-control" required>
		<option selected>Manhã</option>
		<option>Tarde</option>
	</select>
	@if($err && array_key_exists('type', $err))
		@foreach($err['type'] as $item)
			<small class="text-danger">{{$item}}</small>
		@endforeach
	@endif
</div>
{{-- <div class="form-group">
	<label for="turma"><span id="place">CPF</span> <span style="color: red;">*</span></label>
	<input type="text" name="turma" required class="form-control" placeholder="manhã" id="turma">
	@if($err && array_key_exists('turma', $err))
		@foreach($err['turma'] as $item)
			<small class="text-danger">{{$item}}</small>
		@endforeach
	@endif
</div> --}}