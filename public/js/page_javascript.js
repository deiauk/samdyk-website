

$(document).ready(function() {
    $('.create-topic').click(function(){
        var a = $('#myModal').is(':visible');
        if(a) {
            var bla = $('#comment').val();
            alert(bla);
        }

    });

    $('.save').click(function() {
        var themeVar = $('#theme');
        var desVar = $('#description');
        var title = themeVar.val();
        var body = desVar.val();

        var isThemeValid = themeVar.parsley().isValid();
        var isDescriptionValid = desVar.parsley().isValid();

        if(isThemeValid && isDescriptionValid) {
            var obj = {
                user_id : 1,
                title: title,
                body : body,
                post_type : 1,
                user_name : "david"
            };

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')},
                url: '/post/save', // This is the url we gave in the route
                method: 'POST', // Type of response and matches what we said in the route
                data: obj, // a JSON object to send back
                success: function(response){ // What to do if we succeed
                    console.log("asds " + response);
                    $('#myModal').modal('toggle');
                    themeVar.val('');
                    desVar.val('');
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }
    });

    $('.skillbar').each(function(){
        $(this).find('.skillbar-bar').animate({
            width:$(this).attr('data-percent')
        },2000);
    });

    $(".show-skills").click(function(){
        $("#skills").toggle(200);
        var button = $(this);
        button.text(button.text() === "Įgūdžiai" ? "Slėpti" : "Įgūdžiai")
        button.toggleClass("hide-skills")
    });

    $(".edit_profile").hover(function(){
        $(this).css("background","#02baff");
        var img =  $(".edit_profile > img");
        $(img).attr({
            src: 'http://www.iconsdb.com/icons/preview/orange/edit-xxl.png'
        })

    },function(){
        $(this).css("background","");
        var img =  $(".edit_profile > img");
        $(img).attr({
            src: 'https://image.flaticon.com/icons/svg/61/61456.svg'
        })
    });

    $('.js-add-skill').on('click', function() {
        var tmp = $('.skill-input').first().clone();
        //var tmp = '<div class="skill-input"><div class="col-md-9"><input type="text" class="form-control input-sm skill-name"/> </div> <div class="col-md-2"> <input type="number" class="form-control input-sm skill-name" name="quantity" min="1" max="100"><br> </div> <div class="col-md-1 delete"> <i class="fa fa-trash-o" aria-hidden="true"></i> </div></div>';
        //console.log(JSON.stringify(tmp) + "");
        $('input', tmp).val('');
        $('.skill-list').append(tmp);
        console.log("sdfdsf");
    });

    $('.js-save-user-profile').click(function () {
        var description = $('#description-user').val();
        var skills = [];

        $(".skill-input").each(function(index) {
            var skill_name = $("input[name='skill_name[]']", this).val();
            var skill_val = $("input[name='skill_val[]']", this).val();
            if(skill_name.length > 0 && skill_val != '') {
                skills.push({"skill_title": skill_name, "knowledge_level": skill_val});
            }
        });

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')},
            url: 'redaguoti_profili', // This is the url we gave in the route
            method: 'POST', // Type of response and matches what we said in the route
            data: {"skills": skills, "desc" : description}, // a JSON object to send back
            success: function(response) { // What to do if we succeed
                 console.log("asds " + JSON.stringify(response));
                // $('#myModal').modal('toggle');
                // themeVar.val('');
                // desVar.val('');
                $('#edit-modal').modal('toggle');
                location.reload();
               // var tmp = $('.skill-input');
               // var cl = tmp.clone();
               // tmp.remove();
               // $('.skill-list').append(cl);
            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    });

    $('.skill-list').on('click', '.delete', function() {
        console.log("sdfibsdfbsdif")
        $(this).parent().remove();
    });

    $('#edit-modal').on('show.bs.modal', function (e) {
        var id = e.relatedTarget.dataset.yourparameter;

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')},
            url: 'gauti_duomenis/' + id,
            method: 'GET', // Type of response and matches what we said in the route
            success: function(response) { // What to do if we succeed
                var obj = jQuery.parseJSON(response);
                console.log(response);
                // if(obj.skills.length > 0) {
                //     $('.skill-name').val(obj.skills[0].skill_title);
                //     $('.skill-percent').val(obj.skills[0].knowledge_level);
                // }
                var numItems = $('.skill-list');
                for(var i=0; i<obj.skills.length; i++) {
                    var tmp = $('.skill-input').first();
                    $('.skill-name', tmp).val(obj.skills[i].skill_title);
                    $('.skill-percent', tmp).val(obj.skills[i].knowledge_level);
                    var sec = tmp.clone();
                    numItems.append(sec);
                }
                $( ".skill-name" ).last().val('');
                $( ".skill-percent" ).last().val('');
                // var tmp = $('.skill-input').first().clone();
                // $('.skill-name', tmp).val('');
                // $('.skill-percent', tmp).val('');
                // numItems.append(tmp);
                $('#description-user').val(obj.description);
            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    });

    $(document).on('hide.bs.modal', '#edit-modal', function (e) {
        $('#description-user').val('');
        $('.skill-list').find('.skill-input:not(:eq(0))').remove();
    });

    //write_comment_modal
    // $('#edit-modal').on('show.bs.modal', function (e) {
    $('.post_comment').click(function (e) {
        var field = $('#comment-field');
        var txt = field.val();
        var id = $(this).parent().attr("data-usr");
        var obj = {
            'user_to_write_comment_id' : id,
            'desc': txt
        };

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')},
            url: '/komentaras',
            method: 'POST', // Type of response and matches what we said in the route
            data: obj,
            success: function(response) { // What to do if we succeed
                $('#write_comment_modal').modal('toggle');
                field.val('');
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    });
});

