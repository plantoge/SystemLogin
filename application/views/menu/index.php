        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addNewMenu">Add New Menu</a>
          
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7">
                <?= form_error('menu','<div class="alert alert-danger alert-dismissible fade show" role="alert"><b>','</b><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); ?>
                <?= $this->session->flashdata('message'); ?>   
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Menu</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($menu as $m): ?>
                          <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $m['menu'] ?></td>
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
      <div class="modal fade" id="addNewMenu" tabindex="-1" role="dialog" aria-labelledby="addNewMenuLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addNewMenuLabel">Add New Menu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <form action="<?= base_url('menu'); ?>" method="post">
                <div class="form-group">
                  <label for="menu">Menu</label>
                  <input type="text" name="menu" class="form-control" id="menu" placeholder="input">
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Save</button>
            </div>
              </form>
          </div>
        </div>
      </div>


