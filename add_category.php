<?php
include("header.php");
if ( $session ):
		if ( 0 == $session['role'] ) {
?>

			<div id="content" class="tpl-full-width">
				<div id="main-container" class="clearfix">
					<div class="main container submit-container main-container" role="main">
						<div class="content-wrap">
							<div class="main-content container-fluid">
								<div class="col-xs-12 col-md-10">
						            <div class="panel panel-default">
											<h2> Create a Category </h2>
											<form method="POST" action="modules/add_category.php">
												<div class="form-group">
													<label for="cat-name">Category Name</label>
													<input type="text" name="cat-name" class="form-control" id="cat-name" placeholder="A name that can relate to your project">
													<?php $status = isset( $_GET['status'] ) ? $_GET['status'] : null; ?>
													<?php if ( $status ): ?>
															<div class="alert alert-danger" role="alert">
																<i>You need to input a category name</i>
															</div>
													<?php endif; ?>
												</div>
												<div class="form-group">
													<label for="cat-color">Colour of the Category Tag</label>
													<input type="color" name="cat-color" class="form-control" id="cat-color" style="width: 80px;">
												</div>
												<button type="submit" class="btn btn-default">Add</button>
											</form>

											<label for="cat-name">Categories</label>
											<table class="table table-bordered" style="width: 100%;text-align: center;">
													<thead>
														<tr>
															<th>#</th>
															<th>Name</th>
															<th>Actions</th>
														</tr>
													</thead>
													<?php 
														$all_terms = $terms->get_all_terms();
													?>
													<?php if ( $all_terms ) : ?>
													<?php foreach ( $all_terms as $t ) : ?>
														<tbody>
															<tr> 
																<td><?php echo $t['id']; ?></td>
																<td><?php echo $t['name']; ?></td>
																<?php if ( '0' == $session['role'] ): ?>
																<td>
																	<a  onclick="return confirm('Do you really want to delete the category?')" href="modules/delete_category.php?id=<?php echo $t['id'] ?>"> Delete </a>
																</td>
																<?php endif; ?>
														   </tr>
														</tbody>
													<?php endforeach; ?>
												<?php endif; ?>
											</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
<?php else: ?>
	<?php include("login.php"); ?>
<?php endif; ?>
<?php include("footer.php"); ?>