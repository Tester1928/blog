$(document).ready(function () {
   $("#close-file").on("click",function (){
       let curOb = $(this);
       let type = curOb.attr("data-type");
       let csrf_token = $('meta[name="csrf_token"]').attr('content')

       $.ajax({
           type:'POST',
           headers: {'X-CSRF-TOKEN': csrf_token},
           url:'/admin/'+type,
           data: {
               '_method': 'delete'
           },
           dataType:"html",
           success: function (data) {
               curOb.closest("#upload-container").html(data)
           }
       });
   })
})
