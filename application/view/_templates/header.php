<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MusicMeetups</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo URL; ?>lib/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>lib/css/fontawesome-all.min.css" rel="stylesheet">
</head>
<body>

    <!-- navigation -->
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="<?php echo URL; ?>">MusicMeetups</a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL; ?>host">Host<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL; ?>perform">Perform</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL; ?>attend">Attend</a>
          </li>
          <?php if ($_SESSION['user']) { ?> 
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL; ?>user/events">My events</a>
            </li>
          <?php } ?>
        </ul>
        <?php if (!$_SESSION['user']) { ?> 
        <ul class="navbar-nav mr-auto" style="float: right;margin-right: 20%!important;">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL; ?>user/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL; ?>user/register">Register</a>
          </li>
        </ul>
        <?php } else {?>
        <ul class="navbar-nav mr-auto" style="float: right;margin-right: 20%!important;">
          <li class="nav-item active">
            <a class="nav-link" href=""><?php echo $_SESSION['user']['name']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL; ?>user/signout">Sign Out</a>
          </li>
        </ul>
        <?php } ?>
        <!-- <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
    </nav>

