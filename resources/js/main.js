const { post } = require("jquery");

    $(document).ready(function(){
        //sidebar slide

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

   $('.her').click(function(){
$(this).html($(this).html()== 'Menu'?'<span style="font-size:20pt" class="fa fa-times" ></span>':'Menu')
       $('.sidebar').toggle()

   });




//form submission

$('#post_question').submit(function(e){
    e.preventDefault()

    $('.send_btn').text('Publishing...')


$.ajax({
url:'/post-questions',
type:'POST',
data:$(this).serialize()
}).done(function(response){
    $('.send_btn').removeClass('btn-primary')
    $('.send_btn').addClass('btn-success')
    $('.send_btn').text('Published')
   $('#post_question')[0].reset()

   $('.alert').removeClass('alert-danger')
   $('.alert').addClass('alert-success')
   $('.alert').text('The Question was sent succesfully')
   setTimeout(function(){

    $('.alert').removeClass('alert-success')
    $('.alert').text('')

   },6000)

}).fail(function(){
        $('.send_btn').text('Publish')
        $('.alert').removeClass('alert-success')

        $('.alert').addClass('alert-danger')
        $('.alert').text('Errors Occured when Sending your Question ')
        setTimeout(function(){

            $('.alert').removeClass('alert-danger')
            $('.alert').text('')
        },6000)
});
})

//answer submission

$('#post_questions').submit(function(e){
    e.preventDefault()

    $('.send_btn').text('Sending...')


$.ajax({
url:'/crk-fc',
type:'POST',
data:$(this).serialize()
}).done(function(response){
    $('.send_btn').removeClass('btn-primary')
    $('.send_btn').addClass('btn-success')
    $('.send_btn').text('Answer Submitted')

   $('.alert').removeClass('alert-danger')
   $('.alert').addClass('alert-success')
   $('.alert').text('Sent succesfully')
   setTimeout(function(){

    $('.alert').removeClass('alert-success')
    $('.alert').text('')

   },6000)

}).fail(function(){
        $('.send_btn').text('Send Answer')
        $('.alert').removeClass('alert-success')

        $('.alert').addClass('alert-danger')
        $('.alert').text('Errors Occured when sending your Answer')
        setTimeout(function(){

            $('.alert').removeClass('alert-danger')
            $('.alert').text('')
        },6000)
});
})

//update question
$('#post_questionsss').submit(function(e){
    e.preventDefault()

    $('.send_btn').text('Editing...')
var id= $('input[name=id]').val()
$.ajax({
url:'/'+id,
type:'PUT',
data:$(this).serialize()
}).done(function(response){
    $('.send_btn').removeClass('btn-primary')
    $('.send_btn').addClass('btn-success')
    $('.send_btn').text('Edited')
   $('.alert').removeClass('alert-danger')
   $('.alert').addClass('alert-success')
   $('.alert').text('Question Update succesfully')
   setTimeout(function(){
    $('.alert').removeClass('alert-success')
    $('.alert').text('')

   },6000)

}).fail(function(){
    $('.send_btn').removeClass('btn-success')
    $('.send_btn').addClass('btn-primary')
        $('.send_btn').text('Edit')
        $('.alert').removeClass('alert-success')

        $('.alert').addClass('alert-danger')
        $('.alert').text('Errors Occured when editing your Question')
        setTimeout(function(){

            $('.alert').removeClass('alert-danger')
            $('.alert').text('')
        },6000)
});
})

//update answer

$('#post_questionss').submit(function(e){

    e.preventDefault()

    $('.send_btn').text('Updating...')
    var id= $('input[name=id]').val()
$.ajax({
url:'/'+id,
type:'PUT',
data:$(this).serialize()
}).done(function(response){
    $('.send_btn').removeClass('btn-primary')
    $('.send_btn').addClass('btn-success')
    $('.send_btn').text('Update Submitted')

   $('.alert').removeClass('alert-danger')
   $('.alert').addClass('alert-success')
   $('.alert').text('Edited succesfully')
   setTimeout(function(){

    $('.alert').removeClass('alert-success')
    $('.alert').text('')

   },6000)

}).fail(function(){
        $('.send_btn').text('Edit Answer')
        $('.alert').removeClass('alert-success')

        $('.alert').addClass('alert-danger')
        $('.alert').text('Errors Occured when updating your answer')
        setTimeout(function(){

            $('.alert').removeClass('alert-danger')
            $('.alert').text('')
        },6000)
});
})


        $('#search').on('keyup',function() {
           var query = $(this).val();



           $.ajax({

                url:"/search",
                 type:"GET",
                data:{'search':query},
                success:function(res){
                    $('#search_list').html(res);

            }
        })
        });




$('input[name="answered"]').on('click',function(e){
        e.preventDefault()


    var id= $('input[name=id]').val()
    var answered= $('input[name=answered]').val()
    $.ajax({
    url:'/a/'+id,
    type:'PUT',
    data:{'answered':answered}
    }).done(function(response){
$('#all').html('<h5 style="color:green">Answered<span style="color:green" class="fa fa-check"></span></h5>')
    })
})


$('#follow').on('click',function(e){
    e.preventDefault()

$('#follow').text('Following...')
var post_id= $('input[name=ques_id]').val()
var isFollow= $('input[name=isFollow]').val()
var isAnswered= $('input[name=isAnswered]').val()
var topic= $('input[name=topic]').val()
var body= $('input[name=body]').val()
var category= $('input[name=category]').val()
var creates= $('input[name=creates]').val()
var question_provider= $('input[name=question_provider]').val()
$.ajax({
url:'/follow',
type:'POST',
data:{'post_id':post_id,'isFollow':isFollow,'isAnswered':isAnswered,
'topic':topic,'body':body,'category':category,'question_provider':question_provider,
'creates':creates
}
}).done(function(response){
    $('#showFollo').css({display:'none'})
    $('.own1').css({display:'inline'})

}).fail(function(){

    $('#follow').text('Follow')
})
})


$('#dfollow').on('click',function(e){
    e.preventDefault()

    $('#dfollow').text('Unfollowing...')

var post_id= $('input[name=ques_id]').val()
$.ajax({
url:'/follow/'+post_id,
type:'DELETE',
}).done(function(response){
$('#dfollow').css({display:'none'})
$('#showFollo').css({display:'inline'})
}).fail(function(){
    $('#dfollow').text('Unfollow')

})
})




































































































    })

