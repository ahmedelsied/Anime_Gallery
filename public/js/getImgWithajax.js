$(function(){
   $('#watch-more').on('click',function(){
       var lastBox   = $('.box:last-child'),
           lastBox2  = $('.box-2:last-child');
       if($('#v-pills-1').hasClass('active')){
           var dataImgs = {
               "last_img"   : lastBox.attr('data_img_id'),
               "img_type"   : 0,
               "anime_id"   : lastBox.attr('data_anime_id'),
               "anime_name" : lastBox.attr('data_anime_name'),
           } 
       }else{
           var dataImgs = {
               "last_img"   : lastBox2.attr('data_img_id'),
               "img_type"   : 1,
               "anime_id"   : lastBox2.attr('data_anime_id'),
               "anime_name" : lastBox2.attr('data_anime_name'),
           }
       }
       $.ajax({
            url:'http://gallery.com:81/gallery',
            type:'post',
            data:dataImgs,
            dataType:'html',
            success:function(data){
                if(data == ''){
                    alert('لا يوجد المزيد')
                }else{
                    $('.respones-imgs.active').find('.container-1').append(data);
                }
            }
       });
   });
});