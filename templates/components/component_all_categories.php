<select name="categories[]" multiple>
    <?php foreach ($data["categories"] as $category) : ?>
        <option value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
    <?php endforeach ?>
</select>