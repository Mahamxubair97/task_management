@extends('layout.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <a class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#add_task">Add Task</a>
            <div class="card text-white">
                <div class="body">
                    @include('tasks.task_table')
                </div>
            </div>
        </div>
    </div>
</div>
@include('tasks.modal')
 
@endsection
@section('page-script')
    <script>
        let tz = Intl.DateTimeFormat().resolvedOptions().timeZone;
        console.log(tz);
        $('input[name=timezone]').val(tz);
        $(function() {
            $('.task-data-table').DataTable({
                processing: true,
                serverSide: true,
                searching: false, 
                paging: false, 
                info: false,
                ajax: '{!! route('task.data') !!}'+'/'+tz,
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'deadline'},
                ]
            });
        });
        flatpickr("#datetime", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today"
            
        });
    </script>
@stop
