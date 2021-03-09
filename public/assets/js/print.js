function printData()
{
    $('.btn-toolbar').css('display','none');

    $('#print').css('visible','hidden');

    window.print();
    setTimeout(() => {  $('.btn-toolbar').css('display','block');
        $('.waves-effect').css('display','inline-block'); }, 500);

}

$('#print').on('click',function(){
    printData();
});
