<div class="container">
    <div class="row">
        <h1>Chose event to perform at</h1>
    </div>
    <div class="row">
        <?php foreach ($events as $event) { ?>
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
        <?php } ?>
    </div>
</div>