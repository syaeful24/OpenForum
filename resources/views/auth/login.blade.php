<div>
    <form action="/login/validate" method="post">
        @csrf
        <input type="email" name="email"><br>
        <input type="password" name="password"><br>
        <button>Login</button>
    </form>
</div>