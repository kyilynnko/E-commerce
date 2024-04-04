<?php $__env->startSection('Title','Category Create'); ?>

<?php $__env->startSection('content'); ?>



    <!-- <?php if(\App\Classes\Session::has("error")): ?>
        <?php echo e(\App\Classes\Session::flash("error")); ?>

    <?php endif; ?> -->

    <div class="container my-5">
    <h1 class="text-primary text-center">Create Category</h1>

        <div class="row">
            <div class="col-md-4">
                <?php echo $__env->make('layout.admin_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-md-8">
                <?php echo $__env->make('layout.report_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- form start -->
                <form action="/admin/category/create" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                    <div class="row justify-content-end no-gutters mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Create</button>
                    </div>
                </form>
                <!-- form end -->
                <ul class="list-group mt-5">
                    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <a href="/admin/category/all"><?php echo e($cat->name); ?></a>
                            <span class="float-right">
                                <i class="fa fa-edit text-warning"></i>
                                <i class="fa fa-trash text-danger"></i>
                            </span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>    

    </div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-commerce\resources\views/admin/category/create.blade.php ENDPATH**/ ?>