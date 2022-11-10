var previewImage = function (input, block) {
	var fileTypes = ["jpg", "jpeg", "png"];
	var extension = input.files[0].name
		.split(".")
		.pop()
		.toLowerCase(); /*se preia extensia*/
	var isSuccess = fileTypes.indexOf(extension) > -1; /*se verifica extensia*/

	if (isSuccess) {
		var reader = new FileReader();

		reader.onload = function (e) {
			block.attr("src", e.target.result);
		};
		reader.readAsDataURL(input.files[0]);
	} else {
		alert("Format tidak didukung!");
	}
};

$(document).on("change", "input[name=avatar]", function () {
	previewImage(this, $(".imgPreview"));
});
