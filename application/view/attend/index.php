<div class="container">
    <div class="row">
        <h1>Select event to attend</h1>
    </div>
    <div class="row">
        <?php foreach ($events as $event) { ?>
            <div class="card event-card col-md-5 col-lg-4">
                <img class="card-img-top" data-src="" alt="100%x180" style="height: 180px; width: 100%; display: block;" 
                    src=<?php echo URL; ?>img/attend_card_img.jpg data-holder-rendered="true">
                <div class="card-block">
                    <h4 class="card-title"><?php echo $event['performer']['name']; ?></h4>
                    <span><i class="fas fa-map-marker"></i>  <?php echo $event['host']['location']; ?></span><br>
                    <span><i class="fas fa-calendar"></i>  <?php echo $event['date']; ?></span><br>
                    <span><i class="fas fa-user"></i>  <?php echo $event['host']['name']; ?> | Host</span><br>
                    <span><i class="fas fa-users"></i>  <?php echo $event['remainingplaces']; ?> slots out of <?php echo $event['host']['maxguests']; ?> available</span>
                    <div class="progress">
                        <div class="progress-bar
                            <?php 
                                $percent = 100 - $event['remainingplaces'] / $event['host']['maxguests'] * 100; 
                                if ($percent >= 80) {
                                    echo "bg-danger";
                                } elseif ($percent >= 35) {
                                    echo "bg-info";
                                } else {
                                    echo "bg-success";
                                }
                            ?>" role="progressbar" 
                            style="width: <?php echo (100 - $event['remainingplaces'] / $event['host']['maxguests'] * 100); ?>%;" 
                            aria-valuenow="<?php echo (100 - $event['remainingplaces'] / $event['host']['maxguests'] * 100); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="card-text"><?php echo $event['host']['description']; ?></p>
                    <a href="<?php echo URL; ?>attend/event/<?php echo $event['id']; ?>" class="btn btn-primary">Join</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>