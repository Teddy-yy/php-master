// const {
//     ClassicEditor,
//     Essentials,
//     Bold,
//     Italic,
//     Font,
//     Paragraph
// } = CKEDITOR;

// ClassicEditor
//     .create( {
//         attachTo: document.querySelector( '#editor' ),
//         licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE4MTMxMDM5OTksImp0aSI6IjdiZDIyZDFkLWVhMmYtNGJjMy1iMzM5LTUyZWY2MzAwMTE0YiIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiXSwiZmVhdHVyZXMiOlsiRFJVUCIsIkUyUCIsIkUyVyJdLCJyZW1vdmVGZWF0dXJlcyI6WyJQQiIsIlJGIiwiU0NIIiwiVENQIiwiVEwiLCJUQ1IiLCJJUiIsIlNVQSIsIkI2NEEiLCJMUCIsIkhFIiwiUkVEIiwiUEZPIiwiV0MiLCJGQVIiLCJCS00iLCJGUEgiLCJNUkUiLCJNRVIiXSwidmMiOiJlZWI0Yjg0MiJ9.XkFXDu9gdF4FH7D1qldzL3XatF3JpDVtPUbrBQrIuJ-ZtYUY7c432u_TQsklfR-8J_gsSTLe1HtKvF_WpWPpbQ',
//         plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
//         toolbar: [
//             'undo', 'redo', '|', 'bold', 'italic', '|',
//             'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
//         ],
//         root: { 
//             placeholder: 'Type here...'
//         }
//     } )
//     .then( /* ... */ )
//     .catch( /* ... */ );

/**
 * This configuration was generated using the CKEditor 5 Builder. You can modify it anytime using this link:
 * https://builder.ckeditor.com/#installation/NoNgNARAzAdArDADBScAcAWEjEjhgTigCYB2AjYkxARnMS0VJyidJuMTmyrnJCwc0KCAFMAdikRhgNMNOlzFAXUiiAxhgBGiAIY0IyoA
 */

const {
	ClassicEditor,
	Autosave,
	Essentials,
	Paragraph,
	Autoformat,
	TextTransformation,
	LinkImage,
	Link,
	ImageBlock,
	ImageToolbar,
	BlockQuote,
	Bold,
	CloudServices,
	ImageUpload,
	ImageInsertViaUrl,
	AutoImage,
	Table,
	TableToolbar,
	Emoji,
	Mention,
	Heading,
	ImageTextAlternative,
	ImageCaption,
	ImageStyle,
	Indent,
	IndentBlock,
	ImageInline,
	Italic,
	List,
	AdjacentListsSupport,
	MediaEmbed,
	MediaEmbedStyle,
	MediaEmbedToolbar,
	TableCaption,
	TodoList,
	Underline
} = window.CKEDITOR;

const LICENSE_KEY =
	'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE4MTMxMDM5OTksImp0aSI6IjIxZTFkY2MzLThhMTMtNDAwMC1hNDU3LTliYjQwN2MzOGYxYiIsImxpY2Vuc2VkSG9zdHMiOlsiMTI3LjAuMC4xIiwibG9jYWxob3N0IiwiMTkyLjE2OC4qLioiLCIxMC4qLiouKiIsIjE3Mi4qLiouKiIsIioudGVzdCIsIioubG9jYWxob3N0IiwiKi5sb2NhbCJdLCJ1c2FnZUVuZHBvaW50IjoiaHR0cHM6Ly9wcm94eS1ldmVudC5ja2VkaXRvci5jb20iLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIl0sImxpY2Vuc2VUeXBlIjoiZGV2ZWxvcG1lbnQiLCJmZWF0dXJlcyI6WyJEUlVQIiwiRTJQIiwiRTJXIl0sInJlbW92ZUZlYXR1cmVzIjpbIlBCIiwiUkYiLCJTQ0giLCJUQ1AiLCJUTCIsIlRDUiIsIklSIiwiU1VBIiwiQjY0QSIsIkxQIiwiSEUiLCJSRUQiLCJQRk8iLCJXQyIsIkZBUiIsIkJLTSIsIkZQSCIsIk1SRSIsIk1FUiJdLCJ2YyI6ImQ3MDg0YWY2In0.foEV2gsD3ccbt395fG8sC3tVKE5jHemeE6q1e3C0fny6WpuRXLA8gJIpXVD0U7-2JDwARu8FFj1uGa_sajirVw';

