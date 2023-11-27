<div>
    <form action="/post/create" method="post">
        @csrf
        <input type="text" name="title"><br>
        <textarea name="content" cols="30" rows="10"></textarea>
        <button>Create</button>
    </form>
</div>