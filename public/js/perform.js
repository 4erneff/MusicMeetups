$('#submit-perform').on('click', function(event){

    event.preventDefault();
    var formUrl = url + "perform/addPerformer/" + eventId; 

    $.ajax({
        type: "POST",
        url: formUrl,
        data: $("#performer-form").serialize(), // serializes the form's elements.
        success: function(data)
        {
            var response = JSON.parse(data);
            if (response.success) {
                alert(response.message);
                window.location = url + "attend";
            } else {
                var messages = "";
                for (var key in response.errors){
                    var msg = response.errors[key];
                    messages += msg;
                    messages += "\n";
                }
                alert(messages);
            }
        },
        error: function(data)
        {
            alert(data);
        }
    });
});