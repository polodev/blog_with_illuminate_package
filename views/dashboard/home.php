<?php

$deleted = $_GET['deleted'] ?? '';

$posts = Post::all();

require 'partials/header.php';
?>

<div class="container mt-5">
  <div class="p-5 my-2 bg-info text-white">
    <h2>All posts</h2>
  </div>
  <?php if(!empty($deleted)): ?>
    <div class="alert alert-primary">
      <h3>post deleted successfully</h3>
    </div>
  <?php endif; ?>
  <table class="table table-bordered">
    <tr>
      <th>#</th>
      <th>title</th>
      <th>Action</th>
    </tr>
    <?php foreach ($posts as $key => $post): ?>
      <tr>
        <td><?php echo $key + 1 ?></td>
        <td>
          <a href="/dashboard/post/edit?id=<?php echo $post->id ?>"><?php echo $post->title ?></a>
        </td>
        <td>
          <a class="btn btn-outline-primary mx-2" href="/post?id=<?php echo $post->id ?>"> <i class="fa fa-eye"></i> view</a>
          <a class="btn btn-outline-info mx-2" href="/dashboard/post/edit?id=<?php echo $post->id ?>"> <i class="fa fa-pencil"></i> edit</a>
          <button data-title="<?php echo $post->title ?> " data-toggle='modal' data-target='#post_modal' class="btn btn-outline-danger mx-2" data-id='<?php echo $post->id ?>'><i class="fa fa-trash"></i> delete</button>
        </td>
      </tr>
    <?php endforeach ?>
  </table>
</div>



<!-- modal  for deleting  -->
<div class="modal fade" id="post_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure You want to delete this record
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
        <a href="#" id="post_delete_link" class="btn btn-outline-danger"> <i class="fa fa-trash"></i> Delete</a>
      </div>
    </div>
  </div>
</div>
<script>
  $('#post_modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  var title = button.data('title') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body').text('Are really want to delete ' + title + ' ?')
  $('#post_delete_link').attr('href', '/dashboard/post/delete?id='+id);
  })
</script>
<?php require 'partials/footer.php'; ?>