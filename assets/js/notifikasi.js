$(".modal").on("shown.bs.modal", function () {
	if ($(this).data("is_read") == 0) {
		const url = $(this).data("url");
		const id = $(this).data("id");

		const data = { url, id };

		$.ajax({
			type: "POST",
			url: url,
			data: data,
			success: function (response) {
				response = JSON.parse(response);
				if (response) {
					const list = $("#notif-" + response.id);
					list.removeClass("alert-secondary");
					list.addClass("alert-light");

					$("#unread")
						.find("#notif-" + response.id)
						.remove();

					$("#totalNotif").text(response.total);
				}
			},
		});
	}
});
