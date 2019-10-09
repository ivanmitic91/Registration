<?php include "view/partials/header.php";

$user = new User();
$session = new Session();

?>

<div class="container-fluid mt-5">

    <div class="row">

        <div class="col-sm-4 offset-sm-4">

            <div class="card">

                <!-- session messages -->

                <?php $session->flash('error'); ?>


                <!-- register user -->
                <?php if (isset($_POST['register_user'])) {


                    $user->setFullName(filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_STRING));
                    $user->setEmail(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
                    $user->setPassword(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
                    $user->setConfirmPassword(filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING));
                    $user->setPhoneNumber(filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_NUMBER_INT));
                    $user->setFileName('cv', 'uploads', 'register_user', ['pdf']);

                    if ($user->checkFields()) {

                        $user->uploadFile();

                        $user->insertUser();
                    }

                    show_errors($user); // validation errors
                }

                require_once "view/templates/register_template.php" ?>

            </div>

        </div>

    </div>


</div>



<?php include "view/partials/footer.php" ?>