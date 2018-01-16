<link href="<?php echo URL; ?>css/user.css" rel="stylesheet">
<div class="container">

    <form id="user-form" class="form-signin">
        <h2 class="form-signin-heading">Give us your details</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputName" class="sr-only">Full name</label>
        <input type="text" id="inputName" name="name" class="form-control" placeholder="Your full name" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Your password" required="" autofocus="">
        <label for="inputPassword2" class="sr-only">Confirm password</label>
        <input type="password" id="inputPassword2" name="password_re" class="form-control" placeholder="Confirm password" required="">
        <label for="inputNumber" class="sr-only">Your mobile number</label>
        <input type="text" id="inputNumber" name="mobile" class="form-control" placeholder="You mobile number" required="" autofocus="">
        <br><br>
        <button id="submit-user" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    </form>

</div>  