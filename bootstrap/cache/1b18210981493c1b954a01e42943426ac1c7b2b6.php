<?php $__env->startSection("Title","User Login"); ?>

<?php $__env->startSection("content"); ?>

<div class="container my-5">
    <div class="col-md-8 offset-md-2">
        <h1 class="mb-5 text-center text-info english">User Login</h1>
        <?php if(\App\Classes\Session::has("success_message")): ?>
            <?php echo e(\App\Classes\Session::flash("success_message")); ?>

        <?php endif; ?>

        <?php if(\App\Classes\Session::has("error_message")): ?>
            <?php echo e(\App\Classes\Session::flash("error_message")); ?>

        <?php endif; ?>
        <form action="/user/login" method="post" >
            
            <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control rounder-0" id="email" name="email" required>
            </div>
             <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control rounder-0" id="password" name="password" required>
            </div>
            <div class="row justify-content-between no-gutters">
                <a href="/user/register">Not member yet. Please register here!</a>
                <span>
                    <button class="btn btn-outline-warning btn-sm">Cancel</button>
                    <button class="btn btn-primary btn-sm">Login</button>
                </span>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-commerce\resources\views/user/login.blade.php ENDPATH**/ ?>