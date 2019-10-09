<?php

function show_errors($err)
{

    echo "<div class='p-2 bg-light'>";

    foreach ($err->errors as $error) {
        echo "<p class='text-danger m-0 text-center'>" . $error . "</p>";
    }

    echo "</div>";
}
