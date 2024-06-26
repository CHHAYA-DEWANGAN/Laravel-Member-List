<!DOCTYPE html>
<html>
<head>
    <title>Members</title>
</head>
<body>
    <h1>Members List</h1>
    <ul>
        <?php $__currentLoopData = $tree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('members.partials.member', ['member' => $member], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>


    

</body>
</html>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/er/Projects/Laravel-New/Laravel/resources/views/members/index.blade.php ENDPATH**/ ?>