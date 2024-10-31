<!-- bloginfo: Pulls values from WordPress settings   -->

<!DOCTYPE html>
<html>
<head>
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body>
    <h1><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>
    
    <p>Hi dad!</p>
    <p><?php echo 'This is a theme for my ' . get_bloginfo('name') . '!' ?></p>
</body>
</html>
