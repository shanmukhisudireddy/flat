<?php
session_start();

// Check if the OTP is already generated
if (!isset($_SESSION['otp'])) {
    // Redirect the user to the forgot password page if the OTP is not generated
    header("Location: forgot_password.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify the entered OTP
    $otp = $_POST['otp'];
    
    if ($otp === $_SESSION['otp']) {
        // The OTP is verified successfully
        // Redirect the user to the page where they can set a new password
        header("Location: reset_password.php");
        exit();
    } else {
        // Invalid OTP, show an error message
        $error_message = 'Invalid OTP. Please try again.';
    }
}
?>

<div class="container-fluid">
    <form action="" id="verify-otp-frm" method="POST">
        <div class="form-group">
            <label for="" class="control-label">OTP</label>
            <input type="text" name="otp" required="" class="form-control">
        </div>
        <?php if(isset($error_message)): ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <button class="button btn btn-info btn-sm">Verify OTP</button>
    </form>
</div>

<script>
    $('#verify-otp-frm').submit(function(e){
        e.preventDefault();
        $('#verify-otp-frm button[type="submit"]').attr('disabled', true).html('Verifying OTP...');
        if($(this).find('.alert-danger').length > 0)
            $(this).find('.alert-danger').remove();
        $.ajax({
            url:'admin/ajax.php?action=verify_otp',
            method:'POST',
            data:$(this).serialize(),
            error:err=>{
                console.log(err);
                $('#verify-otp-frm button[type="submit"]').removeAttr('disabled').html('Verify OTP');
            },
            success:function(resp){
                // Redirect to the reset password page if the OTP is verified
                location.href ='reset_password.php';
            }
        })
    });
</script>