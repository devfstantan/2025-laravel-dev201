<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Hello DEV201</h1>
    <form action="/login" method="post">
        @csrf
        <input type="text" name="username">
        <input type="password" name="password">
        <input type="submit" value="Login">
    </form>

    {{-- Links using url --}}
    <h3>Links using url</h3>
    <a href="{{url('/')}}">Home</a>
    <a href="{{url("/product/123")}}">Product 123</a>

     {{-- Links route name --}}
     <h3>Links using route name</h3>
     <a href="{{route('home')}}">Home</a>
     <a href="{{route('product.byid',["id" => 123])}}">Product 123</a>
</body>

</html>
