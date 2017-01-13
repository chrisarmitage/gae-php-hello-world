<html>
<head>
    <title>Hello, World!</title>
	<style>
		table { 
			width: 80%; 
			border-collapse: collapse;
			border-spacing: 0;
			color: #333;
			font-family: Helvetica, Arial, sans-serif;
		}
		td, th { 
			border: 1px solid #CCC; 
			padding: 4px;
		}
		th {
			background: #DFDFDF;
			font-weight: bold;
		}

		td {
			background: #FAFAFA;
		}
		tr:nth-child(even) td { background: #F1F1F1; }
		tr:nth-child(odd) td { background: #FEFEFE; }
	</style>
</head>
<body>
    <div>
        <h2>Versions</h2>
        <table>
            <tr>
                <td>PHP Version</td>
                <td><?= sprintf('%u.%u.%u', PHP_MAJOR_VERSION, PHP_MINOR_VERSION, PHP_RELEASE_VERSION); ?></td>
            </tr>
            <tr>
                <td>SERVER_SOFTWARE</td>
                <td><?= $_SERVER['SERVER_SOFTWARE']; ?></td>
            </tr>
            <tr>
                <td>APPLICATION_ID</td>
                <td><?= $_SERVER['APPLICATION_ID']; ?></td>
            </tr>
        </table>

        <h2>Available modules</h2>
        <table>
			<tr>
				<th>Module</th>
				<th>Version</th>
			</tr>
			<?php
			$extensions = get_loaded_extensions();
			asort($extensions);
			?>		
            <?php foreach ($extensions as $extension) : ?>
                <tr>
                    <td><?= $extension; ?></td>
                    <td><?= phpversion($extension); ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
</html>
