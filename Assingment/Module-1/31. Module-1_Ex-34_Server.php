<!DOCTYPE html>
<html>
<head>
    <title>Server Environment Details</title>
</head>
<body>
    <h1>Server Environment Details</h1>
    <ul>
        <li><strong>PHP_SELF:</strong> <?php echo $_SERVER['PHP_SELF']; ?></li>
        <li><strong>SERVER_NAME:</strong> <?php echo $_SERVER['SERVER_NAME']; ?></li>
        <li><strong>HTTP_HOST:</strong> <?php echo $_SERVER['HTTP_HOST']; ?></li>
        <li><strong>HTTP_USER_AGENT:</strong> <?php echo $_SERVER['HTTP_USER_AGENT']; ?></li>
        <li><strong>SCRIPT_NAME:</strong> <?php echo $_SERVER['SCRIPT_NAME']; ?></li>
        <li><strong>REQUEST_METHOD:</strong> <?php echo $_SERVER['REQUEST_METHOD']; ?></li>
        <li><strong>REMOTE_ADDR:</strong> <?php echo $_SERVER['REMOTE_ADDR']; ?></li>
        <li><strong>SERVER_PORT:</strong> <?php echo $_SERVER['SERVER_PORT']; ?></li>
        <li><strong>DOCUMENT_ROOT:</strong> <?php echo $_SERVER['DOCUMENT_ROOT']; ?></li>
        <li><strong>QUERY_STRING:</strong> <?php echo $_SERVER['QUERY_STRING']; ?></li>
    </ul>
</body>
</html>