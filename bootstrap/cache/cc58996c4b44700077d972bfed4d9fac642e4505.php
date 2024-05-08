<?php $__env->startSection("Title","Payment success"); ?>

<?php $__env->startSection("content"); ?>
<div class="contaionr my-5">
   <html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    </head>
    <style>
        body {
            text-align: center;
            background: #EBF0F5;
        }
        h1 {
            color: #88B04B;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
            }
        p {
            color: #404F5E;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-size:20px;
            margin: 0;
        }
        i {
            color: #9ABC66;
            font-size: 100px;
            line-height: 200px;
            margin-left:-15px;
        }
        .card {
            background: transparent;
            padding: 50px;
            padding-bottom: 30px;
            border: none;
            display: inline-block;
            margin: 0 auto;
        }
        #aa:link, #aa:visited {
            background-color: white;
            color: black;
            margin-top: 10px;
            border: 2px solid green;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        #aa:hover, #aa:active {
            background-color: green;
            color: white;
        }
    </style>

    <body>
        <div class="card">
        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
            <i class="checkmark">✓</i>
        </div>
            <h1>Success</h1> 
            <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
            <a href="/" style="text-decoration: none;" id="aa">Go Back Home</a>
        </div>
    </body>
</html>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    localStorage.removeItem('products');
    localStorage.removeItem('items')
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-commerce\resources\views/payment_success.blade.php ENDPATH**/ ?>