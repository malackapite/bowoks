<form action="/api/book" method="post">
    {{csrf_field()}}
    <input type="text" name="author" placeholder="Author">
    <input type="text" name="title" placeholder="Title">
    <input type="number" name="pieces" placeholder="Pieces">
    <input type="submit" value="Ok">
</form>