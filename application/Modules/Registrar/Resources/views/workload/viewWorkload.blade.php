@extends('registrar::layouts.backend')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<link rel="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<link rel="https://cdn.datatables.net/rowgroup/1.2.0/css/rowGroup.dataTables.min.css">

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

@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-0">
                <div class="flex-grow-0">
                    <h5 class="h5 fw-bold mb-0">
                         WORKLOAD
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Department</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Workloads
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="block block-rounded">

        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-12">
                        <table id="example" class="table table-bordered table-striped fs-sm">
                            <thead>
                                <th>#</th>
                                <th>staff number</th>
                                <th>staff name</th>
                                <th>qualification</th>
                                <th>role</th>
                                <th>class code</th>
                                <th>load</th>
                                <th>stds</th>
                                <th>unit code</th>
                                <th>unit name</th>
                                <th>level</th>
                            </thead>
                            <tbody>                               

                                @foreach($workloads as $lec => $workload)
                                {{-- {{ $lec }} --}}
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td>
                                            @foreach($lecturers as $lecturer)
                                                @if($lecturer->id == $lec)
                                                    {{ $lecturer->staff_number }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($lecturers as $lecturer)
                                                @if($lecturer->id == $lec)
                                                {{ $lecturer->title }}. {{ $lecturer->last_name }} {{ $lecturer->first_name }} {{ $lecturer->middle_name }}
                                                @endif
                                             @endforeach
                                        </td>
                                        <td>
                                            BTIT, MsIT, PhD
                                        </td>
                                        <td>
                                            @foreach($lecturers as $lecturer)
                                                @if($lecturer->id == $lec)
                                                    @foreach($lecturer->roles as $role)
                                                        <p>{{ $role->name }}</p>
                                                    @endforeach
                                                @endif
                                             @endforeach
                                        </td>
                                        <td nowrap="">
                                            @foreach($workload as $class)
                                                <p>{{ $class->class_code }}</p>
                                            @endforeach
                                        </td>
        
                                        <td>
                                            @foreach($workload as $class)
                                                <p>FT</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($workload as $class)
                                                <p>50</p>
                                            @endforeach
                                        </td>
                                        <td nowrap="">
                                            @foreach($workload as $class)
                                                <p>{{ $class->workloadUnit->unit_code }}</p>
                                            @endforeach
                                        </td>
                                        <td nowrap="">
                                            @foreach($workload as $class)
                                                <p>{{ $class->workloadUnit->unit_name }}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($workload as $class)
                                                <p>4</p>
                                            @endforeach
                                        </td>
                                    </tr>                               
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <!-- Dynamic Table Responsive -->
    </div>
@endsection