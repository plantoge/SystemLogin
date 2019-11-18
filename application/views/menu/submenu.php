        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addNewSubMenu">Add New SubMenu</a>
          
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                <?= form_error('menu','<div class="alert alert-danger alert-dismissible fade show" role="alert"><b>','</b><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); ?>
                <?= $this->session->flashdata('message'); ?>   
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Menu</th>
                          <th scope="col">Url</th>
                          <th scope="col">Icon</th>
                          <th scope="col">Active</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($subMenu as $sm): ?>
                        <?php if($sm['is_active']==1){$aktf = "Active";}else{$aktf = "Not Active";} ?>
                          <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $sm['title'] ?></td>
                            <td><?= $sm['menu'] ?></td>
                            <td><?= $sm['url'] ?></td>
                            <td><?= $sm['icon'] ?></td>
                            <td><?= $aktf; ?></td>
                            <td>
                                <a href="" class="badge badge-pill badge-primary">Edit</a>
                                <a href="" class="badge badge-pill badge-danger">Hapus</a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                </div>
              </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Modal -->
      <div class="modal fade" id="addNewSubMenu" tabindex="-1" role="dialog" aria-labelledby="addNewSubMenuLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addNewSubMenuLabel">Add New SubMenu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" id="title">
                  <?= form_error('title','<small class="text-danger pl-3"><b>','</b></small>'); ?>
                </div>

                <div class="form-group">
                  <label for="menu">Menu</label>
                    <select class="form-control" id="menu" name="menu_id">
                        <option value="">Select Menu</option>
                        <?php foreach($menu as $m): ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('menu_id','<small class="text-danger pl-3"><b>','</b></small>'); ?>
                </div>

                <div class="form-group">
                  <label for="url">Url</label>
                  <input type="text" name="url" class="form-control" id="url">
                  <?= form_error('url','<small class="text-danger pl-3"><b>','</b></small>'); ?>
                </div>

                <div class="form-group">
                  <label for="icon">Icon</label>
                  <input type="text" name="icon" class="form-control" id="icon">
                  <?= form_error('icon','<small class="text-danger pl-3"><b>','</b></small>'); ?>
                </div>

                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" checked>
                    <label class="form-check-label" for="is_active">
                        Is't Active ?
                    </label>
                  </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
              </form>
          </div>
        </div>
      </div>


