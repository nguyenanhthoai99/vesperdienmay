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


document.getElementById('sp_hinh').onchange = function(evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;

    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function() {
            document.getElementById("hinhDemo").src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    } else {

    }
}

document.getElementById('sp_hinhchitiet').onchange = function(evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;

    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function() {
            document.getElementById("hinhDemoChiTiet").src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    } else {

    }
}

