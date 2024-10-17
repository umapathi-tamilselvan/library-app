<!DOCTYPE html>
<html>
<head>
    <title>Book Returned</title>
</head>
<body>
    <h1>Book Returned Successfully!</h1>
    <p>You have returned the book titled "{{ $borrow->book->book_name }}".</p>
    <p>Returned At: {{ $borrow->returned_at }}</p>
</body>
</html>
