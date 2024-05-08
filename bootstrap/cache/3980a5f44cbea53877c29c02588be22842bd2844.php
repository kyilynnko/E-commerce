<?php $__env->startSection("Title","Product Detail"); ?>

<?php $__env->startSection("content"); ?>


<div class="container my-5 english">

    <h1 class="text-info english">Product Detail</h1>
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo e($product->image); ?>" alt="" width="150" height="200">
            </div>
            <div class="col-md-9">
                <h3><?php echo e($product->name); ?></h3>
                <p><?php echo e($product->description); ?></p>
                <button class="btn btn-warning rounded-0 text-white">$ <?php echo e($product->price); ?></button>
                <button class="btn btn-success rounded-0" onclick="addToCart('<?php echo e($product->id); ?>')">Add  to Cart</button>
                <p class="mt-3">
                    <span>
                        Rate :
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star-half text-warning"></i>
                    </span>
                </p>
                <h4>Special offer will due in</h4>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                    </div>
                </div>
            </div>
            <button class="btn btn-dark rounded-0 english  mt-5 mx-auto"><a href="/" class="text-white" style="text-decoration: none !important;"><-- Back</a></button>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make("layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-commerce\resources\views/product.blade.php ENDPATH**/ ?>