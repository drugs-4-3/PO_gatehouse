<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>System zarządzania kluczami "Gatehouse"</title>
    <meta name="description" content="System zarządzania kluczami">
    <meta name="author" content="Michał Ściubidło">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/gatehouse/main_layout.css')}}">
</head>

<body>

    @include("partials/navbar")

    <!-- display flash messages from session -->
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
            @endif
        @endforeach
    </div>

    <div class="my-class">
        @section("content")
            <h1><strong>System zarządzania kluczami PWr</strong></h1>
        @show
    </div>

<!-- scripts here-->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

@section('scripts')
@endsection

</body>
</html>