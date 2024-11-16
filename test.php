<input type="text" id="currencyInput" placeholder="Nhập số tiền">
<script>
    document.getElementById("currencyInput").addEventListener("input", function(event) {
    let inputValue = event.target.value;

    // Xóa tất cả các ký tự không phải số và dấu chấm (chỉ giữ lại số và dấu chấm)
    inputValue = inputValue.replace(/[^0-9.]/g, '');

    // Nếu có dấu chấm, giữ lại chỉ một dấu chấm
    let parts = inputValue.split('.');
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ","); // Chèn dấu phân cách hàng nghìn

    if (parts[1]) {
        parts[1] = parts[1].substring(0, 2); // Giới hạn chỉ 2 chữ số sau dấu thập phân
    }

    // Đảm bảo rằng chỉ có một dấu phân cách thập phân
    event.target.value = parts.join('.');

    // Thêm ký hiệu tiền tệ sau khi xử lý
    event.target.value = event.target.value + ' ₫';
});
</script>