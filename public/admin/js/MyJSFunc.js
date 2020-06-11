$(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });
    $('.confirm').click(function(){
      return confirm('هل أنت متأكد من مسح هذا التسجيل؟ لا يمكن التراجع عن هذا القرار.');
    });
    $('.custom-inpt-file').on('change',function(){
      $(this).next().text($(this).val())
    });
    $('.anime_name ').on('change',function(){
      $(this).prev().val($(this).find('option:selected').text());
    });
})

// Filterable Table
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable .cover").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});