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
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo $nombreTotal ?></h3>
						<p>Total Publications</p>
					</span>
				</li>
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
				<li>
					<i class='bx bxs-dollar-circle'></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Publications récentes</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
							<thead>
								<tr>
									<th>Vendeur</th>
									<th>Date publication</th>
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
									<td><?= $row['created_at'] ?></td>
									<td><span class="status completed">Completed</span></td>
								</tr>
						
								
							</tbody>
					<?php 
					}
					?>
						</table>
					
				</div>
				<div class="todo">
					<div class="head">
						<h3>Todos</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>
			</div>
		</main>