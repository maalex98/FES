<?php
include 'header.php';

function showByStatus($status){
	global $conn;
	$sql = sprintf("SELECT * FROM orders WHERE status = '%s'", $status);
	$result= mysqli_query($conn, $sql);
	echo mysqli_num_rows($result);
}
?>

<div class="testbox">
	<h5 id="title">Statistics</h5>
	<hr />
</div>
<div class="stats-container">
	<h2>Products Statistics</h2>
	<div class="stats-item">
		<b>Products sold</b> in the last 7 days:
		<a href="phpfiles/statsController.php?table=products&type=pdf&days=7">
			<button class="stats-button">Export PDF <i class="fa fa-file-pdf-o"></i></button>
		</a>

		<a href="phpfiles/statsController.php?table=products&type=csv&days=7">
			<button class="stats-button">Export CSV</button>
		</a>

	</div>

	<div class="stats-item">
		<b>Products sold</b> in the last 30 days:
		<a href="phpfiles/statsController.php?table=products&type=pdf&days=30">
			<button class="stats-button">Export PDF <i class="fa fa-file-pdf-o"></i></button>
		</a>
		<a href="phpfiles/statsController.php?table=products&type=csv&days=30">
			<button class="stats-button">Export CSV</button>
		</a>
	</div>

	<div class="stats-item">
		<b>Products sold</b> in the last 3 months:
		<a href="phpfiles/statsController.php?table=products&type=pdf&days=90">
			<button class="stats-button">Export PDF <i class="fa fa-file-pdf-o"></i></button>
		</a>
		<a href="phpfiles/statsController.php?table=products&type=csv&days=90">
			<button class="stats-button">Export CSV</button>
		</a>
	</div>
</div>

<div class="stats-container">
	<h2>Users Statistics</h2>
	<div class="stats-item">
		<b>Accounts created</b> in the last 7 days:
		<a href="phpfiles/statsController.php?table=users&type=pdf&days=7">
			<button class="stats-button">Export PDF <i class="fa fa-file-pdf-o"></i></button>
		</a>

		<a href="phpfiles/statsController.php?table=users&type=csv&days=7">
			<button class="stats-button">Export CSV</button>
		</a>

	</div>

	<div class="stats-item">
		<b>Accounts created</b> in the last 30 days:
		<a href="phpfiles/statsController.php?table=users&type=pdf&days=30">
			<button class="stats-button">Export PDF <i class="fa fa-file-pdf-o"></i></button>
		</a>
		<a href="phpfiles/statsController.php?table=users&type=csv&days=30">
			<button class="stats-button">Export CSV</button>
		</a>
	</div>

	<div class="stats-item">
		<b>Accounts created</b> in the last 3 months:
		<a href="phpfiles/statsController.php?table=users&type=pdf&days=90">
			<button class="stats-button">Export PDF <i class="fa fa-file-pdf-o"></i></button>
		</a>
		<a href="phpfiles/statsController.php?table=users&type=csv&days=90">
			<button class="stats-button">Export CSV</button>
		</a>
	</div>

	<div class="stats-item">
		<b>Users</b> by country:
		<a href="phpfiles/statsController.php?table=users&type=pdf&country=true">
			<button class="stats-button">Export PDF <i class="fa fa-file-pdf-o"></i></button>
		</a>
		<a href="phpfiles/statsController.php?table=users&type=csv&country=true">
			<button class="stats-button">Export CSV</button>
		</a>
	</div>
</div>


<div class="stats-container">
	<h2>Orders Statistics</h2>
    <table border = "1">
	    <tr>
		    <th></th>
		    <th>Number of Orders</th>
	    </tr>

	    <tr>
		    <th>Processing</th>
		    <td style="text-align: center"><?php showByStatus("processing"); ?></td>
	    </tr>
	     
	    <tr>
		   <th>Processed</th>
		   <td style="text-align: center"><?php showByStatus("processed"); ?></td>
	    </tr>

	    <tr>
	    	<th>Shipped</th>
	    	<td style="text-align: center"><?php showByStatus("shipped"); ?></td>
	    </tr>

	    <tr>
	    	<th>Delivered</th>
	    	<td style="text-align: center"><?php showByStatus("delivered"); ?></td>
	    </tr>
  	</table>
</div>

<?php
include "footer.php";
?>

</body>

<link rel="stylesheet" type="text/css" href="styles/stats.css" />

</html>
