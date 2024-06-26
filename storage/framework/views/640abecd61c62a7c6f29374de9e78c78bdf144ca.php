<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Loan Details</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Client ID</th>
                    <th>Number of Payments</th>
                    <th>First Payment Date</th>
                    <th>Last Payment Date</th>
                    <th>Loan Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $loanDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loanDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loanDetail->clientid); ?></td>
                    <td><?php echo e($loanDetail->num_of_payment); ?></td>
                    <td><?php echo e($loanDetail->first_payment_date); ?></td>
                    <td><?php echo e($loanDetail->last_payment_date); ?></td>
                    <td><?php echo e($loanDetail->loan_amount); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <a href="<?php echo e(route('process-page')); ?>" class="process-button">go on Process Data page</a>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/test/loan_details.blade.php ENDPATH**/ ?>