<li>
    <?php echo e($member->Name); ?>

    <?php if(isset($member->children) && count($member->children) > 0): ?>
        <br>
        <ul>
            <?php $__currentLoopData = $member->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('members.partials.member', ['member' => $child], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</li>
<?php /**PATH /home/er/Projects/Laravel-New/Laravel/resources/views/members/partials/member.blade.php ENDPATH**/ ?>