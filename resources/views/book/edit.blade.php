<form action="/api/book/{{$book->book_id}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="text" name="author" placeholder="Author" value="{{$book->author}}">
        <input type="text" name="title" placeholder="Title" value="{{$book->title}}">
        <input type="number" name="pieces" placeholder="Pieces" value="{{$book->pieces}}">
        <input type="submit" value="Ok">
</form>