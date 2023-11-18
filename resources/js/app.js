import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Arrastra los archivos aquí para subirlos',
    acceptedFiles: '.png,.jpg,.gif,.bmp,.jpeg',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,
});

dropzone.on('sending', (file, xhr, formData) => {
    console.log(formData);
});

dropzone.on('success', (file, response) => {
    console.log(response);
});

dropzone.on('error', (file, response) => {
    console.log(response);
});

dropzone.on('removedfile', (file) => {
    console.log(file);
});
