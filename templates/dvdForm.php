<div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="title" name="title" placeholder="Dvd Title"
               value="<?php if (isset($dvdTitle)) echo $dvdTitle; ?>">
    </div>
</div>
<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        <textarea name="description" class="form-control" rows="5"
                  placeholder="Description of the dvd"><?php if (isset($dvdDescription)) echo $dvdDescription; ?></textarea>
    </div>
</div>

<div class="form-group">
    <label for="photoUpload" class="col-sm-2 control-label">File Upload</label>
    <div class="col-sm-10">
        <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit"
                class="btn btn-default"><?php if (isset($buttonText)) echo $buttonText; else echo "Add DVD"; ?></button>
    </div>
</div>
