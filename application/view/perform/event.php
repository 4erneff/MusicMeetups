<div class="container">
    <div class="row">
        <h1>Fill the form to perform there</h1>
    </div>
    <div class="row">
    <form id="performer-form" class="col-sm-12 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="full-name-input">Full name</label>
            <input type="text" class="form-control" id="full-name-input" name="name" required placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="email-input">Email address</label>
            <input type="email" class="form-control" id="email-input" name="email" required placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="mobile-input">Mobile</label>
            <input type="text" class="form-control" id="mobile-input" name="mobile" required placeholder="Enter your telephone number">
        </div>
        <div class="form-group">
            <label for="min-tax-input">Minimal entrance (€)</label>
            <input type="number" class="form-control" id="min-tax-input" name="minimal_tax" required placeholder="The minimum entrance tax. Keep it low!">
        </div>
        <div>
            <label for="desc-input">Additional info</label>
            <textarea class="form-control" id="desc-input" rows="4" name="description"
                placeholder="Say something about yourself. Add some performance videos if you have such."></textarea>
        </div>
        <div class="form-check">
            <label class="form-check-label">
            <input type="checkbox" required class="form-check-input">
            I understand that I am responsible for the organisation of the event.
            </label>
        </div>
        <button id="submit-perform" type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="card event-card col-md-5 col-lg-4">
            <img class="card-img-top" data-src="" alt="100%x180" style="height: 180px; width: 100%; display: block;" 
                src=<?php echo URL; ?>img/perform_card_img.jpg data-holder-rendered="true">
            <div class="card-block">
                <h4 class="card-title"><?php echo $event['host']['name']; ?></h4>
                <span><i class="fas fa-map-marker"></i>  <?php echo $event['host']['location']; ?></span><br>
                <span><i class="fas fa-users"></i>  <?php echo $event['host']['maxguests']; ?></span><br>
                <span><i class="fas fa-envelope"></i>  <?php echo $event['host']['email']; ?></span>
                <p class="card-text"><?php echo $event['host']['description']; ?></p>
                <a href="<?php echo URL; ?>perform/event/<?php echo $event['id']; ?>" class="btn btn-primary">Perform there</a>
            </div>
        </div>    
    </div>
</div>
<script>
    var eventId = <?php echo $event['id']; ?>;
</script>