$().ready(function () {


	//IMPORT FOOTER
	$.ajax({
		type: "GET",
		url: "./template/websiteLogo.html",
		async: false,
		success: function(text) {
			$("head").append(text);
		}
	})
	$("footer").load("./template/footer.html", function() {
		var year = new Date().getFullYear();
		$(".currentYear").html(year);
	 });
	
	$("nav").load("./template/nav.html", function () {
		
		var url = window.location.pathname;
		var filename = url.substring(url.lastIndexOf('/') + 1);
		
		$("a").each(function () {

			var href = $(this).attr("href");
//            console.log(href);
			
			if (filename == href) {
				$(this).parent().addClass("current");
				
				
				try {
					var parentValue = $(this).parent().parent().attr("class");
					
					if (parentValue == 'dropdown') {
						$(this).parent().parent().parent().addClass("current")
					}
					
				} catch (err) {}
				
				
			}

		});
	});
});
