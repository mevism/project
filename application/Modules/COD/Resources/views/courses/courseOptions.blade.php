@extends('cod::layouts.backend')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.2.0/css/rowGroup.dataTables.min.css">

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-0">
                <div class="flex-grow-0">
                    <h5 class="h5 fw-bold mb-0">
                        Courses
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Course</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Course Options
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-end ">
                        <a class="btn btn-sm btn-alt-primary m-2" href="{{ route('department.addCourseOption', $course->course_id) }}"> <i class="fa fa-plus"></i> add option </a>
                    </div>
                    <table id="example" class="table table-responsive table-sm table-striped table-bordered fs-sm">
                        <thead>
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Course Option Name</th>
                        <th>Course Option code</th>
{{--                        <th>Status</th>--}}
                         <th> Action </th>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $course->CourseOption->course_name }} </td>
                                <td> {{ $course->option_name }}</td>
                                <td> {{ $course->option_code }}</td>
{{--                                <td> @if($course->deleted_at == null) Active @else Disabled @endif</td>--}}
                                <td>
                                    <a class="btn btn-sm btn-alt-primary" href="{{ route('department.editCourseOption', $course->option_id) }}"> Edit </a>
{{--                                    <a class="btn btn-sm btn-alt-info" href="#"> Amend </a>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.2.0/js/dataTables.rowGroup.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            responsive: true,
            order: [[0, 'asc']],
            rowGroup: {
                dataSrc: 2
            }
        } );
    } );
</script>
