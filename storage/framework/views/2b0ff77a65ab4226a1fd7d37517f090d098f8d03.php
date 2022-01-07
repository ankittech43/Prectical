<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Company/Create</div>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                            <form method="post" class="form-check"  action="<?php echo e(route('employee.update',$emp->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                <table>
                                    <tr>
                                        <th>First Name</th>
                                        <th><input type="text" id="firstname"  class="input-group"  value="<?php echo e($emp->firstname); ?>" name="firstname"></th>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <th><input type="text" id="lastname" value="<?php echo e($emp->lastname); ?>" name="lastname"></th>
                                    </tr>
                                    <tr>
                                        <th>Company</th>
                                        <th>
                                            <select id="company" name="company">
                                                <option>Select Company</option>
                                                <?php $__currentLoopData = $companyList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($company->id==$emp->company): ?> selected <?php endif; ?> value="<?php echo e($company->id); ?>" ><?php echo e($company->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </th>
                                    </tr>
                                    <tr>

                                        <th>Email</th>
                                        <th><input type="text" id="email" value="<?php echo e($emp->email); ?>" name="email"></th>
                                    </tr>
                                    <tr>

                                        <th>phone</th>
                                        <th><input type="text" id="phone"  value="<?php echo e($emp->phone); ?>" name="phone"></th>
                                    </tr>
                                    <tr>
                                        <th><input type="submit" name="btnsubmit"></th>
                                        
                                    </tr>
                                </table>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>








<html>
<head></head>
<body>


</body>

</html>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Prectical\resources\views/Employee_edit.blade.php ENDPATH**/ ?>