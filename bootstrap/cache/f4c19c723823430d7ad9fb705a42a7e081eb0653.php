<?php $__env->startSection('Title','Category Create'); ?>

<?php $__env->startSection('content'); ?>
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
    <h1 class="text-primary text-center">Create Category</h1>

    <div class="row">
        <div class="col-md-4">
            <?php echo $__env->make('layout.admin_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="col-md-8">
            <?php echo $__env->make('layout.report_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if(\App\Classes\Session::has("delete_success")): ?>
                <?php echo e(\App\Classes\Session::flash("delete_success")); ?>

            <?php endif; ?>

            <?php if(\App\Classes\Session::has("delete_fail")): ?>
                <?php echo e(\App\Classes\Session::flash("delete_fail")); ?>

            <?php endif; ?>

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

            <!-- Categories list start -->
            <ul class="list-group mt-5">
                <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">
                        <a href="/admin/category/all"><?php echo e($cat->name); ?></a>
                        <span class="float-right">
                            <i class="fa fa-plus text-primary" style="cursor: pointer;" onclick="showSubCatModel('<?php echo e($cat->name); ?>','<?php echo e($cat->id); ?>')"></i>
                            <i class="fa fa-edit text-warning pl-2" id="edit_cat" onclick="fun('<?php echo e($cat->name); ?>','<?php echo e($cat->id); ?>')"></i>
                            <a href="/admin/category/<?php echo e($cat->id); ?>/delete"> 
                                <i class="fa fa-trash text-danger pl-2"></i>
                            </a>
                        </span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="mt-2 offset-md-4">
                <?php echo $pages; ?>

            </div>
            <!-- Categories list end -->

            <!-- Sub Categories list start -->
            <ul class="list-group mt-5">
                <?php $__currentLoopData = $sub_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">
                        <a href="/admin/subcategory/all"><?php echo e($sub_cat->name); ?></a>
                        <span class="float-right">
                            <i class="fa fa-edit text-warning pl-2" id="edit_cat" onclick="subCatEdit('<?php echo e($sub_cat->name); ?>','<?php echo e($sub_cat->id); ?>')"></i>
                            <a href="/admin/subcategory/<?php echo e($sub_cat->id); ?>/delete"> 
                                <i class="fa fa-trash text-danger pl-2"></i>
                            </a>
                        </span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="mt-2 offset-md-4">
                <?php echo $sub_pages; ?>

            </div>
            <!-- Sub Categories list end -->
        </div>    
    </div>

    <!-- Modal Start -->
    <div class="modal" tabindex="-1" role="dialog" id="CatUpdateModel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form>
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="edit_name">
                        </div>
                        <input type="hidden" id="edit_token" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                        <input type="hidden" id="edit_id" name="id">
                        <div class="row justify-content-end no-gutters mt-3">
                            <button class="btn btn-primary btn-sm" onclick="startEdit(event)">Update</button>
                        </div>
                    </form>
                    <!-- form end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- Sub Category Create Modal Start -->
    <div class="modal" tabindex="-1" role="dialog" id="SubCategoryCreateModel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form>
                        <div class="form-group">
                            <label for="name">Parent Category Name</label>
                            <input type="text" class="form-control" id="parent_cat_name">
                        </div>
                        <div class="form-group">
                            <label for="name">Sub Category Name</label>
                            <input type="text" class="form-control" id="sub_cat_name">
                        </div>
                        <input type="hidden" id="sub_cat_token" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                        <input type="hidden" id="parent_cat_id" name="id">
                        <div class="row justify-content-end no-gutters mt-3">
                            <button class="btn btn-primary btn-sm" onclick="createSubCategory(event)">Create</button>
                        </div>
                    </form>
                    <!-- form end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Sub Category Create Modal End -->

    <!-- Modal Start -->
    <div class="modal" tabindex="-1" role="dialog" id="SubCategoryEditModel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form>
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="sub_cat_edit_name">
                        </div>
                        <input type="hidden" id="sub_cat_edit_token" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                        <input type="hidden" id="sub_cat_edit_id" name="id">
                        <div class="row justify-content-end no-gutters mt-3">
                            <button class="btn btn-primary btn-sm" onclick="subCatUpdateStart(event)">Update</button>
                        </div>
                    </form>
                    <!-- form end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
        <script>
            function fun(name,id)
            {
                $("#edit_name") . val (name);
                $("#edit_id") . val (id);
                $("#CatUpdateModel") . modal ("show");
            }

            function startEdit(e)
            {
                e.preventDefault();
                name = $("#edit_name") . val ();
                id = $("#edit_id") . val ();
                token = $("#edit_token") . val ();
                $("#CatUpdateModel") . modal ("hide");
                $.ajax({
                    type:'POST',
                    url: '/admin/category/' + id + '/update',
                    data: {
                        name: name,
                        token: token,
                        id: id
                    },
                    success: function (result){
                        window.location.href = "/admin/category/create";
                    },
                    error: function (response){
                        str = "";
                        resp = (JSON.parse(response.responseText));
                        alert(resp.name);
                    }
                });
            }

            function showSubCatModel(name,id)
            {
                $("#parent_cat_name") . val (name);
                $("#parent_cat_id") . val (id); 
                $("#SubCategoryCreateModel") . modal ("show");
            }

            function createSubCategory(e)
            {
                e.preventDefault();
                var name = $("#sub_cat_name") . val ();
                var token = $("#sub_cat_token") . val ();
                var parent_cat_id = $("#parent_cat_id") . val ();
                $("#SubCategoryCreateModel") . modal ("hide");
                // console.log("name is "+name+"token is "+token+"parent cat id is "+parent_cat_id);
                $.ajax({
                    type:'POST',
                    url: '/admin/subcategory/create',
                    data: {
                        name: name,
                        token: token,
                        parent_cat_id: parent_cat_id
                    },

                    success: function (result){
                        console.log(result);

                        // window.location.href = "/admin/category/create";
                    },
                    error: function (response){
                        str = "";
                        resp = (JSON.parse(response.responseText));
                        alert(resp.name);
                    }
                });
            }

            function subCatEdit(name,id)
            {
                $("#sub_cat_edit_name") . val (name);
                $("#sub_cat_edit_id") . val (id);
                $("#SubCategoryEditModel") . modal ("show");
            }

            function subCatUpdateStart(e)
            {
                e.preventDefault();
                name = $("#sub_cat_edit_name") . val ();
                id = $("#sub_cat_edit_id") . val ();
                token = $("#sub_cat_edit_token") . val ();
                $("#SubCategoryEditModel") . modal ("hide");
                $.ajax({
                    type:'POST',
                    url: '/admin/subcategory/update',
                    data: {
                        name: name,
                        token: token,
                        id: id
                    },
                    success: function (result){
                        window.location.href = "/admin/category/create";
                    },
                    error: function (response){
                        str = "";
                        resp = (JSON.parse(response.responseText));
                        alert(resp.name);
                    }
                });
            }
        </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-commerce\resources\views/admin/category/create.blade.php ENDPATH**/ ?>