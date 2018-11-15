<?php 
		session_start();
		if(!isset($_SESSION["usuario"])){
			header("Location: ../login.html");
		}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>prebeStore</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
	    <header>
	    <div class="contenedor">
	        <img src="../IMG/logo.png" width=20%;>
	        <input type="checkbox" id="menu-bar">
	        <label class="fontawesome-align-justify" for="menu-bar"></label>
	                <nav class="menu">
	                    <a href="p.php">Inicio</a>
	                    <a href="../cart.php">Productos</a>
	                    <a href="../comunidad.html">Comunidad</a>
	                    <a href=""><?php echo $_SESSION["usuario"];?></a>
	                    <a href="logout.php">salir</a>
	                </nav>
	            </div>
	</header>
	        
	        
	        <main>
	            <section id="banner">
	                <img src="../IMG/wallhaven-64322.jpg">
	                <div class="contenedor">
	                    <h2>Siempre a la moda</h2>
	                    <p>Nueva Temporada 2018-2019</p>
	                    <a href="#">Leer más</a>
	                </div>
	            </section>
	            
	            <section id="bienvenidos">
	            <div class="contenedor">
	                <h2>BIENVENIDOS A NUESTRA TIENDA</h2>
	               
	                </div>
	            </section>
	            
	            <section id="banner">
	                <img src="../IMG/moda-invierno.jpg">
	                <div class="contenedor">
	                    <h2 id="banner2">La mejor moda para los peques</h2>
	                    <a href="#">Ver ropa</a>
	                </div>
	            </section>            
	            
	            
	            <section id="blog">
	                <h2>Novedades</h2>
	                <div class="contenedor">
	                    <article>
	                        <img src="../IMG/Ashley_Booth_women_Sergey_Fat_fur_blonde_fur_coats_women_outdoors_depth_of_field-600469.jpg!d.jpeg">
	                        <h3>ABRIGOS</h3>
	                        <h4>Otoño-Invierno</h4>
	                        <div class="contenedores">
	                        <a href="#">Ver mas</a>
	                        </div>
	                    </article>
	                    <article>
	                        <img src="../IMG/elegir-mejor-billetera-cuero-para-hombre-renzo-costa-blog.jpg">
	                        <h4>Vea nuestras</h4>
	                        <h3>Carteras</h3>
	                        <div class="contenedores">
	                            <a href="#">Ver mas</a>
	                        </div>
	                    </article>
	                </div>
	            </section>
	            
	        </main>
	        
	        <footer>
	            <div class="contenedor info">
	                <p class="copy">Nombre de Cia &copy; 2018</p>
	                <div class="sociales">
	                    <a class="fontawesome-facebook-sign" href="#"></a>
	                    <a class="fontawesome-twitter" href="#"></a>
	                    <a class="fontawesome-camera-retro" href="#"></a>
	                    <a class="fontawesome-google-plus-sign" href="#"></a>
	                </div>
	            </div>
	        </footer>
</body>
</html>
<!-- 
<?php 
		session_start();
		if(!isset($_SESSION["usuario"])){
			header("Location: ../login.html");
		}
	 ?>
	 <h1>Hola</h1>
	 <?php  
	 	echo $_SESSION["usuario"];
	 ?>
	 <a href="logout.php">salir</a> -->