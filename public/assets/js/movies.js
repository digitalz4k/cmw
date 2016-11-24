/* 
** LIST ALL MOVIES 
*/
var listContent = $("#movies_list")

var listAll = function () {
    var list = $.ajax({
        method: "GET",
        url: "ajax.php",
        data: {
            "action": "listAll"
        },
        beforeSend: function () {
            listContent.html("<div class='listLoader'>Loading...</div>")
        }
    })
        
    list.done(function (res) {
        $(".listLoader").remove()
        var res = JSON.parse(res)
        var content = ''
        
        for(var i=0; i<res.length; i++) {
            content += '<li class="collection-item avatar">'
            //content += '<i class="fa fa-film circle blue"></i>'
            content += '<img class="circle" src="public/uploads/'+ res[i].poster_url +'" width="80" />'
            content += '<span class="title blue-text">'+ res[i].title +'</span>'
            content += '<p>Year: '+ res[i].year_of_prod +'<br/>Producer: '+ res[i].producer +'</p>'
            content += '<a href="#!" class="secondary-content movie-link" data-id="'+res[i]._id+'"><i class="fa fa-caret-right blue-text"></i></a>'
            content += '</li>'
        }
        
        listContent.append(content)
        
        $("a.movie-link").click(function(e){
            e.preventDefault()
            $("#listmovies").hide()
            var id = $(this).attr("data-id")
            displayMovie(id)
        })
    })
    
    list.fail(function (jqXHR, textStatus) {
        listContent.html("<li>"+jqXHR.responseText+"</li>")
    })
}
    
/* 
** GET CATEGORY LIST
*/
var categories = $.ajax({
    method: "POST",
    url: "ajax.php",
    data: {
        "action": "getCategories"
    }
})

categories.done(function (data) {
    
    var data = JSON.parse(data)
    
    data.forEach(function (category) {
        $("#movie_categories").append('<option value="'+category+'">'+category+'</option>')
    })
    
})

categories.fail(function(jqXHR){
    console.log(jqXHR.responseText)
})

/* 
** ADD NEW MOVIE
*/
var form = $("#add_new_movie")

form.submit(function(e){
    e.preventDefault()
    
    if($("#movie_titre").val().length < 4 ||
        $("#movie_real").val().length < 5 ||
        $("#movie_prod").val().length < 5 ||
        $("#movie_actors").val().length < 5 ||
        $("#movie_synop").val().length < 5){
            
        $(".add-error").html("Veuillez vérifier les données du formulaire.")
        
    } else {
    
        var req = $.ajax({
            method: "POST",
            url: "ajax.php?action=addMovie",
            data: form.serialize(),
            beforeSend: function () {
                form.fadeOut()
                $(".addLoader").html("Adding <b>"+ $('#movie_titre').val() +"</b> to your movies list.")
            }
        })
        
        req.done(function(data){
            $(".addLoader").html("")
            $("#addmovie").hide()
            form[0].reset()
            $("#listmovies").show()
            listAll()
        })
        
        req.fail(function(jqXHR){
            console.log(jqXHR.responseText)
            $(".addLoader").html("")
            form.fadeIn()
        })
        
    }
})
        
/* 
** SHOW SINGLE MOVIE
*/  
var displayMovie = function (id) {
    var listSingle = $.ajax({
        method: "GET",
        url: "ajax.php?action=listSingle",
        data: {
            id: id
        },
        beforeSend: function () {
            $("#movieSingle").html("")
            $("#singlemovie").show()
            $(".movieSingleLoader").html("Loading informations...")
        }
    })
    
    listSingle.done( function (data) {
        $(".movieSingleLoader").hide().html("")
        var data = JSON.parse(data)
        var content = ''
        
        content += '<h1 class="blue-text">'+data.title+'</h1><ul>'
        content += '<li>Actors: '+data.actors+'</li>'
        content += '<li>Director: '+data.director+'</li>'
        content += '<li>Producer: '+data.producer+'</li>'
        content += '<li>Year: '+data.year_of_prod+'</li>'
        content += '<li>Language: '+data.language+'</li>'
        content += '<li>Category: '+data.category+'</li>'
        content += '<li><p>Storyline: '+data.storyline+'</p></li>'
        content += '<li><h5>Trailer:</h5><div class="video-container"><iframe width="560" height="315" src="https://www.youtube.com/embed/'+data.video+'" frameborder="0" allowfullscreen></iframe></div></li></ul>'
        
        $("#movieSingle").html(content)
    })
    
    listSingle.fail( function (jqXHR) {
        $(".movieSingleLoader").html("")
        $("#singlemovie").hide()
        $(".listMovies").show()
        console.log(jqXHR.responseText)
    })
}