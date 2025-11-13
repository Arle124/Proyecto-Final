function listarTrabajadores() {
  fetch("db/listar_trabajadores.php")
    .then(res => res.text())
    .then(data => {
      document.getElementById("resultado-listar-trabajadores").innerHTML = data;
    })
    .catch(err => console.error(err));
}