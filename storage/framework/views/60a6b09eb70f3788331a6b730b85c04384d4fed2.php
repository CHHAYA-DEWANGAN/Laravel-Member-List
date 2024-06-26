<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Login')); ?></div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('login.submit')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label for="username"><?php echo e(__('Username')); ?></label>
                                <input id="username" type="text" class="form-control " name="username" value="<?php echo e(old('username')); ?>" required autocomplete="username" autofocus>

                            </div>

                            <div class="form-group">
                                <label for="password"><?php echo e(__('Password')); ?></label>
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">

                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Login')); ?>

                                </button>
                            </div>
                        </form>
                    </div>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                        <?php echo e($errors->first()); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH /var/www/resources/views/test/login.blade.php ENDPATH**/ ?>