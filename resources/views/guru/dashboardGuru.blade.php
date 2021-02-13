@extends('shared.app')

@section('title', 'Dashboard Guru')

@push('myJS')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endpush

@if(\Session::has('success'))
    @push('myJS')
        <script type="text/javascript">
            function alert(){
                Swal.fire({
                    icon: 'success',
                    title: 'Yay',
                    text: '{{ \Session::get('success') }}'
                });
            }
            alert();
        </script>
    @endpush
@endif
