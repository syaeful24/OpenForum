<div>
    Logged in as {{$user->name}}
</div>

<div>
    <h1>Your Post</h1>
    @foreach ($posts as $post)
    <div>
        <h3>{{$post->title}}</h3>
        <p>{{$post->content}}</p>
        <h6>{{$post->created_at}}</h6>
    </div> 
    @endforeach
</div>

