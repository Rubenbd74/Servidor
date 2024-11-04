<script>
  $colores = ["blue", "yellow", "red", "green"];
  $colorAleatorio = colores[Math.floor(Math.random() * colores.length)];
  return $colorAleatorio;
</script>

<html>
    <svg width="200" height="200">
        <circle cx="100" cy="100" r="50" fill= <?php $colorAleatorio ?> />
    </svg>
    <form>
        <input type= "submit" value="Jugar">
    </form>
</html>
