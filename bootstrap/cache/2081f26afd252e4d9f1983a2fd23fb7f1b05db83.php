<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('Title'); ?></title>
    <link rel="Shortcut icon" href="<?php echo e(asset('images/dodo.jpg')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <?php echo $__env->make('layout.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>

    <script src="<?php echo URL_ROOT."assets/js/tether.min.js" ?>"></script>
    <script src="<?php echo URL_ROOT."assets/js/jquery.js" ?>"></script>
    <script src="<?php echo URL_ROOT."assets/js/bootstrap.min.js" ?>"></script>

    <!-- script can do when write .js after -->
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\E-commerce\resources\views/layout/master.blade.php ENDPATH**/ ?>