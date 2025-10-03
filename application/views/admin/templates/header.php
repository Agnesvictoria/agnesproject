<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? $title : 'CMS Admin' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
         .sidebar {
            width: 220px;
            background: #34495e;
            color: #fff;
            padding: 20px 0;
            flex-shrink: 0;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar a:hover {
            background: #1b2836;
        }
        .sidebar h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            flex: 1;
            padding: 20px;
            background: #f8f9fa;
        }
        footer {
            background: #e9ecef;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
