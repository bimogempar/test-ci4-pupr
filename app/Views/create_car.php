<?= $this->extend('layouts/layout'); ?>

<?= $this->section('main'); ?>
<div class="text-2xl font-medium">
    Create car
</div>
<form class="mt-4" action="/create-car" method="post" enctype="multipart/form-data">
    <?php csrf_field(); ?>
    <label class="mt-2" for="car_name">Car Name</label>
    <div class="mt-2">
        <input type="text" class="w-1/4 p-2 rounded-lg bg-gray-200" name="car_name" id="car_name">
    </div>
    <label class=" mt-2" for="price">Price</label>
    <div class="mt-2">
        <input type="number" class="w-1/4 p-2 rounded-lg bg-gray-200" name="price" id="price">
    </div>
    <label class="mt-2" for="year">Year</label>
    <div class="mt-2">
        <input type="number" class="w-1/4 p-2 rounded-lg bg-gray-200" name="year" id="year">
    </div>
    <label class="mt-2" for="description">Description</label>
    <div class="mt-2">
        <input type="text" class="w-1/4 p-2 rounded-lg bg-gray-200" name="description" id="description">
    </div>
    <label class="mt-2 car-image-label" for="car_image">Image</label>
    <div class="mt-2">
        <img src="" class="img-preview my-2" width="200" alt="">
        <input type="file" class="w-1/4 p-2 rounded-lg bg-gray-200" name="car_image" id="car_image" onchange="previewImage()">
    </div>
    <label class="mt-2" for="category_id">Category</label>
    <div class="mt-2">
        <select class="w-1/4 p-2 rounded-lg bg-gray-200" name="category_id" id="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category['category_id']; ?>"><?= $category['category_name']; ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="flex justify-end md:w-1/3 w-full">
        <button class="mt-6 bg-blue-200 p-2 rounded-lg" type="submit">Create</button>
    </div>
</form>
<?= $this->endSection(); ?>