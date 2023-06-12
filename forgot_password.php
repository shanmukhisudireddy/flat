<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Generate and send the OTP to the user's email
    $email = $_POST['email'];
    // Here, you can implement the logic to generate and send the OTP to the user's email address
    
    // Store the generated OTP in the session
    $_SESSION['otp'] = '123456'; // Replace '123456' with the actual OTP generated
    
    // Redirect the user to the OTP verification page
    header("Location: verify_otp.php");
    exit();
}
?>

<div class="container-fluid">
    <form action="" id="forgot-password-frm" method="POST">
        <div class="form-group">
            <label for="" class="control-label">Email</label>
            <input type="email" name="email" required="" class="form-control">
        </div>
        <button class="button btn btn-info btn-sm">Reset Password</button>
    </form>
</div>

<script>
    $('#forgot-password-frm').submit(function(e){
        e.preventDefault();
        $('#forgot-password-frm button[type="submit"]').attr('disabled', true).html('Resetting password...');
        if($(this).find('.alert-danger').length > 0)
            $(this).find('.alert-danger').remove();
        $.ajax({
            url:'admin/ajax.php?action=forgot_password',
            method:'POST',
            data:$(this).serialize(),
            error:err=>{
                console.log(err);
                $('#forgot-password-frm button[type="submit"]').removeAttr('disabled').html('Reset Password');
            },
            success:function(resp){
                // Redirect to the OTP verification page
                location.href ='verify_otp.php';
            }
        })
    });
</script>