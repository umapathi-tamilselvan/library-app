<!DOCTYPE html>
<html>
<head>
    <title>Book Borrowed</title>
</head>
<body>
    <h1>Book Borrowed Successfully!</h1>
    <p>You have borrowed the book titled "{{ $borrow->book->book_name  }}".</p>
    <p>Borrowed At: {{ $borrow->borrowed_at }}</p>
    <p>Due Date: {{ $borrow->due_date }}</p>
</body>
</html>
