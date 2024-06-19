function increaseSize(el) {
    $(el).css("position", "relative");
    $(el).css("top", -10);
}

function decreaseSize(el) {
    $(el).css("position", "relative");
    $(el).css("top", 0);
}

$(function() {
    var showNumber = 4;
    if (window.screen.width < 768) {
        showNumber = 1;
    }
    if (window.screen.width > 767 && window.screen.width < 1024) {
        showNumber = 2;
    }
    $('.sanpham-hot').slick({
        infinite: true,
        slidesToShow: showNumber,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
        prevArrow: '<span class="priv_arrow"><button type="button" class="btn btn-light"><i class="fa fa-chevron-left" aria-hidden="true"></button></i></span>',
        nextArrow: '<span class="next_arrow"><button type="button" class="btn btn-light"><i class="fa fa-chevron-right" aria-hidden="true"></button></i></span>',
    });
})