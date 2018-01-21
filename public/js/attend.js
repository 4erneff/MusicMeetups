$('#submit-attender').on('click', function(event){

    event.preventDefault();
    var formUrl = url + "attend/addAttender/" + eventId;
    
    $.ajax({
        type: "POST",
        url: formUrl,
        data: $("#attend-form").serialize(), // serializes the form's elements.
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