<?php

$appName = defined('APP_NAME') ? APP_NAME : 'pet shop';
$title = $title ?? $appName;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?> - <?= htmlspecialchars($appName)?></title>
    
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', sans-serif; background: #f5f5f5; color: #333; }

        .navbar {
            background: #e67e22;
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 56px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        .navbar-brand {
            color: #fff;
            font-size: 20px;
            font-weight: 700;
            text-decoration: none;
        }

        .navbar-menu { display: flex; align-item: center; gap: 8px; }
        .navbar-menu a {
            color: #fff;
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 14px;
            transition: background 0.2s;
        }

        .navbar-menu a:hover { background: rgba (255,255,255,0.2); }
        .navbar-menu .btn-logout {
            background: rgba(225,225,225,0.2);
            border: 1px solid rgba(225,225,225,0.4);
        }

        .container { max-width: 1100px; margin: 24px auto; padding: 0 16px; }

        .alert-success {
            background: #d4edda; color: #155724;
            padding: 10px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px;
        }

        .alert-error {
            background: #ffe0e0; color: #c0392b;
            padding: 10px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a class="navbar-brand" href="<?= BASE_URL ?>index.phpurl=product"> <?= htmlspecialchars($appName) ?></a>
        <div class="navbar-menu">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="<?= BASE_URL ?>index,php?url=product">Product</a>
                <a href="<?= BASE_URL ?>index.php?url=category">Kategori</a>
                <a href="<?= BASE_URL ?>index.php?url=cart">Keranjang</a>
                <a href="<?= BASE_URL ?>index.php?url=order">Pesanan</a>
                <a href="<?= BASE_URL ?>index.php?url=auth/logout" class="btn-logout">Logout (<?= htmlspecialchars($_SESSION['user_name']) ?>)</a>

                <?php else: ?>
                    <a href="<?= BASE_URL ?>index.php?url=auth/login">Login</a>
                    <a href="<?= BASE_URL ?>index.php?url=auth/register">Daftar</a>
                <?php endif; ?>
        </div>
    </nav>

    <div class="container">
        <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert-success"><?= htmlspecialchars($_SESSION['success']) ?></div>
        <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert-error"><?= htmlspecialchars($_SESSION['error']) ?></div>
        <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
