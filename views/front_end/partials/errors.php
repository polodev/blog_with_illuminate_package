        <?php if (!empty($errors)): ?>
          <div class="alert alert-danger mx-4 my-2">
            <?php foreach ($errors as $error): ?>
              <li><?php echo $error; ?></li>
            <?php endforeach ?>
          </div>
        <?php endif ?>