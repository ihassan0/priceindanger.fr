{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>priceindanger - Edit Home Settings</title>

    <!-- Include Summernote CSS -->
    <link rel="stylesheet" href="{{ url('admin/assets/modules/summernote/summernote-bs4.css') }}">
    @include('Admin.components.css-links')
    @include('Admin.components.css-forms')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('admin/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/assets/css/components.min.css') }}">

</head>

<body class="layout-4">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('Admin.components.nav')
            @include('Admin.components.side-bar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Edit Home Settings</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Home Settings</h4>
                                </div>
                                <form action="{{ route('admin.home-settings.update', $homeSetting->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea class="summernote"
                                                name="description">{{ old('description', $homeSetting->description) }}</textarea>
                                            @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label>Contact Us:</label>
                                            <textarea class="summernote"
                                                name="contact_us">{{ old('contact_us', $homeSetting->contact_us) }}</textarea>
                                            @error('contact_us')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Privacy Policy:</label>
                                            <textarea class="summernote"
                                                name="privacy_policy">{{ old('privacy_policy', $homeSetting->privacy_policy) }}</textarea>
                                            @error('privacy_policy')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Include Summernote JS -->
    @include('Admin.components.js-scripts')
    @include('Admin.components.js-forms')
    <script src="{{ url('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>

    <script>
        $(document).ready(function() {
    $('.summernote').summernote({
        height: 300, // Set the height of the editor
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'linkImage']], // Add the custom button here
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        buttons: {
            // Define the custom button
            linkImage: function(context) {
                const ui = $.summernote.ui;

                // Create the button
                const button = ui.button({
                    contents: '<i class="note-icon-link"/> Link Image',
                    tooltip: 'Add Link to Image',
                    click: function() {
                        // Get the selected image
                        const selectedNode = context.invoke('editor.restoreTarget');

                        // Check if the selected node is an image
                        if (selectedNode && selectedNode.tagName === 'IMG') {
                            const imageUrl = prompt('Enter URL to link this image:');

                            if (imageUrl) {
                                // Wrap the image in an anchor tag with the provided URL
                                $(selectedNode).wrap(`<a href="${imageUrl}" target="_blank"></a>`);
                            }
                        } else {
                            alert('Please select an image to add a link.');
                        }
                    }
                });
                return button.render(); // return button as jQuery object
            }
        }
    });
});


    </script>
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>TinyMCE Link Image Example</title>
    {{-- <script
        src="https://cdn.tiny.cloud/1/ypdu0k5q9io1xlkc940k5xnvgetuagfas776g92zgu5iducf/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script> --}}

    <script src="https://cdn.tiny.cloud/1/ypdu0k5q9io1xlkc940k5xnvgetuagfas776g92zgu5iducf/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
</head>

<body>
    <div class="container mt-5">
        <h1>TinyMCE Editor with Link Image Button</h1>
        <form action="{{ route('admin.home-settings.update', $homeSetting->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Description:</label>
                    <textarea class="summernote" id="editor"
                        name="description">{{ old('description', $homeSetting->description) }}</textarea>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label>Contact Us:</label>
                    <textarea class="summernote"
                        name="contact_us">{{ old('contact_us', $homeSetting->contact_us) }}</textarea>
                    @error('contact_us')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Privacy Policy:</label>
                    <textarea class="summernote"
                        name="privacy_policy">{{ old('privacy_policy', $homeSetting->privacy_policy) }}</textarea>
                    @error('privacy_policy')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="card-footer text-right">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        tinymce.init({
  selector: '#editor',  // Your textarea selector
  plugins: 'image link',
  toolbar: 'image | link | alignleft aligncenter alignright',
  image_uploadtab: false,  // Disable uploading to server
  file_picker_callback: function (callback, value, meta) {
    if (meta.filetype === 'image') {
      // Create an input element to choose a file
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');
      input.click();
      
      // When the user selects a file
      input.onchange = function () {
        var file = input.files[0];
        var reader = new FileReader();
        
        reader.onloadend = function () {
          // Base64 image string
          var base64Image = reader.result;
          
          // Insert the base64 image into the editor
          callback(base64Image, {alt: file.name});
        };
        
        // Read the image file as a Data URL (Base64)
        reader.readAsDataURL(file);
      };
    }
  }
});


    </script>
</body>

</html>