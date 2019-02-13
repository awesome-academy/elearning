<header>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">FOES</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="/course" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Lang::get('label.course') }}</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/course">Action</a>
            <a class="dropdown-item" href="/discussion">{{ Lang::get('label.discussion') }}</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Lang::get('label.programs_&_degrees') }}</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
    </ul>  

   
    {!! Form::open(['class' => 'form-inline my-2 my-lg-0', 'url'=>'search']) !!}
    <div class="input-group mb-2">
    {!! Form::text('key', '' , ['class' => 'form-control col-md-12','placeholder' =>  'key']) !!}
    <div class="input-group-append">
    {!! Form::button('<span class="fa fa-search"></span>', ['class' => 'btn btn-outline-secondary']) !!} 
    </div>
    </div>
    {!! Form::close() !!}

    </div>
</nav>
</div>
</header>

 <script>
$(document).ready(function()
{
    $('#key').keyup(function()
    {
        var key = $(this).val(); 
        if(key >= 3) 
        {
            var _token = $('input[name="_token"]').val(); 
            url:"{{ route('search') }}", 
            method:"POST", .
            data:{key:key, _token:_token},
            success:function(data)
            { 
            $('#list').fadeIn();  
            $('#list').html(data); 
            }
        }
    }
}
</script>

