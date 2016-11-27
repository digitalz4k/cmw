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

    newUser.done(function(data){
        $.get("router.php?activation")
    })

    newUser.fail(function(jqXHR){
        console.log(jqXHR.responseText)
    })

})

/*
** Sign In
*/
var signin_form = $("#form-signin")
signin_form.submit(function(event){
    event.preventDefault()

    var connect = $.ajax({
        type: 'POST',
        url: 'ajax.php?action=signIn',
        data: signin_form.serialize()
    })

    connect.done(function(data){
        window.location.href= "router.php?page=dashboard&auth=1"
    })

    connect.fail(function(jqXHR){
        console.log(jqXHR.responseText)
    })
})