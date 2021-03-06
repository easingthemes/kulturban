<?php
//if (!isset($_POST['submit'])) {
//	echo "<h1>Error</h1>\n
//      <p>Accessing this page directly is not allowed.</p>";
//	exit;
//}
// Define some constants
define( "RECIPIENT_NAME", "Dragan Filipovic" );
define( "RECIPIENT_EMAIL", "info@notamagic.com" );
define( "EMAIL_SUBJECT", "Visitor Message" );

// Read the form values
$success = false;
$senderName = isset( $_POST['senderName'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['senderName'] ) : "";
$senderEmail = isset( $_POST['senderEmail'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['senderEmail'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

$humanA     = $_POST['checkHuman_a'];
$humanB     = $_POST['checkHuman_b'];
$humanCheck = $_POST['senderHuman'];

$human = ($humanCheck == $humanA + $humanB) ? true : false;

// If all values exist, send the email
if( $human == true ) {
	if ( $senderName && $senderEmail && $message) {
		$recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
		// compose headers
		//$headers = "From: " . $senderName . " <" . $senderEmail . ">";
//		$headers = "From: ". $senderEmail ."\r\n";
//		$headers .= "Reply-To: " . $senderEmail . "\r\n";
//		$headers .= "X-Mailer: PHP/".phpversion();

		$subject = EMAIL_SUBJECT . ": " . $senderName . " - " . $senderEmail;

		$success = mail( $recipient, $subject, $message);
	}
}

// Return an appropriate response to the browser
if ( isset($_GET["ajax"]) ) {
	echo $success ? "success" : "error";
} else {
	?>
	<html>
	<head>
		<title>Thanks!</title>
	</head>
	<body>
	<?php if ( $success ) echo "<p>Thanks for sending your message! We'll get back to you shortly.</p>" ?>
	<?php if ( !$success ) echo "<p>There was a problem sending your message. Please try again.</p>" ?>
	<p>Click your browser's Back button to return to the page.</p>
	</body>
	</html>
	<?php
}
?>


