$('#search').keyup(function() {
		var search_term = $(this).val();

		$.get('search.php', { search_term: search_term}, function(data) {
			$('#search_results').html(data);
		});
	});