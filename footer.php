<footer>
    <!-- place footer here -->
  </footer>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script>
const input = document.querySelector('#image_uploads');
const preview = document.querySelector('#preview');

input.addEventListener('change', updateImageDisplay);

function updateImageDisplay() {
   while (preview.firstChild) {
      preview.removeChild(preview.firstChild);
   }

   const curFiles = input.files;
   if (curFiles.length === 0) {
      const para = document.createElement('p');
      para.textContent = 'Seleccione un poster';
      preview.appendChild(para);
   } else {
      const list = document.createElement('ul');
      preview.appendChild(list);

      for (const file of curFiles) {
         const listItem = document.createElement('li');
         listItem.style.listStyleType = 'none';

         const para = document.createElement('p');
         para.classList.add('d-flex', 'justify-content-center');

         if (validFileType(file)) {
            para.textContent = `Nombre del archivo: ${
               file.name
            }, tamano ${returnFileSize(file.size)}.`;
            const image = document.createElement('img');
            image.src = URL.createObjectURL(file);
            
            image.style.width = '300px';
            image.style.height = '400px';

            image.classList.add(
               'container',
               'd-flex',
               'justify-content-center'
            );
            image.classList.add('d-flex');
            image.classList.add('justify-content-center');

            listItem.appendChild(image);
            listItem.appendChild(para);

         } else {
            para.textContent = `Archivo ${file.name}: No es un tipo de archivo valido.`;
            listItem.appendChild(para);
         }

         list.appendChild(listItem);
      }
   }
}

const fileTypes = [
   'image/apng',
   'image/bmp',
   'image/gif',
   'image/jpeg',
   'image/pjpeg',
   'image/png',
   'image/svg+xml',
   'image/tiff',
   'image/webp',
   `image/x-icon`,
];

function validFileType(file) {
   return fileTypes.includes(file.type);
}

function returnFileSize(number) {
   if (number < 1024) {
      return number + 'bytes';
   } else if (number > 1024 && number < 1048576) {
      return (number / 1024).toFixed(1) + 'KB';
   } else if (number > 1048576) {
      return (number / 1048576).toFixed(1) + 'MB';
   }
}

  </script>
</body>

</html>