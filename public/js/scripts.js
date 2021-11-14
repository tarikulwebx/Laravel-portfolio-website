
$( document ).ready(function() {
    new WOW().init();

    $("#intro-coverflow").flipster({
        style:'coverflow',
        start:'center',
        fadeIn: 1000,
        loop: false,
        autoplay: false,
    });
});


var scroll = new SmoothScroll('a[href*="#"]', {
    header: '.navbar',
});




/*
*   Image input preview
*/
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#image_preview').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

$("#image_input_with_preview").change(function(){
    readURL(this);
});