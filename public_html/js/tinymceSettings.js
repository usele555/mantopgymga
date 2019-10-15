 tinymce.init({


  selector: 'textarea.tinymce-textarea',
  menubar: false,
  plugins: "textcolor colorpicker table link lists",
  toolbar: "undo redo | styleselect | bold italic underline | heading 1 | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table | link | numlist | bullist | fontsizeselect | forecolor backcolor",
  // fontsize_formats: '11px',
  fontsize_formats: "25% 50% 75% 100% 125% 150% 175% 200%",
  color_picker_callback: function(callback, value) {
   callback('#FF00FF');
  },
  height: "350",
  branding: false,
  block_formats: 'Paragraph=p; Header 1=h1; Header 2=h2; Header 3=h3',
  invalid_styles: {
   '*': 'font-family', // Global invalid styles
   // '*': 'font-size', // Global invalid styles
   // 'a': 'background' // Link specific invalid styles
  },
  mobile: {
    theme: 'mobile',
    // plugins: [ 'autosave', 'lists', 'autolink' ]
  }
  // font_formats: 'Nexa=NexaLight,NexaBold;',
  // valid_children : "+body[style]",
  // valid_elements: "*[*]",
  // forced_root_block : "",


 });
 