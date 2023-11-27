<div>
    <h1>Newest Post</h1>
    {{$posts}}
    @foreach ($posts as $p)
        <p>{{$p->title}} by {{$p->user->name}} at {{$p->created_at->format('D, d M Y')}}</p>
    @endforeach
</div>