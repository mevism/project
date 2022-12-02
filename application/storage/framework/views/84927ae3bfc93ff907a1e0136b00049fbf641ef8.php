<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.2.0/css/rowGroup.dataTables.min.css">

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

<?php $__env->startSection('content'); ?>
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-0">
            <div class="flex-grow-1">
                <h5 class="h5 fw-bold mb-0">
                    ACADEMIC  YEARS
                </h5>
            </div>
            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="javascript:void(0)">Academic Year</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        View Academic Year
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
        <table id="example" class="table table-bordered table-striped table-vcenter js-dataTable-responsive fs-sm">
          <span class="d-flex justify-content-end">
            <a class="btn btn-alt-info btn-sm" href="<?php echo e(route('courses.addYear')); ?>">Create</a>
        </span><br>
          <thead>
            <tr>
              <th></th>
              <th>Academic Year </th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e(++$key); ?></td>
              <td style="text-transform: uppercase" ><?php echo e(Carbon\carbon::parse($year->year_start)->format('Y')); ?>/<?php echo e(Carbon\carbon::parse($year->year_end)->format('Y')); ?></td>
              <td nowrap="">
                <a class="btn btn-sm btn-alt-info" href="<?php echo e(route('courses.showSemester',['id'=> Crypt::encrypt($year->id)])); ?>">view semester</a>

                
                <a class="btn btn-sm btn-alt-danger" onclick="return confirm('Are you sure you want to delete this year ?')" href="<?php echo e(route('courses.destroyYear', $year->id)); ?>">delete</a>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>

        </table>
        </div>
      </div>
    </div>
    <!-- Dynamic Table Responsive -->
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('registrar::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Registrar/application/Modules/Registrar/Resources/views/academicYear/showAcademicYear.blade.php ENDPATH**/ ?>