<?PHP 

	// $con = mysql_connect('localhost', 'root', 'james417');
	// if (!$con)
	  // {
	  // die('Could not connect: ' . mysql_error());
	  // }
	  
	require '../../connection/connection.php';
	  
	$page_num = mysql_real_escape_string($_GET['page_num']);
	$num_of_rows = mysql_real_escape_string($_GET['num_of_rows']);
	$sort_by = mysql_real_escape_string($_GET['sort_by']);
	
	$upper_limit = $page_num * $num_of_rows;
	$lower_limit = ($page_num - 1) * $num_of_rows;

	// mysql_select_db("guest", $con);
	$total_num_rows = mysql_fetch_array(mysql_query("SELECT COUNT(*) as a FROM  visitor"));
	$sql_visitors = "SELECT * FROM  visitor LIMIT $lower_limit , $num_of_rows";
	$result_visitors = mysql_query($sql_visitors) or die('Query failure: ' . mysql_error());
	
	// $total_num_rows = mysql_num_rows($result_visitors);
	if(!$num_of_rows == 0) $total_num_pages = ceil($total_num_rows['a'] / $num_of_rows);
	else $total_num_pages = 1;
	
	$opt_str = '';
	$i = 1;
	while ( $i <= $total_num_pages) {
		    $opt_str .= '<option>'.$i.'</option>';
			$i++;
		}
	
	$row_count = 0;
	echo '<div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">
                                	Visitors
                                </div>
                            	<div class="pull-right">
                            		<span class="badge badge-info">'.$total_num_rows['a'].'</span>
                            	</div>
                            </div>
                            <div id="visitors" class="block-content collapse in">
                            <div class="form-actions" id="visitors_data_controls">
                                          <div>
                                          	<span>Page:</span>
                                          	<select id="select1" onchange="get_visitors();">
                                          		'.$opt_str.'
                                          	</select>
                                          </div>
                                          <div>
                                          	<span>Rows:</span>
                                          	<input type="text" id="rows1" value="'.$num_of_rows.'" onkeyup="get_visitors();"/>
                                          </div>
                                </div>
								<table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Full Name<i class="caret"></i></th>
                                                <th>Email Address<i class="caret"></i></th>
                                                <th>Phone Number</th>
                                                <th>Host</th>
                                                <th>Purpose of visit</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="visitors_data">';
	while($row_visitors = mysql_fetch_array($result_visitors)){
			$row_count++; 
			echo '<tr>
			        <td>'.$row_count.'</td>
			        <td>'.$row_visitors['full_name'].'</td>
			        <td>'.$row_visitors['email'].'</td>
			        <td>'.$row_visitors['phone'].'</td>
			        <td>'.$row_visitors['host'].'</td>
			        <td>'.$row_visitors['purpose'].'</td>
			        <td>
				        <div class="btn-group">
			                <button class="btn btn-mini"><i class="icon-ok"></i> </button>
			                <button class="btn btn-mini"><i class="icon-pencil"></i> </button>
			                <button class="btn btn-mini"><i class="icon-remove"></i> </button>
			            </div>
		            </td>
		    	</tr>';
	 }

	echo '</tbody></table></div>';
	if($row_count == 0) echo '<tr><td colspan="7" style="text-align:center;">Zero rows returned</td></tr>';
?>
