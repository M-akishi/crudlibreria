<template>
  <div class="container">
    <h2>Lista de Informes</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Título</th>
          <th>Fecha</th>
          <th>Tipo de Libro</th>
          <th>Editorial</th>
          <th>Libro</th>
          <th>Cantidad</th>
          <th>Revista</th>
          <th>Cantidad</th>
          <th>Enciclopedia</th>
          <th>Cantidad</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="informe in informes" :key="informe.id">
          <td>{{ informe.titulo }}</td>
          <td>{{ informe.created_at }}</td>
          <td>{{ informe.tipoLibro.des_tipo }}</td>
          <td>{{ informe.editorial.des_editorial }}</td>
          <td>{{ informe.libro.titulo }}</td>
          <td>{{ informe.libro.cantidad }}</td>
          <td>{{ informe.revista.titulo }}</td>
          <td>{{ informe.revista.cantidad }}</td>
          <td>{{ informe.enciclopedia.titulo }}</td>
          <td>{{ informe.enciclopedia.cantidad }}</td>
        </tr>
      </tbody>
    </table>
    <button class="btn btn-dark" @click="volverAtras">Volver Atrás</button>

  </div>
</template>

<script>
export default {
    props: {
        informes: Array}, 
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