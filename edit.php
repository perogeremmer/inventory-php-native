<!DOCTYPE html>
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
            $id =  $_GET['id'];

            $data = new Inventory();
            $data = $data->show($id);
            
            $category = new Category();
        ?>

        <div class="container mt-5">
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="mb-4">Detail Product <?= $data['name'] ?></h5>
                    <form action="controller/inventory.php?id=<?= $data['id'] ?>&action=update" method="POST">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input product name" name="name" value="<?= $data['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Input product stock" name="stock" value="<?= $data['stock'] ?>"">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Category</label>
                            <select class="form-control" name="category">
                                <?php foreach($category->getAll() as $item) { ?>
                                    <option value="<?= $item['id'] ?>" 
                                        <?= ($item['id'] == $data['category_id'] ? "selected='selected'" : "" ) ?> > 
                                            <?= $item['name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Expired at</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input product expired at" name="expired_at" value="<?= $data['expired_at'] ?>">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include('components/footer.php') ?>

    <?php include('components/scripts.php') ?>
</body>

</html>