<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1>店名：<?php echo $T->name; ?></h1>
    <ul>
    <?php for($i=0; $i<count($v->foods); $i++): ?>
        <li><?php echo $T->foods[$i]; ?></li>
    <?php endfor ?>
    </ul>
</body>
</html>