const editorConfig = {
	attachTo: document.querySelector('#editor'),
	root: {
		placeholder: 'Nhập chi tiết sản phẩm',
		initialData: ''
	},
	toolbar: {
		items: [
			'undo',
			'redo',
			'|',
			'heading',
			'|',
			'bold',
			'italic',
			'underline',
			'|',
			'emoji',
			'link',
			'mediaEmbed',
			'insertTable',
			'blockQuote',
			'|',
			'bulletedList',
			'numberedList',
			'todoList',
			'outdent',
			'indent'
		],
		shouldNotGroupWhenFull: false
	},
	plugins: [
		AdjacentListsSupport,
		Autoformat,
		AutoImage,
		Autosave,
		BlockQuote,
		Bold,
		CloudServices,
		Emoji,
		Essentials,
		Heading,
		ImageBlock,
		ImageCaption,
		ImageInline,
		ImageInsertViaUrl,
		ImageStyle,
		ImageTextAlternative,
		ImageToolbar,
		ImageUpload,
		Indent,
		IndentBlock,
		Italic,
		Link,
		LinkImage,
		List,
		MediaEmbed,
		MediaEmbedStyle,
		MediaEmbedToolbar,
		Mention,
		Paragraph,
		Table,
		TableCaption,
		TableToolbar,
		TextTransformation,
		TodoList,
		Underline
	],
	licenseKey: LICENSE_KEY,
	autosave: {
		/* See: https://ckeditor.com/docs/ckeditor5/latest/features/autosave.html */
	},
	heading: {
		options: [
			{
				model: 'paragraph',
				title: 'Paragraph',
				class: 'ck-heading_paragraph'
			},
			{
				model: 'heading1',
				view: 'h1',
				title: 'Heading 1',
				class: 'ck-heading_heading1'
			},
			{
				model: 'heading2',
				view: 'h2',
				title: 'Heading 2',
				class: 'ck-heading_heading2'
			},
			{
				model: 'heading3',
				view: 'h3',
				title: 'Heading 3',
				class: 'ck-heading_heading3'
			},
			{
				model: 'heading4',
				view: 'h4',
				title: 'Heading 4',
				class: 'ck-heading_heading4'
			},
			{
				model: 'heading5',
				view: 'h5',
				title: 'Heading 5',
				class: 'ck-heading_heading5'
			},
			{
				model: 'heading6',
				view: 'h6',
				title: 'Heading 6',
				class: 'ck-heading_heading6'
			}
		]
	},
	image: {
		toolbar: ['toggleImageCaption', 'imageTextAlternative', '|', 'imageStyle:inline', 'imageStyle:wrapText', 'imageStyle:breakText']
	},
	link: {
		addTargetToExternalLinks: true,
		defaultProtocol: 'https://',
		decorators: {
			toggleDownloadable: {
				mode: 'manual',
				label: 'Downloadable',
				attributes: {
					download: 'file'
				}
			}
		}
	},
	mediaEmbed: {
		toolbar: ['mediaEmbed:breakText', 'mediaEmbed:wrapText']
	},
	mention: {
		feeds: [
			{
				marker: '@',
				feed: [
					/* See: https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html */
				]
			}
		]
	},
	table: {
		contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
	}
};


ClassicEditor.create(editorConfig)
    .then(editor => {
        const form = document.querySelector('form');
        const inputDesc = document.querySelector('#product_detail');

        form.addEventListener('submit', function () {
            inputDesc.value = editor.getData();
        });
    })
    .catch(error => {
        console.error(error);
    });

