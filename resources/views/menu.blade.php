<!-- resources/views/menu.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Food Menu</title>
</head>
<body>
    <h1>Food Menu</h1>
    <ul>
        @foreach($menu as $item => $price)
            <li>
                {{ $item }} - ${{ $price }}
                <form method="POST" action="{{ route('order', $item) }}">
                    @csrf
                    <button type="submit">Order</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>