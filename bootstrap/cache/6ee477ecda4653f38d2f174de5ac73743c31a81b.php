<div class="container-fluid bg-dark " >
    <nav class="container navbar navbar-expand-lg navbar-light bg-faded">
        <a class="navbar-brand english text-white" href="#">
            <img src="<?php echo e(asset('images/dodo.jpg')); ?>" alt="" width="30" height="30" class="rounded">
            <span class="ml-3">Online Shopping</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-list text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link english text-white" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link english text-white" href="/admin">Admin Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link english text-white" href="/cart">
                        Cart
                        <span class="badge badge-danger badge-pill" style="position: relative; top:-10px; left:-5px" id="cart-count">0</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    
                    <a class="nav-link dropdown-toggle english text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        
                        <?php if(\App\Classes\Auth::check()): ?>
                            <?php echo e(\App\Classes\Session::get("user_id")); ?>

                        <?php else: ?>
                            Member
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php if(\App\Classes\Auth::check()): ?>
                            <a class="dropdown-item" href="/user/logout">Logout</a>
                        <?php else: ?>
                            <a class="dropdown-item" href="/user/login">Login</a>
                            <a class="dropdown-item" href="/user/register">register</a>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div><?php /**PATH C:\xampp\htdocs\E-commerce\resources\views/layout/nav.blade.php ENDPATH**/ ?>