// Dropzone.autoDiscover = false;
Dropzone.options.myDropzone = {
    url: '/upload',
    // uploadMultiple: true,
    maxFiles: 1,
    transformFile: function(file, done) {

        var myDropZone = this;

        // Create the image editor overlay
        var editor = document.createElement('div');
        editor.style.position = 'fixed';
        editor.style.left = 0;
        editor.style.right = 0;
        editor.style.top = 0;
        editor.style.bottom = 0;
        editor.style.zIndex = 9999;
        editor.style.backgroundColor = '#000';

        // Create the confirm button
        var confirm = document.createElement('button');
        confirm.style.position = 'absolute';
        confirm.style.left = '10px';
        confirm.style.top = '10px';
        confirm.style.zIndex = 9999;
        confirm.textContent = 'Confirm';
        confirm.addEventListener('click', function() {

            // Get the canvas with image data from Cropper.js
            var canvas = cropper.getCroppedCanvas({
                
                width:1000,
                height:1000
                // minWidth: 256,
                // minHeight: 256,
                // maxWidth: 4096,
                // maxHeight: 4096,
                // fillColor: '#fff',
                // imageSmoothingEnabled: true,
                // imageSmoothingQuality: 'high'
            });
            // myDropZone.processQueue();
            // Turn the canvas into a Blob (file object without a name)
            canvas.toBlob(function(blob) {

                // Update the image thumbnail with the new image data
                myDropZone.createThumbnail(
                    blob,
                    myDropZone.options.thumbnailWidth,
                    myDropZone.options.thumbnailHeight,
                    myDropZone.options.thumbnailMethod,
                    false,
                    function(dataURL) {

                        // Update the Dropzone file thumbnail
                        myDropZone.emit('thumbnail', file, dataURL);


                        // Return modified file to dropzone
                        done(blob);
                    }
                );

            });

            myDropZone.on("success", function(file, response) {
                console.log(response)
            });

            // Remove the editor from view
            editor.parentNode.removeChild(editor);

        });
        editor.appendChild(confirm);

        // Load the image
        var image = new Image();
        image.src = URL.createObjectURL(file);
        editor.appendChild(image);
        console.log(image);

        // Append the editor to the page
        document.body.appendChild(editor);

        // Create Cropper.js and pass image
        var cropper = new Cropper(image, {
            aspectRatio: 4 / 3
        });
    }

};
