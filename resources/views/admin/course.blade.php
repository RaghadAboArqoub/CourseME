@extends('admin.layout')
@section('title')


<h1  class="text-warning" style="padding-left:550px;">Courses</h1>


@endsection
@section('content')
<br><br>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Course table </h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <a class="btn btn-warning text-dark position-absolute end-50" href="{{route('add_course')}}">

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
            </svg>|add course</a>
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="50%">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>

                        <th>Title</th>
                        <th>Description</th>
                        <th>Resourse 1</th>
                        <th>Resourse 2</th>
                        <th>image</th>
                        <th>status</th>
                        <th>Actions</th>
                    </tr>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        @foreach($courses as $row)
                    <tr class="text-center">
                        <td>{{$row->id}}</td>
                        <td>{{$row->title}}</td>
                        <td>{{$row->description}}</td>

                        <td>{{$row->first_resource}}</td>

                        <td>{{$row->second_resource}}</td>

                        <td>
                            <img src="{{asset('images/'.$row->image)}}"  width="100px" height="100px"/>
                        </td>
                        <td>{{$row->status}}</td>

                        <td class="align-left">
                            <a href="{{ route('editCourseView', $row->id) }}" class=" btn btn-primary"> <svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg></a>



                            <form method="POST" action="{{ route('deleteCourse', $row->id) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm"
                                    data-toggle="tooltip" title='Delete'><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-archive-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                                    </svg></button>
                            </form>
                        </td>
                    </tr>

                    @endforeach



                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
('.show_confirm').click(function(event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
            title: `Are you sure you want to delete this record?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
});
</script>
</script>
@endsection