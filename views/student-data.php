<?php if(!is_user_logged_in() ): ?>

<p>You must be logged in to access this functionality</p>
            <?php
                    $args = array(
                            'echo' => true,
                            'redirect' => site_url( $_SERVER['REQUEST_URI'] ), 
                            'form_id' => 'loginform',
                            'label_username' => __( 'Username' ),
                            'label_password' => __( 'Password' ),
                            'label_remember' => __( 'Remember Me' ),
                            'label_log_in' => __( 'Log In' ),
                            'id_username' => 'user_login',
                            'id_password' => 'user_pass',
                            'id_remember' => 'rememberme',
                            'id_submit' => 'wp-submit',
                            'remember' => true,
                            'value_username' => NULL,
                            'value_remember' => false );

                    wp_login_form( $args );

             ?>              
<?php else: ?>

<div class="container" id="altlab-student-data-motherblog">
	<div class="row">
		<div class="col-lg-12">
		<h3>All Student Data</h3>
		<p>All of this data is collected using the categories specified by the instructor. If something is amiss about a student's numbers, checking to make sure they have accurately categorized their posts is the first step.</p>

			<?php foreach($authors as $author): ?>
				

				<?php if(isset($author['userEmail'])): ?>

					<?php 
						$author['dailyArtTotal'] = sizeof($author['dailyArt']);
						$author['weeklyPostTotal'] = sizeof($author['weeklyPost']);
						$author['makingActivityTotal'] = sizeof($author['makingActivity']);
						$author['finalProjectTotal'] = sizeof($author['finalProject']);
						$author['postsTotal'] = sizeof($author['posts']); 


					?>
					<h4><?php echo $author['userEmail']; ?></h4>

					<table class="table">
					  <thead class="thead-inverse">
					    <tr>
					      <th>Post Type</th>
					      <th># Posts Submitted</th>
					      <th># Required Posts</th>
<!-- 					      <th>Points Earned</th>
					      <th>Points Available</th> -->
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">Daily Art</th>
					      <td><?php echo $author['dailyArtTotal'];  ?></td>
					      <td>45</td>
<!-- 					      <td><?php echo ($author['dailyArtTotal'] * 1); ?></td>
					      <td>45</td> -->
					    </tr>
					    <tr>
					      <th scope="row">Weekly Posts</th>
					      <td><?php echo $author['weeklyPostTotal'];  ?></td>
					      <td>11</td>
<!-- 					      <td><?php echo ($author['weeklyPostTotal'] * 3); ?></td>
					      <td>39</td> -->
					    </tr>
					    <tr>
					      <th scope="row">Making Activity</th>
					      <td><?php echo $author['makingActivityTotal'];  ?></td>
					      <td>11</td>
<!-- 					      <td><?php echo ($author['makingActivityTotal'] * 5); ?></td>
					      <td>55</td> -->
					    </tr>
					    <tr>
					      <th scope="row">Final Project</th>
					      <td><?php echo $author['finalProjectTotal'];  ?></td>
					      <td>1</td>
<!-- 					      <td><?php echo ($author['finalProjectTotal'] * 1); ?></td>
					      <td>46</td> -->
					    </tr>
					    <tr>
					      <th scope="row">All Posts</th>
					      <td><?php echo sizeof($author['posts']); ?></td>
					      <td></td>
<!-- 					      <td></td>
					      <td></td> -->
					    </tr>
					  </tbody>
					</table>

				<?php endif; ?>

			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php endif; ?>