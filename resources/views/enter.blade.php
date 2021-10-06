@extends('index')

@section('body')
 <div class="conteiner"
	<div class="registration-cssave">
    <form method="POST" action='enter' >
	@csrf
        <h3 class="text-center">Вход</h3>
       <div class="form-group">
            <input class="form-control item" type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input class="form-control item" type="password" name="password" minlength="6" id="password" placeholder="Пароль" required>
        </div>
        
        <div class="form-group">
            <button  class="btn btn-primary btn-block create-account" type="submit">Вход</button>
        </div>
		
		<div class="form-group">
            <button onclick="reg('registration')" class="btn btn-primary btn-block create-account" type="submit">Регистрация</button>
        </div>
		
		
		{{$name}}
    </form>
	
	 <a href='/list'> Список </a>
</div>	
</div>	
@endsection
