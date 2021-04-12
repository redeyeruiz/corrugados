const archivo = document.getElementById('selectedFile');

archivo.addEventListener('change', (event) => {
  const files = event.target.files;
  console.log('files', files);
  
  const feedback = document.getElementById('feedback');
  const msg = `El archivo ${files[0].name} se ha subido.`;
  feedback.innerHTML = msg;

  for (const file of files) {
    const name = file.name;
    const type = file.type ? file.type: 'NA';
    const size = file.size;
    const lastModified = file.lastModified;
    console.log({ file, name, type, size, lastModified });
  }
});

var reader = new FileReader();
var x = reader.readAsText(archivo, "UTF-8");