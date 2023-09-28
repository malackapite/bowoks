<form action="/api/copy" method="post">
    {{csrf_field()}}
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