$(document).ready(function(){
    
    console.log("JS LOADED...")

    $('select').material_select()
    
    //Initialization
    $(".button-collapse").sideNav()
    $("#addmovie").hide()
    $("#listmovies").hide()
    $("#singlemovie").hide()
    $("#home").show()
    
    // List all movies Page
    $(".showlist").click(function(e){
        e.preventDefault()
        $("#home").hide()
        $("#addmovie").hide()
        $("#listmovies").show()
        $("#singlemovie").hide()
    })
    
    // Add new movie Page
    $(".showadd").click(function(e){
        e.preventDefault()
        $("#home").hide()
        $("#listmovies").hide()
        $("#singlemovie").hide()
        $('select').material_select()
        $("#addmovie").show()
        $("#add_new_movie").fadeIn()
    })

    // Get movies list
    listAll()

    var form = $("#form-signup")
    form.submit(function(event){
        event.preventDefault()

        var newUser = $.ajax({
            type: 'POST',
            url: 'ajax.php?action=signUp',
            data: form.serialize()
        })

        newUser.done(function(data){
            window.location = "activation.php";
        })

        newUser.fail(function(jqXHR){
            console.log(jqXHR.responseText)
        })

    })


    
})