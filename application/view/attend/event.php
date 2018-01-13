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
                            zoom: 12,
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
            codeAddress("Sofia, Bulgaria, Musagenitsa 88A");
        </script>
    </div>
    <div class="row form-row">
        <form class="col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="full-name-input">Full name</label>
                <input type="text" class="form-control" id="full-name-input" required placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email-input">Email address</label>
                <input type="email" class="form-control" id="email-input" required placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="extra-people-input">How many friends you will bring</label>
                <select class="form-control" id="extra-people-input">
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Join</button>
        </form>
        <div class="card event-card col-md-5 col-lg-4">
            <img class="card-img-top" data-src="" alt="100%x180" style="height: 180px; width: 100%; display: block;" 
                src=<?php echo URL; ?>img/attend_card_img.jpg data-holder-rendered="true">
            <div class="card-block">
                <h4 class="card-title">Preslava</h4>
                <span><i class="fas fa-map-marker"></i>  Mladost 1 blok 54</span><br>
                <span><i class="fas fa-calendar"></i>  12-02-2018</span><br>
                <span><i class="fas fa-user"></i>  Dimitar Vlahovski | host</span><br>
                <span><i class="fas fa-users"></i>  1 slots of 20 available</span>
                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" 
                    style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div><br>
                <p class="card-text">Host: This will be a rock party at my own apartment. Bring up some beers and join us to have great time together!</p>
                <p class="card-text">Preslava: Everybody knows me already. Yeah, thats me!</p>
            </div>
        </div>  
    </div>
</div>