<html>
<head>
    <title>Laravel Sample - @yield('title')</title>
</head>
<body>
@section('sidebar')
ここがメインのサイドバー
@show

<div class="container">
    @yield('content')
</div>
</body>
</html>
