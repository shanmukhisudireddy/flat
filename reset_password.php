<?php
session_start();

// Check if the OTP is already generated and verified
if (!isset($_SESSION['otp'])) {
    // Redirect the user to the forgot password page if the OTP is not generated
    header("Location: forgot_password.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission to reset the password
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validate and update the password in the database
    // Implement your own logic here to update the user's password
    
    // Clear the OTP from the session
    unset($_SESSION['otp']);
    
    // Redirect the user to the login page or any other desired page
    header("Location: login.php");
    exit();
}
?>

<div class="container-fluid">
    <form action="" id="reset-password-frm" method="POST">
        <div class="form-group">
            <label for="" class="control-label">New Password</label>
            <input type="password" name="new_password" required="" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="control-label">Confirm Password</label>
            <input type="password" name="confirm_password" required="" class="form-control">
        </div>
        <button class="button btn btn-info btn-sm">Reset Password</button>
    </form>
</div>

<script>
    $('#reset-password-frm').submit(function(e){
        e.preventDefault();
        $('#reset-password-frm button[type="submit"]').attr('disabled', true).html('Resetting password...');
        if($(this).find('.alert-danger').length > 0)
            $(this).find('.alert-danger').remove();
        $.ajax({
            url:'admin/ajax.php?action=reset_password',
            method:'POST',
            data:$(this).serialize(),
            error:err=>{
                console.log(err);
                $('#reset-password-frm button[type="submit"]').removeAttr('disabled').html('Reset Password');
            },
            success:function(resp){
                // Redirect to the login.php page or any other desired page after resetting the password
                location.href ='login.php';
            }
        })
    });
</script>