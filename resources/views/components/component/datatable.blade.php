@props(['id'])

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script>
        let table = new DataTable('#{{ $id }}', {
            sort: false,
            paging: false
        });
    </script>
@endpush

<table id="{{ $id }}" class="display">
    {{ $slot }}
</table>
