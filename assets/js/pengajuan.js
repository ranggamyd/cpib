let i = 1;

$("#addProduct").click(function () {
	i++;
	const input = `
    <div class="row mb-2" id="productRow-${i}">
      <div class="col"><input type="text" name="jenis_produk[][produk]" placeholder="Nama Produk .." class="form-control" required></div>
      <div class="col-2"><button type="button" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-block ml-2 removeProduct" id="${i}" data-toggle="tooltip" data-placement="right" title="Hapus Produk"><i class="fas fa-backspace"></i></button></div>
    </div>
  `;
	$("#dynamic-product").append(input);
});

$(document).on("click", ".removeProduct", function () {
	var id = $(this).attr("id");
	$("#productRow-" + id + "").remove();
});
