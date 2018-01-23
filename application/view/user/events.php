<div class="container">
    <div class="row"><h1>My events</h1></div> 
    <div class="row">
        
            <div class="col-md-12">
            <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card">
            <div class="card-header" role="tab" id="headingOne">
            <h5 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Events hosted by you
                </a>
            </h5>
            </div>
            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-block row">
            <?php foreach ($eventsToHost as $event) { ?>
                    <div class="card event-card col-md-5 col-lg-4">
                        <img class="card-img-top" data-src="" alt="100%x180" style="height: 180px; width: 100%; display: block;" 
                            src=<?php echo URL; ?>img/perform_card_img.jpg data-holder-rendered="true">
                        <div class="card-block">
                            <h4 class="card-title"><?php echo $event['host']['name']; ?></h4>
                            <span><i class="fas fa-map-marker"></i>  <?php echo $event['host']['location']; ?></span><br>
                            <span><i class="fas fa-calendar"></i>  <?php echo $event['date']; ?></span><br>
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
                        </div>
                    </div>
                <?php } ?>
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="tab" id="headingTwo">
            <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Events to perform at
                </a>
            </h5>
            </div>
            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="card-block row">
            <?php foreach ($eventsToPerform as $event) { ?>
                    <div class="card event-card col-md-5 col-lg-4">
                        <img class="card-img-top" data-src="" alt="100%x180" style="height: 180px; width: 100%; display: block;" 
                            src=<?php echo URL; ?>img/perform_card_img.jpg data-holder-rendered="true">
                        <div class="card-block">
                            <h4 class="card-title"><?php echo $event['host']['name']; ?></h4>
                            <span><i class="fas fa-map-marker"></i>  <?php echo $event['host']['location']; ?></span><br>
                            <span><i class="fas fa-calendar"></i>  <?php echo $event['date']; ?></span><br>
                            <span><i class="fas fa-user"></i>  <?php echo $event['host']['name']; ?> | Host</span><br>
                            <p class="card-text"><?php echo $event['host']['description']; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="tab" id="headingThree">
            <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Events you will attend
                </a>
            </h5>
            </div>
            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="card-block">
                <?php foreach ($eventsToAttend as $event) { ?>
                    <div class="card event-card col-md-5 col-lg-4">
                        <img class="card-img-top" data-src="" alt="100%x180" style="height: 180px; width: 100%; display: block;" 
                            src=<?php echo URL; ?>img/perform_card_img.jpg data-holder-rendered="true">
                        <div class="card-block">
                            <h4 class="card-title"><?php echo $event['host']['name']; ?></h4>
                            <span><i class="fas fa-map-marker"></i>  <?php echo $event['host']['location']; ?></span><br>
                            <span><i class="fas fa-calendar"></i>  <?php echo $event['date']; ?></span><br>
                            <span><i class="fas fa-user"></i>  <?php echo $event['host']['name']; ?> | Host</span><br>
                            <p class="card-text"><?php echo $event['host']['description']; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>