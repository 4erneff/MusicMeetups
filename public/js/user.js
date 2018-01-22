$('#submit-user').on('click', function(event){

    event.preventDefault();
    var formUrl = url + "user/createUser"; 

    $.ajax({
        type: "POST",
        url: formUrl,
        data: $("#user-form").serialize(), // serializes the form's elements.
        success: function(data)
        {
            if (data.indexOf("Duplicate entry") > -1) {
                alert("This email is already in use!");
                return;
            }
            var response = JSON.parse(data);
            if (response.success) {
                alert(response.message);
                window.location = url + "user/login";
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