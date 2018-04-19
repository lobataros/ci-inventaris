$('#info').on('show.bs.modal', function(e){
	$.post(
		$(e.relatedTarget).data('action'),
		{kode: $(e.relatedTarget).data('kode')},
		function(data){
			$('#info').html(data)
		})
});

$('#edit').on('show.bs.modal', function(e){
	$.post(
		$(e.relatedTarget).data('action'),
		{kodeEdit: $(e.relatedTarget).data('kode')},
		function(data){
			$('#edit').html(data)
		})
});

$('#addStok').on('show.bs.modal', function(e){
	$.post(
		$(e.relatedTarget).data('action'),
		{kodeBar: $(e.relatedTarget).data('kode')},
		function(data){
			$('#addStok').html(data)
		})
});

$('#pinjamkan').on('show.bs.modal', function(e){
	$.post(
		$(e.relatedTarget).data('action'),
		{kodeBarang: $(e.relatedTarget).data('kode')},
		function(data){
			$('#pinjamkan').html(data)
		})
});

$('#kembalikan').on('show.bs.modal', function(e){
	$.post(
		$(e.relatedTarget).data('action'),
		{kodepinjam: $(e.relatedTarget).data('kode')},
		function(data){
			$('#kembalikan').html(data)
		})
});

$('#infoku').on('show.bs.modal', function(e){
	$.post(
		$(e.relatedTarget).data('action'),
		{kodepinjam: $(e.relatedTarget).data('kode')},
		function(data){
			$('#infoku').html(data)
		})
});

$('#editsup').on('show.bs.modal', function(e){
	$.post(
		$(e.relatedTarget).data('action'),
		{kodesup: $(e.relatedTarget).data('kode')},
		function(data){
			$('#editsup').html(data)
		})
});

$('#editu').on('show.bs.modal', function(e){
	$.post(
		$(e.relatedTarget).data('action'),
		{id: $(e.relatedTarget).data('kode')},
		function(data){
			$('#editu').html(data)
		})
});