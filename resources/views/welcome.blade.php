@include('layouts.navbar')
@include('layouts.sidebar')

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ isset($titulo) ? 'VALHALLA | ' . $titulo : 'GRUPO VALHALLA SUPLEMENTOS' }}</title>
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('img/favicon.ico') }}' />

    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/util.js') }}"></script>

    @if(isset($scripts))
        @foreach($scripts as $script)
            <script src="{{ asset(''.$script) }}"></script>
        @endforeach
    @endif

<!-- Custom JS File -->
<script src="{{ asset('js/custom.js') }}"></script>

<script>
    $('.delete').on("click", function(event) {
        event.preventDefault();
        var choice = confirm($(this).attr('data-confirm'));
        if (choice) {
            window.location.href = $(this).attr('href');
        }
    });
</script>
</head>


