<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 3px;
        }

        a {
            text-decoration: none;
            color: #333;
            margin-right: 10px;
        }

        .action-buttons {
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <h1>Employees</h1>
    </header>
    <div class="container">
        <form action="/<?= (isset($edit['id'])) ? "submitedit/" . $edit['id'] : "submit" ?>" method="post">
            <label>Full Name:</label>
            <input type="text" name="fullName" required 
            value="<?= (isset($edit['id'])) ? $edit['fullName'] : "" ?>">

            <label>Address:</label>
            <input type="text" name="address" required
            value="<?= (isset($edit['id'])) ? $edit['address'] : "" ?>">

            <label>Contact:</label>
            <input type="text" name="contact" required
            value="<?= (isset($edit['id'])) ? $edit['contact'] : "" ?>">
            <input class="btn" type="submit" value="<?= (isset($edit['id'])) ? "Update" : "Submit" ?>">
        </form>
        <h2>Product Listing</h2>
        <table>
            <tr>
                <th>Full Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
            <?php foreach ($employee as $pr): ?>
                <tr>
                    <td>
                        <?= $pr['fullName'] ?>
                    </td>
                    <td>
                        <?= $pr['address'] ?>
                    </td>
                    <td>
                        <?= $pr['contact'] ?>
                    </td>
                    <td class="action-buttons">
                        <a href="/delete/<?= $pr['id'] ?>">Delete</a>
                        <a href="/edit/<?= $pr['id'] ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>