<link href="<?php echo URL; ?>css/user.css" rel="stylesheet">
<div class="container">

    <form class="form-signin" method="POST" action="<?php echo URL; ?>user/signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
        <div class="checkbox">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <?php 
            if ($error != '') 
            {
                echo ("<pre class='login-error-message'>" . str_replace('.', ' ', $error) . "</pre>");
            }
        ?>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div>