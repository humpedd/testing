<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css    ">
    <link
        href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:ital,wght@0,200;0,400;0,500;1,400&family=Rubik:wght@300;400;500&display=swap"
        rel="stylesheet">
    <title>Employee User Registration</title>
</head>

<body class="bg-white">

    <h1 class="px-2 mt-1 h2">Please fill in your information.</h1>
    <div class="block-weighted">
        <div class="weight-70">
            <div class="weight-50 bg-light border px-1 mx-5 dual-content-left">

                <!-- PERSONAL INFO -->
                <form id="registration" action="THESIS_SUBMIT_REGULAR_ACC.php" method="POST">
                    <b>
                        <h3 class="pt-1">Personal Information</h3>
                    </b>
                    <div class="block-weighted mb-1">
                        <div class="weight-50 ml-1">
                            <label for="FIRST_NAME">First Name </label>
                            <br>
                            <input class="half-field" id="FIRST_NAME" name="FIRST_NAME" type="text" value="">
                        </div>
                        <div class="weight-50 mb-1">
                            <label for="MIDDLE_NAME">Middle Name </label>
                            <br>
                            <input class="half-field" id="MIDDLE_NAME" name="MIDDLE_NAME" type="text" value="">
                        </div>
                    </div>
                    <div class="block-weighted mb-1">
                        <div class="weight-50 ml-1">
                            <label for="LAST_NAME">Last Name </label>
                            <br>
                            <input class="half-field" id="LAST_NAME" name="LAST_NAME" type="text" value="">
                        </div>
                        <div class="weight-50 ml-1">
                            <label for="EMPLOYEE_ID">Employee ID</label>
                            <br>
                            <input class="half-field" id="EMPLOYEE_ID" name="EMPLOYEE_ID" type="text" value="">
                        </div>
                    </div>
                    <div class="ml-1 pb-1">
                        <label for="BIRTHDAY">Birthday</label>
                        <br>
                        <input class="full-field" type="date" id="BIRTHDAY" name="BIRTHDAY" value="" min="1900-1-1"
                            max="2024-12-31">
                    </div>

            </div>
            <div class="weight-50 bg-light border px-1 mx-5 dual-content-left">
                <!-- ADDRESS -->

                <b>
                    <h3 class="pt-1">Address</h3>
                </b>
                <div class="block-weighted mb-1">
                    <div class="weight-50 ml-1">
                        <label for="HOUSE_NUMBER">House No.</label>
                        <br>
                        <input class="half-field" id="HOUSE_NUMBER" name="HOUSE_NUMBER" type="text" value="">
                    </div>
                    <div class="weight-50 mb-1">
                        <label for="STREET">Street/Subdivision</label>
                        <br>
                        <input class="half-field" id="STREET" name="STREET" type="text" value="">
                    </div>
                </div>
                <div>
                    <div class="ml-1 pb-1">
                        <label for="BRGY">Brgy.City/Municipility</label>
                        <br>
                        <select class="full-field" name="BRGY" id="BRGY">
                            <option value="" selected hidden> </option>
                            <h3>Address</h3>
                            </b>
                            <option value="Trece Martires City">Trece Martires City</option>
                            <option value="Imus">Imus</option>
                            <option value="Bacoor">Bacoor</option>
                            <option value="Naic">Naic </option>
                            <option value="Maragondon">Maragondon </option>
                            <option value="Ternate">Ternate </option>
                            <option value="Tanza">Tanza </option>
                            <option value="Indang">Indang </option>
                            <option value="Alfonso">Alfonso </option>
                            <option value="Silang">Silang </option>
                            <option value="Cavite City">Cavite City </option>
                            <option value="Noveleta">Noveleta </option>
                            <option value="Amadeo">Amadeo</option>
                            <option value="Carmona">Carmona</option>
                            <option value="General Emilio Aguinaldo">General Emilio Aguinaldo</option>
                            <option value="General Mariano Alvarez">General Mariano Alvarez</option>
                            <option value="General Trias">General Trias</option>
                            <option value="Kawit">Kawit</option>
                            <option value="Magallanes">Magallanes</option>
                            <option value="Mendez">Mendez</option>
                            <option value="Rosario">Rosario</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="weight-50 bg-light border px-1 mx-5 dual-content-left mb-2">
                <!-- CONTACTS -->
                <b>
                    <h3 class="pt-1">Contact Information</h3>
                </b>
                <div class="block-weighted mb-1">
                    <div class="weight-50 ml-1">
                        <label for="PHONE_NUMBER">Phone Number</label>
                        <br>
                        <input class="half-field" type="tel" id="PHONE_NUMBER" name="PHONE_NUMBER" value="">
                    </div>
                    <div class="weight-50 mb-1">
                        <label for="LANDLINE_NUMBER">Landline Number</label>
                        <input class="half-field" type="tel" id="LANDLINE_NUMBER" name="LANDLINE_NUMBER" value="">
                    </div>
                </div>
                <div>
                    <div class="ml-1 pb-1">
                        <label for="EMAIL_ADDRESS">Email Address </label>
                        <br>
                        <input class="full-field less" type="email" id="EMAIL_ADDRESS" name="EMAIL_ADDRESS" value="">
                    </div>
                </div>
            </div>
        </div>
        <!-- BUTTONS -->
        <div class="weight-30">
            <div class="ml-3 pt-1">
                <input type="submit" value="Next" name="submit" class="button-dark mb-2 no-border submit-button">
                <a class="button button-length" href="./THESIS_LOGIN_PAGE_DATA.PHP">
                    Main Page</a>
            </div>
        </div>
    </div>
    </form>

</body>

</html>