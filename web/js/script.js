$('.likeImg').on('click',function(e){
    e.preventDefault();
    let selectImg=$(this).attr('data-img');
    $('.likeImg[data-img='+ selectImg +']').hide();
    $('.dizlikeImg[data-img='+ selectImg +']').show();
    editLike('like',selectImg);
})
  
$('.dizlikeImg').on('click',function(e){
    e.preventDefault();
    let selectImg=$(this).attr('data-img');
    $('.dizlikeImg[data-img='+ selectImg +']').hide();
    $('.likeImg[data-img='+ selectImg +']').show();
    editLike('dizlike',selectImg);
})
  
function editLike(action,id_image){
    $.ajax({
        url: '/main/edit_like',
        type: 'post',
        data: {action,id_image},
        success: function (likes) {
            let info=$('[data-imgage_id='+id_image+'] .like .number');
            info.each((item)=>{
                info[item].textContent=likes
            });            
        },
        error: function (jqXHR, exception) {
            console.log('Youps');
        }
    });
}

$('.gallery img.image').on('click',function(){
    let id_image=$(this).parent().data("imgage_id");
    editView(id_image);

    let image=$(this).attr('src');
    $('#modal.modalImage').show();
    $('#modal.modalImage img').attr('src',image);    
});
$('#modal.modalImage').on('click',function(){
    $('#modal.modalImage').hide();
})

function editView(id_image){
    $.ajax({
        url: '/main/edit_view',
        type: 'post',
        data: {id_image},
        success: function (view) {
            let info=$('[data-imgage_id='+id_image+'] .view .number');
            info.each((item)=>{
                info[item].textContent=view
            });            
        },
        error: function (jqXHR, exception) {
            console.log('Youps');
        }
    });
}