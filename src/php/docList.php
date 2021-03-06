<!doctype html>
<html>
<head>
    <?php
    include 'bootstrap.php';
    ?>
    <link rel="stylesheet" type="text/css" href="../css/docList.css"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="../js/docList.js"></script>
</head>

<body>
<?php
include_once 'pageHeader.php';
?>

<div class="container" id="docList">
    <div class="container col-md-12">
        <div id="smartDocLabel">
            <h3>Smart Document <i class="fa fa-file-pdf-o"></i></h3>
        </div>
        <div id="searchBox">
            Search: <input type="text" onkeypress="docFilter()" id="searchInput"/> <i class="fa fa-search"></i>
        </div>
    </div>
    <table border="1" class="col-md-12" id="docTable">
        <tr>
            <th>Document Title</th>
            <th>Document ID</th>
        </tr>


	<?php
		require "sql_header.php";

		$docuGet = "SELECT documentID, name FROM Document ";

		$result = $conn->query($docuGet);
		if ($result->num_rows > 0)
		{
			while ($row = $result->fetch_assoc())
			{
				$docuID = $row['documentID'];
				
				echo "<tr>";
				echo "<td>";
				echo "<a href='getDocument.php?docunum=$docuID'>";
				echo "<h4>Document: ".$row['name']."</h4>";
				echo "</a>";
				echo "</td>";
				echo "<td>";
				echo "<h4>ID: $docuID </h4>";
				echo "</td>";
				echo "</tr>";
			}
		}

	?>


    </table>
</div>
</body>
</html>
