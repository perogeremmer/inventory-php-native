<!doctype html>
<html lang="en">
<head>
    <?php include('components/header.php') ?>
</head>

<body>
    <?php include('components/navbar.php') ?>

    <main role="main " class="container">
        
        <?php include('components/welcome_message.php') ?>
        
        <?php 
            include('database/inventory.php');

            $data = new Inventory();
        ?>

        <div class="container mt-5">
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="mb-4">List of Product</h5>

                    <table class="table table-hover ">
  <thead>
    <tr>
      <th scope="col ">Product Name</th>
      <th scope="col ">Stock</th>
      <th scope="col ">Category</th>
      <th scope="col ">Expired At</th>
      <th scope="col ">Created At</th>
      <th scope="col ">Updated At</th>
      <th scope="col ">Action</th>
    </tr>
  </thead>
  <tbody> <?php foreach($data->getAll() as $item) { ?> <tr>
      <td> <?= $item['name'] ?> </td>
      <td> <?= $item['stock'] ?> </td>
      <td> <?= $item['category_name'] ?> </td>
      <td> <?= $item['expired_at'] ?> </td>
      <td> <?= $item['created_at'] ?> </td>
      <td> <?= $item['updated_at'] ?> </td>
      <td>
        <div class="btn-group " role="group " aria-label="Basic example ">
          <a href="edit.php?id=<?= $item['id'] ?>" class="btn btn-info text-white ">
            <i class="bx bx-pencil"></i>
          </a>
          <form onsubmit="return confirm('Do you really want to delete item?')" 
							action="controller/inventory.php?id=<?= $item['id'] ?>&action=delete" 
							method="POST">
            <button type="submit" class="btn btn-danger text-white">
              <i class="bx bx-trash"></i>
            </button>
          </form>
        </div>
      </td>
    </tr> <?php } ?> </tbody>
</table>
                </div>
            </div>
        </div>
    </main>

    <?php include('components/footer.php') ?>

    <?php include('components/scripts.php') ?>
</body>

</html>