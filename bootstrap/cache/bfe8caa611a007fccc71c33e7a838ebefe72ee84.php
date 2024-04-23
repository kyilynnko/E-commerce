<?php $__env->startSection("Title","Danny"); ?>

<?php $__env->startSection("content"); ?>

<style>
    .pagination > li{
        padding: 5px 15px;
        background: #ddd;
        margin-right: 1px;
    }
</style>

<div class="container my-5 english">

    <h1 class="text-info english">Featured</h1>
    <div class="row">
        <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header"><?php echo e($product->name); ?></div>
                    <div class="card-block text-center">
                        <img src="<?php echo e($product->image); ?>" alt="" width="200" height="250">    
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <a href="/product/<?php echo e($product->id); ?>/detail" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <span>$<?php echo e($product->price); ?></span>
                            <button class="btn btn-info btn-sm" onclick="addToCart('<?php echo e($product->id); ?>')">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <h1 class="text-info english">Most Popular</h1>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header"><?php echo e($product->name); ?></div>
                    <div class="card-block text-center">
                        <img src="<?php echo e($product->image); ?>" alt="" width="200" height="250">    
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <a href="/product/<?php echo e($product->id); ?>/detail" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <span>$<?php echo e($product->price); ?></span>
                            <button class="btn btn-info btn-sm" onclick="addToCart('<?php echo e($product->id); ?>')">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="mt-2 offset-md-4">
        <?php echo $pages; ?>

    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make("layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-commerce\resources\views/home.blade.php ENDPATH**/ ?>