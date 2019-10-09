<?php include "view/partials/header.php";
include "view/partials/nav.php" ?>

<?php if (!isset($_SESSION['user_id'])) {
    header('Location: register.php');
}
$session = new Session();
?>
<div class="container-fluid">

    <div class="row">

        <div class="col-sm-4 offset-sm-4">

            <div class="card">
                <h5 class="card-header text-sm-center">Dashboard</h5>
                <div class="card-body">

                    <?php $session->flash('uploaded'); ?>

                    <h4 class="text-center">Welcome <?php echo $_SESSION['userName'] ?? ''; ?></h4>
                    <?php

                    ?>

                </div>
            </div>

        </div>

    </div>

</div>

</div>

<?php include "view/partials/footer.php" ?>