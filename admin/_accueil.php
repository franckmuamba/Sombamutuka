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
<main>
			<div class="head-title">
				<div class="left">
					<h1>Tableau de bord</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Tableau de bord</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
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
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php echo $totalUsers ?></h3>
						<p>Total Utilisateurs</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3><?php echo $usersActive ?></h3>
						<p>Utilisateurs actifs</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' style="background: var(--light-blue); color: var(--blue);"></i>
					<span class="text">
						<h3><?php echo $usersInActive ?></h3>
						<p>Utilisateurs inactifs</p>
					</span>
				</li>
				
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Tous les utilisateurs</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
							<thead>
								<tr>
									<th>Prenom</th>
									<th>Nom</th>
									<th>Date inscription</th>
									<th>Status</th>
								</tr>
							</thead>
					<?php foreach($result as $row)
        			{
					?>
							<tbody>
								<tr>
									<td>
										<img src="membres/avatar/<?= $row['avatar'] ?>">
										<p><?= $row['prenom'] ?></p>
									</td>
									<td><?= $row['nom'] ?></td>
									<td><?= $row['ucreated_at'] ?></td>
									<td><span class="status completed">Completed</span></td>
								</tr>
						
								
							</tbody>
					<?php 
					}
					?>
						</table>
					
				</div>
			
			</div>
			<?php

include ('parties/_dataTableConfirm.php')
//header("url = http://localhost/sombamutuka/validationPub.php");
?>
		</main>