@extends('dean::layouts.backend')
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
                        Application Submission
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Application</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Batch submission
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <form action="{{ route('dean.batchSubmit') }}" method="post">
                @csrf
                    <table id="example" class="table table-responsive-sm table-bordered table-striped js-dataTable-responsive fs-sm">
                        @if(count($apps)>0)
                            <thead>
                            <th>✔</th>
                            <th>Applicant Name</th>
                            <th>Course Name</th>
                            <th>Department </th>
                            <th>COD</th>
                            <th>Dean</th>
                            </thead>
                            <tbody>
                            @foreach($apps as $app)
                                <tr>
                                    <td>
                                        @if($app->registrar_status === null || 4)
                                           <input class="batch" type="checkbox" name="submit[]" value="{{ $app->id }}" required>
                                              @else
                                                 ✔
                                        @endif
                                    </td>
                                    <td> {{ $app->applicant->sname }} {{ $app->applicant->fname }} {{ $app->applicant->mname }}</td>
                                    <td> {{ $app->courses->getCourseDept->name }}</td>
                                    <td> {{ $app->courses->course_name }}</td>
                                    <td>
                                        @if($app->cod_status === 0)
                                            <span class="badge bg-primary">Awaiting</span>
                                        @elseif($app->cod_status === 1)
                                            <span class="badge bg-success">Accepted</span>
                                        @elseif($app->cod_status === 2)
                                            <span class="badge bg-warning">Rejected</span>
                                        @else
                                            <span class="badge bg-primary">Awaiting</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($app->dean_status === 0)
                                            <span class="badge bg-primary">Awaiting</span>
                                        @elseif($app->dean_status === 1)
                                            <span class="badge bg-success">Accepted</span>
                                        @elseif($app->dean_status === 2)
                                            <span class="badge bg-warning">Rejected</span>
                                        @else
                                            <span class="badge bg-primary">Awaiting</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @else
                            <tr>
                                <span class="text-muted text-center fs-sm">There are no applications awaiting batch submission</span>
                            </tr>
                        @endif
                    </table>
                    @if(count($apps)>0)
                        <div>
                            <input type="checkbox" onclick="for(c in document.getElementsByClassName('batch')) document.getElementsByClassName('batch').item(c).checked = this.checked"> Select all
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-sm btn-alt-primary" data-toggle="click-ripple">Submit batch</button>
                        </div>
                        @endif
                        </form>
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
            order: [[2, 'asc']],
            rowGroup: {
                dataSrc: 2
            }
        } );
    } );
</script>
