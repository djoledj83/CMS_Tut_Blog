CKEDITOR.editorConfig = function( config ) {
	config.toolbar = [
	
		{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'Undo', 'Redo' ] },

		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline',  'Superscript', '-' ] },
		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Blockquote', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
		{ name: 'links', items: [ 'Link'] },
		{ name: 'insert', items: [ 'Smiley'] },

		{ name: 'styles', items: [ 'Font', 'FontSize' ] },
		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },

	];
};