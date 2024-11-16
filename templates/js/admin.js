
document.getElementById('sp_hinh').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;

    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById("hinhDemo").src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    } else {

    }
}

document.getElementById('sp_hinhchitiet').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;

    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById("hinhDemoChiTiet").src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    } else {

    }
}
