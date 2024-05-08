<?php $__env->startSection("Title","Payment success"); ?>

<?php $__env->startSection("content"); ?>
<div class="contaionr my-5">
    <h1 class="text-success english">Payment Success</h1>
    <a href="/">Go back Home</a>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    localStorage.removeItem('products');
    localStorage.removeItem('items')
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-commerce\resources\views/payment_success.blade.php ENDPATH**/ ?>