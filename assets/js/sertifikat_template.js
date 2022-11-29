const save = (name, val) => {
	const kd_sertifikat = $("#kd_sertifikat").val();
	const url = $("#url").val();

	const data = { kd_sertifikat, url, name, val };

	$.ajax({
		type: "POST",
		url: url,
		data: data,
		success: function (imgPath) {
			if (imgPath) {
				d = new Date();
				$("#imgPreviewTemplate").attr("src", imgPath + "?" + d.getTime());
			}
		},
	});
};
