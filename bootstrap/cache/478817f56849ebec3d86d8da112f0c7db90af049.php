<?php $__env->startSection("Title","Product Home Page"); ?>
<?php $__env->startSection("content"); ?>
    <style>
        .pagination > li{
            padding: 5px 15px;
            background: #ddd;
            margin-right: 1px;
        }
        #edit_cat{
            cursor: pointer;
        }
    </style>
<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <?php echo $__env->make("layout.admin_sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-8">
            <?php if(\App\Classes\Session::has("Product_insert_success")): ?>
                <?php echo e(\App\Classes\Session::flash("Product_insert_success")); ?>

            <?php endif; ?>

            <!-- Table Start -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="text-muted">
                            <td><?php echo e($product->id); ?></td>
                            <td><img src="<?php echo e($product->image); ?>" alt="" style="max-width:100px;max-height:150px"></td>
                            <td><?php echo e($product->name); ?></td>
                            <td><?php echo e($product->price); ?></td>
                            <td>
                                <a href="/admin/product/<?php echo e($product->id); ?>/edit" class="text-warning"><i class="fa fa-edit"></i></a>
                                <a href="/admin/product/<?php echo e($product->id); ?>/delete" class="text-warning"><i class="fa fa-trash text-danger"></i></i></a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <!-- Table End -->
            <div class="mt-2 offset-md-4">
                <?php echo $pages; ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-commerce\resources\views/admin/product/home.blade.php ENDPATH**/ ?>