<!--Mensagens de erro dos campos -->
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif


<!--Mensagens de cadastro-->
@if(Session::has('status'))
    <div id="msg-suc" class="custom-alerts alert alert-success fade in">
        {{Session::get('status')}}
    </div>
@endif

@if(Session::has('msgerror'))
    <div id="msg-suc" class="custom-alerts alert alert-danger fade in">
        {{Session::get('msgerror')}}
    </div>
@endif
