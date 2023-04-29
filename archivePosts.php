<?php include('admin/_head.php') ?>
<!-- ?php header("refresh: 30") ?>;	-->

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


<style>
    #post_detail
    {
       font-family: Arial, Helvetica, sans-serif;
       line-height: 5px;
       color: gray;
       font-size: 12px;
    }
</style>


<script>
$(document).ready(function () {
	$('#example').DataTable({
        "language": {
          
            //"lengthMenu": "Afficher _MENU_ articles par page",
            "lengthMenu": "<i class='bx bxs-data'></i>",
            "zeroRecords": "Aucune donnée trouvée - désolé",
            "info": "Afficher page _PAGE_ sur _PAGES_",
            "infoEmpty": "Pas d'articles disponibles",
            "infoFiltered": "(filter à partir de _MAX_ total artciles)",
            "search": "Rechercher <i class='bx bx-search'></i>",
            
            "paginate": {
            "first":      "Premier",
            "last":       "Dernier",
            "next":       "Suivant",
            "previous":   "Précédent"
             },
            
          
        }
    });
});


</script>
<body>
	<?php include('adminData.php') ?>


	<!-- SIDEBAR -->

		<!-- SIDEBAR -->
        <section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin Root</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="admin.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Tableau de bord</span>
				</a>
			</li>
			<li >
				<a href="validationPub.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Validation </span>
				</a>
			</li>
			<li class="active">
				<a href="archivePosts.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Archives</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="deconnexion.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->


	<!-- SIDEBAR -->



		<!-- CONTENT -->
		<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num"><?php echo $postArchived ?></span>
			</a>
			<a href="#" class="profile">
				<img src="img/superuser.webp">
			</a>
		</nav>
		<!-- NAVBAR -->

			<!-- MAIN -->
            <main>
			<div class="head-title">
				<div class="left">
					<h1>Tous les posts archivés</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Tableau de bord</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Archives</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo $nombreTotal ?></h3>
						<p>Total Publications</p>
					</span>
				</li>
                <li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3><?php echo $validPosts ?></h3>
						<p>Posts actifs</p>
					</span>
				</li>	
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php echo $postArchived ?></h3>
						<p>Posts archivés </p>
					</span>
				</li>
						
			</ul>

		<script src="script.js"></script>

<br><br>
<!-- Button trigger modal -->
<div class="container">
    
    <div class="card mt-3">
                    <div class="card-header text-center">
                        <h3>
                            <strong><a style="text-decoration: none;" href="#">TOUS LES ARTICLES ARCHIVES</a></strong>
                        </h3>
                    </div>
    </div>
</div>
<br>
<!-- DEBUT TABLEAU ALL DATA WITH FILTER  -->
<?php

    include ('parties/_dataTableArchive.php')

?>
<!-- FIN TABLEAU ALL DATA WITH FILTER  -->
<br><br><br>



</body>
<?php include ('parties/_animationsblock.php'); ?>
<?php include ('parties/_footerp.php'); ?>
<!-- Animations des blocks -->
</html>
