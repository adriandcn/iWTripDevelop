@extends('front.masterPageWelcome')

@section('contentRegistro')

<div class="testbox">
    <h1>Registration </h1>


    {!! Form::open(['url' => 'auth/register', 'method' => 'post', 'role' => 'form','id' => 'registro']) !!}	
    <hr>
    <div class="accounttype">
        <input type="radio" value="None" id="radioOne" name="account" checked/>
        <label for="radioOne" class="radio" chec>Personal</label>
        <input type="radio" value="None" id="radioTwo" name="account" />
        <label for="radioTwo" class="radio">Company</label>
    </div>
    <hr>
    <label id="icon" for="name"><i class="icon-envelope "></i></label>

    <input type="text" id="email" name="email" placeholder="Email">

    <label id="icon" for="name"><i class="icon-user"></i></label>

    <input type="text" id="email" name="username" placeholder="{{trans('front/register.pseudo')}}">

    <label id="icon" for="name"><i class="icon-shield"></i></label>

    <input type="password" id="password" name="password" placeholder="{{trans('front/register.password')}}">
    

    
    @if($errors->has())
    @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
    @endif

    <p>By clicking Register, you agree on our <a  href="#" onclick="window.location.href = '{!!asset('/terminos')!!}'">terms and condition</a>.</p>

    <a href="#" class="button" onclick="$(this).closest('form').submit()">{!! (trans('front/form.send')) !!}</a>
</form>{!! Form::close() !!}
</div>





<div class="row">

    <br>

</div>
<br>
<div class="row">	

</div>

<div class="row">	

</div>



</div>
</div>
</div>
@stop

@section('scripts')

<script>
    $(function () {
        $('.badge').popover();
    });
</script>

@stop

