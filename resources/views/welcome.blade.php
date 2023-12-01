@include('layouts.navbar')
@include('layouts.sidebar')

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ isset($titulo) ? 'Sala Master | ' . $titulo : 'Sala Master' }}</title>
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('img/favicon.ico') }}" />

    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/util.js') }}"></script>
    <script src="{{ asset('js/util.js') }}"></script>
    <script src="{{ asset('js/util.js') }}"></script>
    <script src="{{ asset('bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/page/datatables.js') }}"></script>
    <script src="{{ asset('bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('bundles/datatables/datatables.min.js') }}"></script>


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


