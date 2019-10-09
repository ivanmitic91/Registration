<h5 class="card-header text-sm-center">Register here</h5>
<div class="card-body">

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Fullname</label>
            <input type="text" name="full_name" value="<?= $user->getfullName() ?? '' ?>" class="form-control" placeholder="" aria-describedby="helpId">
            <p id="full_name_v"></p>

        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" value="<?= $user->getEmail() ?? '' ?>" class="form-control" placeholder="" aria-describedby="helpId">
            <p id="email_v"></p>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <div class="form-group">
            <label for="">Confirm password</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Phone number</label>
            <input type="text" name="phoneNumber" value="<?= $user->getPhoneNumber() ?? '' ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
            <p id="phoneNumber_v"></p>
        </div>

        <div class="form-group mb-4">
            <label for="">Upload CV</label>
            <input type="file" name="cv" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <input type="submit" name='register_user' class='btn btn-primary mr-4' value="Register">
        Have account ? <a href="Login.php" class="btn btn-outline-secondary btn-sm" aria-pressed="true">Login</a>
    </form>

</div>