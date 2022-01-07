<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Company/Edit</div>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                            <form method="post" class="form-check" action="<?php echo e(route('company.update',$comp->id)); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                <table>
                                    <tr>
                                        <th> Name</th>
                                        <th><input type="text" class="input-group" id="name" value="<?php echo e($comp->name); ?>" name="name"></th>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <th><input type="text" class="input-group" id="email" value="<?php echo e($comp->email); ?>" name="email"></th>
                                    </tr>
                                    <tr>
                                        <th>logo</th>
                                        <th><input type="file" id="logo" class="input-group" name="logo"></th>
                                        <th><?php if($comp->logo): ?><img src="<?php echo e(asset('storage/')); ?>/<?php echo e($comp->logo); ?>" height="100px" width="100px"><?php endif; ?></th>
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
<head>

</head>
<body>

</body>
</html>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Prectical\resources\views/Company_edit.blade.php ENDPATH**/ ?>