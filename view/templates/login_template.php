<h5 class="card-header text-sm-center">Login here</h5>
<div class="card-body">

    <form action="" method="POST">
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" value='<?= $user->getEmail(); ?>' id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <button class="btn btn-primary mr-4" name="login_submit" type="submit">Login</button>
        Back to <a href="Register.php" class="btn btn-outline-secondary btn-sm" aria-pressed="true">Registration</a>
    </form>


</div>