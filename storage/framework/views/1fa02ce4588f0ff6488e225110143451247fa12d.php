<?php $__env->startSection('content'); ?>
   
    <!-- Add Member Button -->
    <button id="add-member-btn" class="btn btn-primary">Add Member</button>

    <!-- Modal -->
    <div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMemberModalLabel">Add Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addMemberForm">
                    <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="parentSelect" class="form-label">Parent</label>
                            <select class="form-select" id="parentSelect" name="parent_id">
                                <option value="">Select Parent</option>
                                <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($member->Id); ?>"><?php echo e($member->Name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nameInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="nameInput" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Show modal when Add Member button is clicked
            $('#add-member-btn').click(function() {
                $('#addMemberModal').modal('show');
            });

            // Handle form submission
            $('#addMemberForm').submit(function(event) {
                event.preventDefault();
                if (validateForm()) {
                    // If validation passes, you can proceed with form submission
                    // Here you can handle form submission via AJAX or regular form submit
                    // For simplicity, let's assume form submission logic here
                    let formData = $(this).serialize();
                    console.log(formData);
                    // Add AJAX logic or regular form submission logic as needed

                    $.ajax({
                        url: "<?php echo e(route('members.store')); ?>", // Adjust the route as per your Laravel routes
                        type: 'POST',
                        data: $('#addMemberForm').serialize(),
                        success: function(response) {
                            console.log(response);
                            // Optionally, update UI or perform actions after successful submission
                            // Close modal after submission
                            $('#addMemberModal').modal('hide');
                            // Reload or update member list as needed
                            // Example: window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Handle errors or display error messages
                        }
                    });
                    // After successful submission, you may close the modal and perform further actions
                    $('#addMemberModal').modal('hide');
                }
            });

            // Function to validate the form
            function validateForm() {
                let name = $('#nameInput').val().trim();
                if (name === '') {
                    $('#nameInput').addClass('is-invalid');
                    return false;
                } else {
                    $('#nameInput').removeClass('is-invalid');
                    return true;
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/er/Projects/Laravel-New/Laravel/resources/views/layouts/index.blade.php ENDPATH**/ ?>