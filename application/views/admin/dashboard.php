<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 220px;
            background: #2c3e50;
            color: #fff;
            padding: 20px 0;
            flex-shrink: 0;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #fff;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #34495e;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
        header {
            background: #ecf0f1;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        footer {
            background: #ecf0f1;
            padding: 10px;
            text-align: center;
            border-top: 1px solid #ddd;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin</h2>
        <a href="<?php echo site_url('admin/dashboard'); ?>">DASHBOARD</a>
        <a href="<?php echo site_url('web'); ?>">HALAMAN WEB</a>
        <a href="<?php echo site_url('admin/artikel'); ?>">ARTIKEL</a>
        <a href="<?php echo site_url('admin/categories'); ?>"> Data Kategori</a>
        <a href="<?php echo site_url('admin/tags'); ?>">Data Tag</a>
        <a href="<?php echo site_url('admin/authors'); ?>">  Data Author</a>
        <a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <header>
            <h2><?php echo $title; ?></h2>
        </header>

        <main>
            <h3>Selamat Datang di Dashboard Admin</h3>
            <p>Halo, <b><?php echo $this->session->userdata('username'); ?></b>!</p>
        </main>

        <footer>
            <p>CMS Project by Agnes Victoria &copy; 2025</p>
        </footer>
    </div>

</body>
</html>
