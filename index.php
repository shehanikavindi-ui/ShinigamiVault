<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shinigami Vault</title>

    <!-- stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="assets/logo.png" />
</head>

<body>

    <?php include "header.php"; ?>

    <div class="auth-container">
        <div class="auth-login-container col-4">
            <h2 class="auth-heading">Login</h2>
            <div class="auth-field-container d-flex justify-content-center w-100">
                <fieldset class="fieldset">

                    <div class="input-wrapper">
                        <input type="email" id="l_email" placeholder=" " />
                        <label for="l_email">Email</label>
                    </div>

                    <div class="input-wrapper">
                        <input type="password" id="l_password" placeholder=" " style="letter-spacing: 8px;"/>
                        <label for="l_password">Password</label>
                        <button class="show-pw-btn" type="button">
                            <i id="l_password_icon" class="bi bi-eye-slash"></i>
                        </button>
                    </div>

                </fieldset>
            </div>

            <div class="auth-btn-container"><br>
                <a class="ms-3" type="button">Forgot your password ?</a>
                <div class="d-flex justify-content-center w-100 mt-5">
                    <div class="col-10">
                        <button class="primary-btn">Login</button>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <a type="button" onclick="showRegister();">create account</a>
                </div>
            </div>

        </div>
        <div class="auth-register-container d-none col-4">
            <h2 class="auth-heading">Register</h2>
            <div class="auth-field-container d-flex justify-content-center w-100">
                <fieldset class="fieldset">

                    <div class="input-wrapper">
                        <input type="text" id="r_name" placeholder=" " />
                        <label for="r_email">Full name</label>
                    </div>

                    <div class="input-wrapper">
                        <input type="email" id="r_email" placeholder=" " />
                        <label for="r_email">Email</label>
                    </div>

                    <div class="input-wrapper">
                        <input type="password" id="r_password" placeholder=" " style="letter-spacing: 8px;"/>
                        <label for="r_password">Password</label>
                        <button class="show-pw-btn" type="button">
                            <i id="r_password_icon" class="bi bi-eye-slash"></i>
                        </button>
                    </div>

                </fieldset>
            </div>

            <div class="auth-btn-container"><br>
                <div class="d-flex justify-content-center w-100 mt-3">
                    <div class="col-10">
                        <button class="primary-btn">Create Account</button>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <a type="button" onclick="showLogin();">Back to Login</a>
                </div>
            </div>

        </div>
    </div>

    <?php include "footer.php"; ?>

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>


<style>

    .footer {
        width: 100%;
        height: 3vh;
        background-color: #ededed;
        position: absolute;
        bottom: 0;
    }
    .footer p {
        font-size: 0.7rem;
        text-align: center;
        align-items: center;
    }

    .auth-container {
        width: 100%;
        min-height: 85vh;
        margin-top: 10vh;
        padding-left: 1rem;
        padding-right: 1rem;
        padding-top: 5rem;
        background-color: var(--white);
        display: flex;
        justify-content: center;
    }

    .auth-heading {
        text-align: center;
        font-family: 'header';
        color: var(--black);
        margin-bottom: 2.7rem;
        text-transform: uppercase;
    }

    .fieldset {
        width: 100%;
        padding-inline: 1rem;
    }

    .input-wrapper {
        position: relative;
        margin-bottom: 1.2rem;
    }

    .fieldset input {
        width: 100%;
        height: 3.2rem;
        border: 1px solid var(--dark-grey);
        border-radius: 5px;
        padding: 1.2rem 2.5rem 0.4rem 1rem;
        font-size: 0.85rem;
        color: var(--dark-grey);
        background: transparent;
        box-sizing: border-box;
    }

    .fieldset input:focus {
        outline: none;
        border-color: var(--black);
    }

    .input-wrapper label {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 0.8rem;
        color: var(--dark-grey);
        pointer-events: none;
        transition: all 0.2s ease;
        background: var(--white);
        padding: 0 0.25rem;
        letter-spacing: 0.05em;
    }

    .input-wrapper input:focus + label,
    .input-wrapper input:not(:placeholder-shown) + label {
        top: 0;
        font-size: 0.68rem;
        color: var(--dark-grey);
    }

    .fieldset .show-pw-btn {
        position: absolute;
        right: 0.7rem;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: none;
        cursor: pointer;
        padding: 0;
    }

    .fieldset .show-pw-btn i {
        color: var(--dark-grey);
    }

    .fieldset .show-pw-btn i:hover {
        color: var(--black);
    }

    .auth-btn-container a {
        color: var(--black);
        font-size: 0.8rem;
        text-decoration: underline;
    }

    .primary-btn {
        width: 100%;
        height: 2.9rem;
        border-radius: 5px;
        border: none;
        background-color: var(--black);
        color: var(--white);
        letter-spacing: 1px;
    }

    .primary-btn:active {
        transform: translateY(1px);
    }
</style>

<script>
    // ========== Switch Contents ==============
function showRegister() {  
    document.querySelector('.auth-login-container').classList.add('d-none');
    document.querySelector('.auth-register-container').classList.remove('d-none');
}
function showLogin() {  
    document.querySelector('.auth-register-container').classList.add('d-none');
    document.querySelector('.auth-login-container').classList.remove('d-none');
}
</script>