<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex, nofollow">
  <title>Automatic ACF mode</title>
  <script src="https://cdn.ckeditor.com/4.18.0/standard-all/ckeditor.js"></script>
</head>

<body>
  <script>
    // ACF is enabled by default regardless whether toolbar configuration is provided or not.
    // By having a smaller number of features enabled in the toolbar it should be easier to understand how ACF works.
    CKEDITOR.config.toolbar = [{
        name: 'basicstyles',
        items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat']
      },
      {
        name: 'paragraph',
        items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
      },
      {
        name: 'links',
        items: ['Link', 'Unlink']
      },
      {
        name: 'insert',
        items: ['Image']
      },
      {
        name: 'document',
        items: ['Source']
      },
      {
        name: 'about',
        items: ['About']
      }
    ];
    // Disable paste filter to avoid confusion on browsers on which it is enabled by default and may affect results.
    // Read more in https://ckeditor.com/docs/ckeditor4/latest/guide/dev_advanced_content_filter-section-filtering-pasted-and-dropped-content
    CKEDITOR.config.pasteFilter = null;

    CKEDITOR.config.height = 150;
    // Auto Grow has nothing to do with ACF.
    // However, to make users comfortable while pasting content into a tiny editing area, we would let the editor grow.
    CKEDITOR.config.extraPlugins = 'autogrow';
    CKEDITOR.config.autoGrow_maxHeight = 500;
    CKEDITOR.config.autoGrow_minHeight = 150;
  </script>
  <textarea cols="80" id="editor1" name="editor1" rows="10">
&lt;p&gt;A sample &lt;u&gt;heavily formatted text&lt;/u&gt; using &lt;strong&gt;
&lt;span style=&quot;font-family: &apos;Comic Sans MS&apos;;font-size:16px&quot;
&gt;different fonts&lt;/span&gt;&lt;/strong&gt; 

and &lt;span style=&quot;font-size:16px;color:#00FF00;background-color: #FFFF00&quot;&gt;
text colors&lt;/span&gt;. &lt;/p&gt;</textarea>
  <script>
    CKEDITOR.replace('editor1', {
      removeButtons: 'PasteFromWord'
    });
  </script>
</body>

</html>