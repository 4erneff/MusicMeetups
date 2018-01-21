<div class="container">
    <div class="row">
        <form id="host-form" class="col-sm-12 col-md-6 col-lg-6">
        <h2 class="featurette-heading">Fill the form to host an event now</h2>
        <div class="form-group">
            <label for="full-name-input">Full name</label>
            <input type="text" class="form-control" id="full-name-input" name="name" 
                <?php if ($this->userExists()) { echo "value='" . $_SESSION['user']['name'] . "' "; } ?> required placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="email-input">Email address</label>
            <input type="email" class="form-control" id="email-input" name="email" 
                <?php if ($this->userExists()) { echo "value='" . $_SESSION['user']['email'] . "' "; } ?>required placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="mobile-input">Mobile</label>
            <input type="text" class="form-control" id="mobile-input" name="mobile" 
                <?php if ($this->userExists()) { echo "value='" . $_SESSION['user']['number'] . "' "; } ?>required placeholder="Enter your telephone number">
        </div>
        <div class="form-group">
            <label for="locaiton-input">Location</label>
            <input type="text" class="form-control" id="location-input" name="location" required placeholder="Enter the event location">
        </div>
        <div class="form-group">
            <label for="datetime-input">Date and time</label>
            <input type="datetime-local" class="form-control" id="datetime-input" name="datetime" required>
        </div>
        <div class="form-group">
            <label for="max-guests-input">Slots count</label>
            <input type="number" class="form-control" min="0" id="max-guests-input" name="slots" required placeholder="Enter maximum number of attenders you want to have">
        </div>
        <div class="form-group">
            <label for="desc-input">Additional info</label>
            <textarea class="form-control" name="addInfo" id="desc-input" required rows="3"></textarea>
        </div>
        <div class="form-check">
            <label class="form-check-label">
            <input type="checkbox" required class="form-check-input">
                I understand that I am responsible for the organisation of the event.
            </label>
        </div>
        <button id="submit-host" type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="row featurette">
                <div class="col-md-12">
                    <h2 class="featurette-heading">Host an event at your own bar or cafe.</h2>
                    <p class="lead">Do not set any entrance tax but there surely will be a lot of beers sold!</p>
                </div>
                <div class="col-md-12">
                    <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" 
                        alt="500x500" style="width: 500px; height: 500px;" 
                        src=<?php echo URL; ?>img/host_bar.jpg data-holder-rendered="true">
                </div>
            </div>
            <div class="row featurette">
                <div class="col-md-12">
                    <h2 class="featurette-heading">Have a party at your house</h2>
                    <p class="lead">Invite other music fans to join you for a party at your place. They might also bring some drinks!</p>
                </div>
                <div class="col-md-12">
                    <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" 
                        alt="500x500" style="width: 500px; height: 500px;" 
                        src=<?php echo URL; ?>img/host_home.jpg data-holder-rendered="true">
                </div>
            </div>
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" 
                        alt="500x500" style="width: 500px; height: 500px;" 
                        src="" data-holder-rendered="true">
                </div>
            </div>
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" 
                        alt="500x500" style="width: 500px; height: 500px;" 
                        src="" data-holder-rendered="true">
                </div>
            </div>
        </div>
    </div>
</div>