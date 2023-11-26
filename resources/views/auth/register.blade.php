<div>

    @if(session('success'))
        <p>{{session('success')}}</p>
    @elseif(session('fail'))
        <p>{{session('fail')}}</p>
    @endif

    <form action="/register/validate" method="post">
        @csrf
        <input type="text" name="name"><br>
        <input type="email" name="email"><br>
        <input type="password" name="password"><br>
        <button>Register</button>
    </form>

</div>