<div class="container">
    <div class="row">
        <div id="map" class="col-md-12" style="height: 300px;"></div>
        <script>
            var geocoder, map;

            function codeAddress(address) {
                geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    'address': address
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        var myOptions = {
                            zoom: 15,
                            center: results[0].geometry.location,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        }
                        map = new google.maps.Map(document.getElementById("map"), myOptions);

                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    }
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXD-cHS7-m3MOD7S1imtQAuMKcExKe1ek"></script>
        <script>
            codeAddress('<?php echo $event['host']['location'] ?>');
        </script>
    </div>
    <div class="row form-row">
        <form id ="attend-form"class="col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="full-name-input">Full name</label>
                <input type="text" class="form-control" id="full-name-input" name="name" 
                <?php if ($this->userExists()) { echo "value='" . $_SESSION['user']['name']. "' "; } ?>required placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email-input">Email address</label>
                <input type="email" class="form-control" id="email-input" name="email" 
                <?php if ($this->userExists()) { echo "value='" . $_SESSION['user']['email'] . "' "; } ?>required placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="extra-people-input">How many friends you will bring</label>
                <select name="extra_people" type="nummber" class="form-control" id="extra-people-input">
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </div>
            <button type="submit" id="submit-attender" class="btn btn-primary">Join</button>
        </form>
        <div class="card event-card col-md-5 col-lg-4">
            <img class="card-img-top" data-src="" alt="100%x180" style="height: 180px; width: 100%; display: block;" 
                src=<?php echo URL; ?>img/attend_card_img.jpg data-holder-rendered="true">
            <div class="card-block">
                <h4 class="card-title"><?php echo $event['performer']['name'] ?></h4>
                <span><i class="fas fa-map-marker"></i> <?php echo $event['host']['location'] ?></span><br>
                <span><i class="fas fa-calendar"></i>  <?php echo $event['date'] ?></span><br>
                <span><i class="fas fa-user"></i>  <?php echo $event['host']['name'] ?> | host</span><br>
                <span><i class="fas fa-users"></i> <?php echo $event['remainingplaces'] . ' slots of ' . $event['host']['maxguests'] . ' available' ?> </span>
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
                    </div><br>
                <p class="card-text"><?php echo ('Host: ' . $event['host']['description']) ?></p>
                <p class="card-text"><?php echo ('Performer: ' . $event['performer']['description']) ?></p>
            </div>
        </div>  
    </div>
</div>

<script>
    var eventId = <?php echo $event['id']; ?>;
</script>