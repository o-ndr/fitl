<!DOCTYPE html>
<html>
	<head>
		<title>LocWorld Submissions</title>
	</head>
		<body>
		<h1><?php echo $object->presentation_title; ?></h1>
			<p><?php echo $object->synopsis; ?></p>
			<p><?php echo $object->conference_track; ?></p>
			<p>Presentation submitted at: <?php echo $object->created_at; ?></p>
	</body>
</html>