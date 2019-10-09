function formValidation() {

    document.forms[0].full_name.addEventListener("keyup", function () {
        validate('full_name')
    });
    document.forms[0].email.addEventListener("keyup", function () {
        validate('email')
    });
    document.forms[0].phoneNumber.addEventListener("keyup", function () {
        validate('phoneNumber')
    });

    function validate(f) {
        let val = document.forms[0][f].value;
        let RegExp;
        let message;
        switch (f) {
            case 'full_name':
                RegExp = /^[a-z ,.'-]+$/i;
                message = "Only letters are allowed";
                break;
            case 'email':
                RegExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                message = "Invalid email format";
                break;
            case 'phoneNumber':
                RegExp = /^[0-9]{7,11}$/;
                message = "Phone number must be between 7 and 11 digits!";
                break;

        }
        if (!(RegExp.test(val))) {

            document.getElementById(f + '_v').innerHTML = "<span style='color:red'>" + message + '</span>';

            return false;
        } else {
            document.getElementById(f + '_v').innerHTML = "<span style='color:green'>Correct</span>";
            return true;
        }
    }

}