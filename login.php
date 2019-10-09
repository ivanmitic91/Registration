<?php include "view/partials/header.php"; ?>
<div class="container-fluid mt-5">

    <div class="row">

        <div class="col-sm-4 offset-sm-4">

            <div class="card">

                <?php

                $user = new User();

                if (isset($_POST['login_submit'])) {


                    $user->setLoginEmail(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
                    $user->setPassword(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

                    if ($user->login()) {

                        header('Location: index.php');
                    } else {
                        $user->errors[] = 'Email or password was incorrect!';
                    }

                    show_errors($user); // validation errors
                }


                require_once "view/templates/login_template.php" ?>
            </div>

        </div>

    </div>

</div>

</div>

<?php include "view/partials/footer.php" ?>