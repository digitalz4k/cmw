/*
** Sign Up
*/
var form = $("#form-signup")
form.submit(function(event){
    event.preventDefault()
    var newUser = $.ajax({
        type: 'POST',
        url: 'ajax.php?action=signUp',
        data: form.serialize()
    })
    .done(function(data){
        $.get("index.php?page=activation")
    })
    .fail(function(jqXHR){
        console.log(jqXHR.responseText)
    })
})

/*
** Sign In
*/
var signin_form = $(".form-signin")
signin_form.submit(function(event){
    event.preventDefault()
    var connect = $.ajax({
        type: 'POST',
        url: 'ajax.php?action=signIn',
        data: signin_form.serialize()
    })
    .done(function(data){
        window.location.href= "index.php?page=dashboard"
    })
    .fail(function(jqXHR){
        err = jqXHR.responseText
        window.location.href= "index.php?page=login&error=" + err
    })
})