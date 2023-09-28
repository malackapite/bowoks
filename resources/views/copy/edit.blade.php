<form action="/api/copy/{{$copy->copy_id}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <select name="user_id">
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
        <select name="book_id">
        @foreach ($books as $book)
            <option value="{{$book->book_id}}">{{$book->title}}</option>
        @endforeach
        </select>
        <input type="submit" value="Ok">
</form>