@foreach ($copies as $copy)
    <form action="/api/copy/{{$copy->copy_id}}" method="post">
        {{csrf_field()}}
        {{method_field("GET")}}
        <div>
            <input type="submit" value="{{$copy->user->name}}">
            <input type="submit" value="{{$copy->book->title}}">
        </div>
    </form>
@endforeach