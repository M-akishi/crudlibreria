<template>
    <div class="container">
        <h2 class="titulo-principal"><span class="badge text-bg-secondary">Listado de Libros</span></h2>      <table class="table table-striped">
        <thead>
          <tr>
            
            <th>Título</th>
            <th>Cantidad</th>
            <th>Descripción</th>

          </tr>
        </thead>
        <tbody>
          <tr v-for="libro in libros" :key="libro.id">
            <td>{{ libro.titulo }}</td>
            <td>{{ libro.cantidad }}</td>
            <td>{{ libro.descripcion }}</td>
          </tr>
        </tbody>
      </table>
      <button class="btn btn-dark" @click="volverAtras">Volver Atrás</button>
    </div>
</template>
  
<script>
export default {
    props: {
        libros: Array // Propiedad que recibirá la lista de libros desde la ruta
    },
    methods: {
        volverAtras() {
            window.history.back();
        }
    }
}
</script>
<style>
.titulo-principal {
  font-size: 30px; 
  text-align: center;
  padding: 20px;
}
</style>