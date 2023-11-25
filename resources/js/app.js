import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Arrastra los archivos aquí para subirlos',
    acceptedFiles: '.png,.jpg,.gif,.bmp,.jpeg',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        if (document.querySelector('[name=image]').value.trim()) {
            let image = {
                name: document.querySelector('[name=image]').value,
                size: 12345
            };

            this.options.addedfile.call(this, image);
            this.options.thumbnail.call(this, image, `/uploads/${image.name}`);

            image.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

dropzone.on('success', (file, response) => {
    document.querySelector('[name=image]').value = response.image;
});

dropzone.on('removedfile', () => {
    document.querySelector('[name=image]').value = '';
});
