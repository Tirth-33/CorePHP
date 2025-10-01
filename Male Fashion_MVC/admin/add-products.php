<?php

include "header.php"

    ?>


<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Add-Products </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Forms</a></li>
          <li class="breadcrumb-item active" aria-current="page">Form elements</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Default form</h4>
            <p class="card-description"> Basic form layout </p>
            <form class="forms-sample" action="process_form.php" method="POST">
              <div class="form-group">
                <label for="categoryname">Category-Name</label>
                <input type="text" class="form-control" id="categoryname" name="categoryname"
                  placeholder="Category-Name">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" placeholder="Price">
              </div>
              <div class="form-group">
                <label for="parent-category">Parent-Category</label>
                <input type="text" class="form-control" id="parentcategory" placeholder="Parent-Category">
              </div>
              <div class="form-group">
                        <label>Image-Upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary py-3" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
              <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" placeholder="Active/Inactive">
              </div>
              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input"> Remember me </label>
              </div>
              <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>

<?php
include "footer.php"
    ?>