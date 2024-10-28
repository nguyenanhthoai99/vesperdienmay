function increaseSize(el) {
    $(el).css("position", "relative");
    $(el).css("top", -10);
}

function decreaseSize(el) {
    $(el).css("position", "relative");
    $(el).css("top", 0);
}

var dem = 1;

function cong() {
    dem = dem + 1;
    if (dem < 10) {
        document.getElementById("soluongmua").value = dem;

    } else {
        dem = 9;
    }
}

function tru() {
    dem = dem - 1;
    if (dem > 0) {
        document.getElementById("soluongmua").value = dem;
    } else {
        dem = 1;
    }
}