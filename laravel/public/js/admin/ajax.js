$(document).ready(function () {
   $("#close-file").on("click",function (){
    let user_id = $(this).attr("data-user_id");
    let csrf_token = $('meta[name="csrf_token"]').attr('content')

       $.ajax({
           type:'POST',
           headers: {'X-CSRF-TOKEN': csrf_token},
           url:'/admin/profile/'+user_id+'/deleteAvatar',
           data: {
               '_method': 'delete'
           },
           success: function () {
               window.location.reload();
           }
       });
   })
})
