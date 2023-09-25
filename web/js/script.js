// $('.likeImg').on('click',function(){
//     let selectImg=$(this).attr('data-img');
//     $('.likeImg[data-img='+ selectImg +']').hide();
//     $('.dizlikeImg[data-img='+ selectImg +']').show();
//     // editLike('like');
// })

// $('.dizlikeImg').on('click',function(){
//     let selectImg=$(this).attr('data-img');
//     $('.dizlikeImg[data-img='+ selectImg +']').hide();
//     $('.likeImg[data-img='+ selectImg +']').show();
//     // editLike('dizlike');
// })

// function editLike(action){
//     if (action=='like'){
//         console.log(action);
//     //     $.ajax({
//     //         url: '/controllers/MainController/editLike',
//     //         type: 'post',
//     //         data: {searchname: $("#searchname").val() , searchby:$("#searchby").val()},
//     //         success: function (data) {
//     //           alert(data);

//     //         }

//     //   });
//     }else{
//         console.log(action);
//     }
// }

$('.gallery img.image').on('click',function(){
    let image=$(this).attr('src');
    $('#modal.modalImage').show();
    $('#modal.modalImage img').attr('src',image);    
});
$('#modal.modalImage').on('click',function(){
    $('#modal.modalImage').hide();
})